<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuoteTest extends TestCase
{

    private $apiKey = 'let_me_in';

    public function testGetRandomQuotes()
    {
        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
        ])->get('/api/quotes');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }

    public function testRefreshQuotes()
    {
        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
        ])->get('/api/quotes/refresh');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }

    public function testUnauthorizedAccess()
    {
        $response = $this->get('/api/quotes');
        $response->assertStatus(401);

        $response = $this->get('/api/quotes/refresh');
        $response->assertStatus(401);
    }
}