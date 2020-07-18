<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CookingController extends Controller
{

    public function getCookingFromApi(Request $request)
    {

        //叩きたいAPIを持ってくる
        $base_url = 'https://cooking-records.herokuapp.com/cooking_records';

        $guzzleClient = new Client();
        $res = $guzzleClient->get($base_url);
        $data = json_decode($res->getBody(),true);
        return $data;
    }
}
