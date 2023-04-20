<?php

namespace App\Providers;

use App\Services\WordScore\ScoreDataProviders\GitHubScoreService;
use App\Services\WordScore\ScoreDataProviders\ScoreDataContract;
use Illuminate\Support\ServiceProvider;

class WordScoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ScoreDataContract::class, function ()
        {
            if (config('word_score.provider') === 'github') {
                return new GitHubScoreService();
            }

            throw new \Exception('The word score provider is invalid.');
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
