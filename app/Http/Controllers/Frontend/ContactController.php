<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;


class ContactController extends Controller
{

    public function index()
    {
        $setting =Setting::first();
        return view('frontend.core.contact', compact('setting'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'con_name' => 'required|string',
            'con_subject' => 'required|string',
            'con_email' => 'required',
            'con_message' => 'nullable',

        ]);

            Contact::create($request->all());
            session()->flash('success', __('front.success-send-message'));
            return redirect()->back();
    }

}
