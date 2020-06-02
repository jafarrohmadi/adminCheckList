<?php

namespace App\Http\Controllers;

use App\Mail\DemoRequested;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ComproController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('compro.index');
    }

    public function product()
    {
        return view('compro.product');
    }

    public function price()
    {
        return view('compro.price');
    }

    public function faq()
    {
        return view('compro.faq');
    }

    public function contactUs(Request $request)
    {
        $contactUs                 = new ContactUs();
        $contactUs->name           = $request->name;
        $contactUs->email          = $request->email;
        $contactUs->company_name   = $request->company_name;
        $contactUs->country        = $request->country;
        $contactUs->count_employee = $request->count_employee;
        $contactUs->phone_code     = $request->phone_code;
        $contactUs->phone_number   = $request->mobile_init;
        $contactUs->type           = $request->type;
        $contactUs->save();

        $to_mail   = 'itdevelopment@airmasgroup.co.id';
        $data_mail = [
            'mail_subject' => 'Contact Us',
            'module'       => 'Contact Us',
            'content'      => [
                'name'           => $contactUs->name,
                'email'          => $contactUs->email,
                'company_name'   => $contactUs->company_name,
                'country'        => $contactUs->country,
                'count_employee' => $contactUs->count_employee,
                'phone_code'     => $contactUs->phone_code,
                'phone_number'   => $contactUs->phone_number,
                'type'           => $contactUs->type,
            ],
            'url'          => url('/'),
        ];

        Mail::to($to_mail)->send(new DemoRequested($data_mail));

        $success = true;
        return;
    }
}
