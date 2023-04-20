<?php

namespace App\Services\WordScore;

use App\Http\Requests\WordScoreRequest;
use App\Models\WordScore;
use App\Services\WordScore\ScoreDataProviders\ScoreDataContract;

class WordScoreService
{
    /**
     * @var ScoreDataContract
     */
    public $scoreDataService;

    /**
     * WordScoreService constructor.
     * @param ScoreDataContract $scoreDataService
     */
    public function __construct(ScoreDataContract $scoreDataService)
    {
        $this->scoreDataService = $scoreDataService;
    }

    /**
     * @param WordScoreRequest $request
     * @return mixed
     */
    public function getScore(WordScoreRequest $request): WordScore
    {
        //try to get the word score from the database
        $score = WordScore::where('word', $request->input('word'))->first();

        //if score for this word doesn't exist in the database, get it from the external data source and save to the database
        if ( ! $score ) {
            //get positive and negative score
            $positive = $this->scoreDataService->getScore( $this->getPositiveWord($request) );
            $negative = $this->scoreDataService->getScore( $this->getNegativeWord($request) );

            //calculate the score based on positive/negative count
            $score = $this->calculateScore($positive, $negative);

            //create a record in our database to make future requests faster
            $score = WordScore::create([
                'word'     => $request->input('word'),
                'positive' => $positive,
                'negative' => $negative,
                'score'    => $score,
                'provider' => config('word_score.provider')
            ]);
        }

        return $score;
    }

    /**
     * @param int $positive
     * @param int $negative
     * @return float
     */
    protected function calculateScore(int $positive, int $negative): float
    {
        //if positive and negative equals zero, then score is zero. Also, this will prevent 'division by zero' exceptions in following calculations
        if ($positive == 0 && $negative == 0) {
            return 0;
        }

        //calculate and return score
        return round(($positive/($positive+$negative)) * 10, 2);
    }

    protected function getPositiveWord(WordScoreRequest $request): string
    {
        //concat word and positive suffix
        return $request->input('word') . ' ' . config('word_score.positive_suffix');
    }

    protected function getNegativeWord(WordScoreRequest $request): string
    {
        //concat word and negative suffix
        return $request->input('word') . ' ' . config('word_score.negative_suffix');
    }
}
