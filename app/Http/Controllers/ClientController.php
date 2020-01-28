<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\CheckListEmployee;
use App\Models\User;
use Faker\Factory as Faker;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

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

        return redirect(config('app.client_url') . 'oauth/authorize?' . $query);
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

        $response = json_decode((string)$response->getBody(), true);
        $user = (new Helper)->admin__add_user($response['data']);
        Cookie::queue('bearer', $at, 60);

        $data         = $this->getUserEmployee();
        if (count($user) !== count($data['data'])) {
            foreach ($data['data'] as $datas) {
                $user              = new User();
                $user->email       = $datas['email'];
                $user->password    = Hash::make('jafar123');
                $user->nik         = $datas['nik'] ??  random_int(1000000000, 9000000000);
                $user->name        = $datas['name'];
                $user->division    = $datas['division'];
                $user->department  = $datas['department'];
                $user->photo       = $datas['photo'];
                $user->designation = $datas['designation'];
                $user->save();
            }
        }
        Auth::login($user);

        return redirect('/checklist');
    }

    public function getUserEmployee()
    {
        if (Cookie::has('bearer')) {
            $client = new Client();
            $response = $client->request('POST', config('app.client_url') . 'api/data/users', [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . Cookie::get('bearer'),
                    ],
                ]
            );
            $response = json_decode((string)$response->getBody(), true);
            return $response;
        }
        return false;
    }

    protected function getUserEmployeeNameById($id)
    {
        $data = [];
        foreach ($this->getUserEmployee() as $item) {
            $data[$item['id']] = $item;
        }

        return $data[$id]['name'];
    }
}
