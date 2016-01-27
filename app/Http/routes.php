<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/{bin:[0-9]{6}}', function ($bin) use ($app) {

    return response()->json([
        'meta' => ['code' => 200],
        'data' => (new \App\Services\BinList())->getJsonData($bin)
    ]);
});
