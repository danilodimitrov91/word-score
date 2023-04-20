<?php

namespace App\Services\WordScore\ScoreDataProviders;

interface ScoreDataContract
{
    public function getScore(string $word): int;
}
