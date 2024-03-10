<?php

namespace App\Managers;

use GuzzleHttp\Client;

class QuoteManager
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getRandomQuotes()
    {
        $quotes = [];

        for ($i = 0; $i < 5; $i++) {
            $response = $this->client->get('https://api.kanye.rest?format=text');
            $quoteContent = $response->getBody()->getContents();
            $quote = json_decode($quoteContent)->quote;

            if (!in_array($quote, $quotes)) {
                $quotes[] = $quote;
            } else {
                $i--;
            }
        }

        return $quotes;
    }
}