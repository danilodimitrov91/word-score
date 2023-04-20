<?php

namespace Tests\Feature\api\v1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GetScoreTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_score(): void
    {
        $response = $this->getJson('/api/v1/score?word=php');

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->hasAll(['id', 'word', 'provider', 'positive', 'negative', 'score', 'created_at', 'updated_at'])
        );
    }

    public function test_score_validation(): void
    {
        $response = $this->getJson('/api/v1/score');

        $response->assertStatus(422);
    }
}
