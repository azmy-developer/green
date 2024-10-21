<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;


class CategoryController extends Controller
{

    public function show($id)
    {
        $categories = Category::whereCompanyId($id)->paginate(12);
        return view('frontend.core.category.show',compact('categories'));
    }

}
