<?php

namespace App\Http\Controllers;

use App\Managers\QuoteManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class QuoteController extends Controller
{
    protected $quoteManager;

    public function __construct(QuoteManager $quoteManager)
    {
        $this->quoteManager = $quoteManager;
    }

    public function getRandomQuotes(Request $request)
    {
        $quotes = Cache::remember('random_quotes', 60, function () {
            return $this->quoteManager->getRandomQuotes();
        });

        return response()->json($quotes);
    }

    public function refreshQuotes(Request $request)
    {
        Cache::forget('random_quotes');

        return $this->getRandomQuotes($request);
    }
}