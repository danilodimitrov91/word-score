<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\WordScoreRequest;
use App\Services\WordScore\WordScoreService;


class WordScoreController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v2/score",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      ),
     *     @OA\Parameter(
     *         name="word",
     *         in="query",
     *         description="Word",
     *         required=true,
     *      ),
     *     @OA\Response(
     *          response=500,
     *          description="Server error",
     *      )
     * )
     */
    public function getScore(WordScoreRequest $request, WordScoreService $wordScoreService)
    {
        //call service that will take care of business logic
        $score = $wordScoreService->getScore($request);

        return $this->respondSuccess("word", $score, $score->id);
    }
}
