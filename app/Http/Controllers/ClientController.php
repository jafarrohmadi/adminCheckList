<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Admin;
use App\Models\CheckListEmployee;
use App\Models\Company;
use App\Models\User;
use Faker\Factory as Faker;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function login()
    {
        return view('auth.loginClouds');
    }

    public function redirect()
    {
        $query = http_build_query([
            'client_id'     => config('app.client_id'),
            'redirect_uri'  => config('app.redirect_uri'),
            'response_type' => 'code',
            'scope'         => '',
        ]);

        return redirect(config('app.client_url').'oauth/authorize?'.$query);
    }

    public function callback(Request $request)
    {
        \Config::set('app.debug', true);
        if (isset($_GET['error'])) {
            return redirect('/');
        }

        $client = new Client;

        $res = $client->request('POST', config('app.client_url').'oauth/token', [
            'form_params' => [
                'grant_type'    => 'authorization_code',
                'client_id'     => config('app.client_id'),
                'client_secret' => config('app.client_secret'),
                'redirect_uri'  => config('app.redirect_uri'),
                'code'          => $request->code,
            ],
        ]);

        $resp = json_decode($res->getBody(), true);
        $at   = $resp["access_token"];

        $response = $client->request('POST', config('app.client_url').'api/user', [
            'headers'     => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer '.$at,
            ],
            'form_params' => [
                'app_code' => 'AC',
            ],
        ]);

        $response = json_decode((string)$response->getBody(), true);

        Cookie::queue('bearer', $at, 60);

        
        if(!isset($response['data']['company']['access']['AC']['active']))
	    {
		    if($response['data']['company']['access']['AC']['active'] != 1) { 
			    return view('errors.error403cont');
		    }
	    }


        $finduserdb = Admin::where('email', $response['data']['email'])->first();
        if (!$finduserdb) {
            $company = Company::where('code',$response['data']['company']['code'])->first();
            if (!$company) {
                $company              = new Company();
                $company->code        = $response['data']['company']['code'];
                $company->name        = $response['data']['company']['name'];
                $company->address     = $response['data']['company']['address'];
                $company->website     = $response['data']['company']['website'];
                $company->quota       = $response['data']['company']['access']['AC']['quota'];
                $company->empty_space = $response['data']['company']['access']['AC']['quota'];
                $company->expired     = $response['data']['company']['access']['AC']['expired'];
                $company->month       = $response['data']['company']['access']['AC']['month'];
                $company->save();
            }else {
                $company->name        = $response['data']['company']['name'];
                $company->address     = $response['data']['company']['address'];
                $company->website     = $response['data']['company']['website'];
                $company->quota       = $response['data']['company']['access']['AC']['quota'];
                $company->empty_space = $response['data']['company']['access']['AC']['quota'];
                $company->expired     = $response['data']['company']['access']['AC']['expired'];
                $company->month       = $response['data']['company']['access']['AC']['month'];
                $company->save();   
            }

            $user               = new Admin();
            $user->email        = $response['data']['email'];
            $user->password     = Hash::make(Hash::make($response['data']['email']));
            $user->name         = $response['data']['name'];
            $user->designation  = $response['data']['designation'];
            $user->access       = 'admin';
            $user->status       = '1';
            $user->phone_code   = $response['data']['phone_code'];
            $user->user_phone   = $response['data']['mobile'];
            $user->phone_number = $response['data']['phone_code'].$response['data']['mobile'];
            $user->company      = $company->id;
            $user->save();
        }else{
            $company = Company::where('code',$response['data']['company']['code'])->first();
            if (!$company) {
                $company              = new Company();
                $company->code        = $response['data']['company']['code'];
                $company->name        = $response['data']['company']['name'];
                $company->address     = $response['data']['company']['address'];
                $company->website     = $response['data']['company']['website'];
                $company->quota       = $response['data']['company']['access']['AC']['quota'];
                $company->empty_space = $response['data']['company']['access']['AC']['quota'];
                $company->expired     = $response['data']['company']['access']['AC']['expired'];
                $company->month       = $response['data']['company']['access']['AC']['month'];
                $company->save();
            }else {
                 $user                 = User::where(['company' => $company->id, 'access' => 'user'])->get();
            $responseEmptySpace = $response['data']['company']['access']['AC']['quota'] - count($user);
          
                $company->name        = $response['data']['company']['name'];
                $company->address     = $response['data']['company']['address'];
                $company->website     = $response['data']['company']['website'];
                $company->quota       = $response['data']['company']['access']['AC']['quota'];
                $company->empty_space = $responseEmptySpace > 0  ? $responseEmptySpace : 0;
                $company->expired     = $response['data']['company']['access']['AC']['expired'];
                $company->month       = $response['data']['company']['access']['AC']['month'];
                $company->save();   
            }

            $user               =  Admin::where('email', $response['data']['email'])->first();
      
            $user->company      = $company->id;
            $user->save();
        }

        $user = Admin::where('email', $response['data']['email'])->first();

        Auth::login($user);
        return redirect('/checklist');
    }
}
