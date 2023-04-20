<?php

namespace Tests\Feature\api\v2;

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
        $response = $this->getJson('/api/v2/score?word=php');

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->hasAll(['data', 'data.type', 'data.id', 'data.attributes', 'data.attributes.id', 'data.attributes.word', 'data.attributes.provider', 'data.attributes.positive', 'data.attributes.negative', 'data.attributes.score', 'data.attributes.created_at', 'data.attributes.updated_at'])
        );
    }

    public function test_score_validation(): void
    {
        $response = $this->getJson('/api/v2/score');

        $response->assertStatus(422);
    }
}
