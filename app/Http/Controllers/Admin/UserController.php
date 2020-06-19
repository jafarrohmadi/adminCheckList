<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserAdd;
use App\Mail\UserRegistered;
use App\Models\Company;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
	public function index()
	{
		$user    = User::where(['company' => Auth::user()->company])
		               ->get();
		$company = Company::where('id', Auth::user()->company)
		                  ->first();
		
		return view('admin.management_user.index', compact('user', 'company'));
	}
	
	public function store(Request $request)
	{
		$validatedData = $request->validate([
			'email'        => 'required|unique:users|max:255',
			'phone_number' => 'required|unique:users|max:255',
			'boss'         => 'required',
		]
		);

//		if ($this->getQuotaLeave() > 0) {
		$company = Auth::user()->company;
		
		$user               = new User();
		$user->name         = $request->name;
		$user->password     = bcrypt($request->name);
		$user->phone_number = '+'.normalize_phone($request->phone_number);
		$user->email        = $request->email;
		$user->access       = 'user';
		$user->designation  = $request->jabatan;
		$user->department   = $request->department;
		$user->status       = 1;
		$user->company      = $company;
		$user->phone_code   = $request->phone_code;
		$user->user_phone   = normalize_phone($request->user_phone);
		$user->boss         = $request->boss;
		$user->save();
		
		//Mail::to($request->email)->send(new UserAdd($request->name , $request->phone_number));
		$data_mail = [
			'mail_subject' => 'New User',
			'module'       => 'New User',
			'content'      => [
				'name'         => $user->name,
				'email'        => $user->email,
				'phone_code'   => $user->phone_code,
				'phone_number' => $user->phone_number,
				'company_name' => $user->getcompany->name,
			
			],
			'url'          => url('/'),
		];
		
		Mail::to($user->email)
		    ->send(new UserRegistered($data_mail));

//			$company = Company::where('id', Auth::user()->company)->first();
//
//			$user                 = User::where([
//				'company' => Auth::user()->company,
//				'access'  => 'user',
//			])->get();
//			$company->empty_space = $company->quota - count($user);
//			$company->save();

//			return $this->getQuotaLeave();
//		} else {
//			return 'false';
//		}
	}
	
	public function update(Request $request, $id)
	{
		$validatedData = $request->validate([
			'email'        => 'required|unique:users,email,'.$id,
			'|max:255',
			'phone_number' => 'required|unique:users,phone_number,'.$id,
			'|max:255',
		]
		);
		$company       = Auth::user()->company;
		
		$user               = User::find($id);
		$user->name         = $request->name;
		$user->password     = bcrypt($request->name);
		$user->phone_number = '+'.normalize_phone($request->phone_number);
		$user->email        = $request->email;
		$user->access       = 'user';
		$user->designation  = 'user';
		$user->company      = $company;
		$user->phone_code   = $request->phone_code;
		$user->designation  = $request->jabatan;
		$user->user_phone   = normalize_phone($request->user_phone);
		$user->boss         = $request->boss;
		$user->save();
		
		$data_mail = [
			'mail_subject' => 'Edit User',
			'module'       => 'Edit User',
			'content'      => [
				'name'         => $user->name,
				'email'        => $user->email,
				'phone_code'   => $user->phone_code,
				'phone_number' => $user->phone_number,
				'company_name' => $user->getcompany->name,
			
			],
			'url'          => url('/'),
		];
		
		Mail::to($user->email)
		    ->send(new UserRegistered($data_mail));
		
		return;
	}
	
	public function getAllUser()
	{
		$company = Auth::user()->company;
		
		$user = User::where(['company' => $company])
		            ->get();
		
		return view('admin.management_user.index_list', compact('user'));
	}
	
	public function destroy($id)
	{
		return User::where('id', $id)
		           ->delete();
//
//		$company              = Company::where('id', Auth::user()->company)->first();
//		$user                 = User::where([
//			'company' => Auth::user()->company,
//			'access'  => 'user',
//		])->get();
//		$company->empty_space = $company->quota - count($user);
//		$company->save();

//		return $company->empty_space;
	}

//	public function getQuotaLeave()
//	{
//		$company = Company::where('id', Auth::user()->company)->first();
//
//		return $company->empty_space;
//	}
}
