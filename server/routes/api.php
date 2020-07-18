<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/cooking", "CookingController@getCookingFromApi")->name('cooking');

//  // Guzzleモジュールのクラス読み込み
//  use GuzzleHttp\Client;

//  Route::get("/data", function(){
//   $client = new Client();
//   $sourceUrl = "https://cooking-records.herokuapp.com/cooking_records";
//   $responseData = $client->request("GET", $sourceUrl);
//   $responseBody = json_decode($responseData->getBody()->getContents(), true);
  
  
//   return [
//    "status" => "OK",
//    "data" => $responseBody,
//   ];
//  });

//  // CORS対応
//  -> middleware(\Barryvdh\Cors\HandleCors::class);