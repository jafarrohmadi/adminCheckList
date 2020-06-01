<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Licensi;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{
    public function index()
    {
        $user_id   = Auth::id();
        $subscribe = Subscribe::where('user_id', $user_id)->get();

        return view('admin.subscribe.index', compact('subscribe'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();

        $subscribe                 = new Subscribe();
        $subscribe->amount         = 10;
        $subscribe->expired        = date('2020-09-08');
        $subscribe->price_per_user = 0;
        $subscribe->price_all      = 0;
        $subscribe->status         = 1;
        $subscribe->user_id         = Auth::id();
        $subscribe->save();
        return redirect('checklist');
    }

}
