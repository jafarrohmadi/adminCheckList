<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Licensi;
use Illuminate\Support\Facades\Auth;

class LicenceController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $licence = Licensi::where('user_id', $user_id)->get();

        return view('admin.licence.index', compact('licence'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();

        $licence          = new Licensi();
        $licence->license = $request->license;
        $licence->amount  = $request->amount;
        $licence->user_id = $user_id;
        $licence->save();
        return;
    }

}
