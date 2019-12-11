<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function redirect()
    {
        $query = http_build_query([
            'client_id' => config('app.client_id'),
            'redirect_uri' => config('app.redirect_uri'),
            'response_type' => 'code',
            'scope' => '',
        ]);

        return redirect(config('app.client_url').'oauth/authorize?'.$query);
    }

    public function callback(Request $request)
    {
        if(isset($_GET['error'])){
            return redirect('/');
        }

        $client = new Client;

        $res = $client->request('POST', config('app.client_url').'oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => config('app.client_id'),
                'client_secret' => config('app.client_secret'),
                'redirect_uri' => config('app.redirect_uri'),
                'code' => $request->code,
            ],
        ]);

        $resp = json_decode($res->getBody(), true);
        $at = $resp["access_token"];
        $response = $client->request('GET', config('app.client_url').'api/user', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$at,
            ],
        ]);

        $response = json_decode((string) $response->getBody(), true);
        return $response;
    }
}
