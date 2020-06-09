<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Models\Company;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Ramsey\Uuid\Uuid;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/checklist';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'         => ['required', 'string', 'max:255'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     * @throws \Exception
     */
    protected function create(array $data)
    {
        $company        = new Company();
        $company->code  = random_int(100000, 999999);
        $company->name  = $data['company'];
        $company->quota = 10;
        $company->empty_space = 10;
        $company->save();

        return Admin::create([
            'name'         => $data['name'],
            'email'        => $data['email'],
            'password'     => Hash::make($data['password']),
            'phone_number' => '+'.normalize_phone($data['phone_number']),
            'phone_code'   => $data['phone_code'],
            'user_phone'   => normalize_phone($data['user_phone']),
            'company'      => $company->id,
            'access'       => 'admin',
            'status'       => 1,
            'designation'  => 'Admin',
        ]);
    }
}
