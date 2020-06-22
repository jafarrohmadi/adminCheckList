<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Models\CheckListEmployeeDetail;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
	public function index()
	{
		$location = Location::where([
			'status'  => 1,
			'company' => Auth::user()->company,
		])->get();
		
		return view('admin.location.index', compact('location'));
	}
	
	public function store(LocationRequest $request)
	{
		$login = Auth::user();
		
		$location          = new Location();
		$location->name    = (new Helper())->removetags($request->name);
		$location->company = (new Helper())->removetags($login->company);
		$location->user_id = (new Helper())->removetags($login->email);
		$location->save();
		
		return $location;
	}
	
	public function update($id, LocationRequest $request)
	{
		$location       = Location::find($id);
		$location->name = (new Helper())->removetags($request->name);
		$location->save();
		
		return $location;
	}
	
	public function delete($id)
	{
		$location         = Location::find($id);
		$location->status = 0;
		$location->save();
		
		CheckListEmployeeDetail::where('location_id', $id)->delete();
		
		return 'true';
	}
	
	public function getLocation()
	{
		$location = Location::where([
			'status'  => 1,
			'company' => Auth::user()->company,
		])->get();
		
		return view('admin.location.index_list', compact('location'));
	}
	
}
