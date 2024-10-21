<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\View\View
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('dashboard.core.blog.index', compact('blogs'));
    }

    /**
     * @return Application|Factory|View|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.core.blog.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('blogs'), $imageName);
        }else {
            $imageName=null;
        }

        Blog::create([
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'desc_ar' => $request->input('desc_ar'),
            'desc_en' => $request->input('desc_en'),
            'image' => $imageName,
        ]);

        return redirect()->route('dashboard.blog.index')->with('success', 'Blog created successfully!');
    }

    public function edit($id)
    {
        $blog= Blog::findOrFail($id);

        return view('dashboard.core.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {

        $blog = Blog::findOrFail($id);


        if ($request->hasFile('image')) {
            if ($blog->image) {
                $oldImagePath = public_path('blogs/' . $blog->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('blogs'), $imageName);
            $blog->image = $imageName;
        }else{
            $imageName = $blog->image;
        }

        $blog->update([
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'desc_ar' => $request->input('desc_ar'),
            'desc_en' => $request->input('desc_en'),
            'image' => $imageName,
        ]);

        return redirect()->route('dashboard.blog.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return [
            'success' => true,
            'msg' => __("messages.deleted_success")
        ];    }
}
