<?php

namespace App\Http\Controllers\Frontend;
use App;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class IndexController extends Controller
{
    public function index(){

        $sliders = Slider::all();
        $companies = App\Models\Company::all();
        $offers = App\Models\Offer::all();
        $products = App\Models\Product::query()->orderBy('created_at','desc')->inRandomOrder()->limit(8)->get();
        $teams = App\Models\Team::all();
        $blogs = App\Models\Blog::all();
        return view('frontend.home', compact('sliders','companies','offers','products','teams','blogs'));
    }

    public function changeLanguage()
    {
        $lang = request()->query('locale');
        App::setLocale($lang);
        Session::put('locale', $lang);
        LaravelLocalization::setLocale($lang);
        $url = LaravelLocalization::getLocalizedURL(App::getLocale(), \URL::previous());
        return Redirect::to($url);
    }

}
