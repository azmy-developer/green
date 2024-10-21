<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;


class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::query()->paginate(12);
        return view('frontend.core.blog.index',compact('blogs'));
    }
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('frontend.core.blog.show',compact('blog'));
    }

}
