<?php

namespace App\Services\WordScore\ScoreDataProviders;

use App\Exceptions\JsonException;
use Illuminate\Support\Facades\Http;

class GitHubScoreService implements ScoreDataContract
{
    public function getScore(string $word): int
    {
        //get response from github api
        $response = Http::get('https://api.github.com/search/issues', [
            'q' => $word
        ]);

        //if response fails
        if ($response->failed()) {
            throw new JsonException('Connection with github api failed.', 500);
        }

        return $response->json()['total_count'] ?? 0;
    }

}
