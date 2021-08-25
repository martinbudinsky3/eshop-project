<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use MeiliSearch\Client;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('meilisearch:update', function () {
    $client = new Client(
        env('MEILISEARCH_HOST','http://127.0.0.1:7700'),
        env('MEILISEARCH_KEY', 'masterKey')
    );

    $client->index('products')->updateSearchableAttributes([
        'name',
        'material'
    ]);
});
