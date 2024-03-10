<?php

namespace Tests\Unit;

use App\Managers\QuoteManager;
use Tests\TestCase;

class QuoteManagerTest extends TestCase
{
    public function testGetRandomQuotes()
    {
        $quoteManager = new QuoteManager();
        $quotes = $quoteManager->getRandomQuotes();

        $this->assertCount(5, $quotes);
    }
}