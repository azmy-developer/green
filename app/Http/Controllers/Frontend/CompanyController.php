<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Company;


class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::query()->paginate(4);
        return view('frontend.core.company.company',compact('companies'));
    }

}
