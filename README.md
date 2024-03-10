# Kanye Quotes API

This is a Laravel application that provides a REST API for fetching random quotes from the Kanye REST API.

## Setup

1. Clone the repository
2. Install dependencies: `composer install`
3. Copy the `.env.example` file to `.env` and update the `APP_KEY` value: `php artisan key:generate`
4. Update API_TOKEN in the `.env` file to whatever you would like

## Running the Application

1. Start the development server: `php artisan serve`
2. The API endpoints are available at:
    - `http://localhost:8000/api/quotes` (GET) - Returns 5 random quotes
    - `http://localhost:8000/api/quotes/refresh` (GET) - Refreshes the quotes cache and returns 5 new random quotes

## Testing

1. Run feature tests: `php artisan test --testsuite=Feature`
2. Run unit tests: `php artisan test --testsuite=Unit`