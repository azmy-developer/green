<?php

namespace App\Http\Controllers\Dashboard;
use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    protected function index(){

        return view('dashboard.home');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = asset('public/uploads/images/' . $filename);

            $file->move(public_path('uploads/images'), $filename);

            return response()->json(['location' => url($filePath)]);
        }

        return response()->json(['error' => 'Image upload failed'], 400);
    }






}
