<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cover;
use App\Models\NewSlider;
use App\Models\Slider;
use Illuminate\Http\Request;

class CoverController extends Controller
{


    public function create()
    {

        return view('dashboard.core.cover.update');
    }
    public function store(Request $request)
    {


        if ($request->hasFile('about_cover')) {
            $imageName = mt_rand(100, 999) . time() . '.' . $request->about_cover->extension();
            $request->about_cover->move(public_path('images/covers'), $imageName);
        }

        if ($request->hasFile('contact_cover')) {
            $imageName2 = mt_rand(1000, 9999999) . time() . '.' . $request->contact_cover->extension();
            $request->contact_cover->move(public_path('images/covers'), $imageName2);
        }

        if ($request->hasFile('blog_cover')) {
            $imageName3 = mt_rand(1000, 999999999) . time() . '.' . $request->blog_cover->extension();
            $request->blog_cover->move(public_path('images/covers'), $imageName3);
        }

        if ($request->hasFile('product_cover')) {
            $imageName4 = mt_rand(1000, 999999999999) . time() . '.' . $request->product_cover->extension();
            $request->product_cover->move(public_path('images/covers'), $imageName4);
        }

        if ($request->hasFile('company_cover')) {
            $imageName5 = mt_rand(1000, 999999999999) . time() . '.' . $request->company_cover->extension();
            $request->company_cover->move(public_path('images/covers'), $imageName5);
        }


        Cover::create([
            'about_cover' => $imageName,
            'contact_cover' => $imageName2,
            'blog_cover' => $imageName3,
            'product_cover' => $imageName4,
            'company_cover' => $imageName5,
        ]);

        return redirect()->route('dashboard.cover.create')->with('success', 'Slider added successfully');
    }

    public function update(Request $request, $id)
    {
        $slider = Cover::findOrFail($id);



        if ($request->hasFile('about_cover')) {
            if ($slider->image) {
                $oldImagePath = public_path('images/covers/' . $slider->about_cover);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName = mt_rand(100, 999) . time() . '.' . $request->about_cover->extension();
            $request->about_cover->move(public_path('images/covers'), $imageName);
        }else{
            $imageName = $slider->about_cover;
        }

        if ($request->hasFile('contact_cover')) {
            if ($slider->image) {
                $oldImagePath = public_path('images/covers/' . $slider->contact_cover);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName2 = mt_rand(100000, 9999999) . time() . '.' . $request->contact_cover->extension();
            $request->contact_cover->move(public_path('images/covers'), $imageName2);
        }else{
            $imageName2 = $slider->contact_cover;
        }

        if ($request->hasFile('blog_cover')) {
            if ($slider->blog_cover) {
                $oldImagePath = public_path('images/covers/' . $slider->blog_cover);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName3 = mt_rand(100000, 999999) . time() . '.' . $request->blog_cover->extension();
            $request->blog_cover->move(public_path('images/covers'), $imageName3);
        }else{
            $imageName3 = $slider->blog_cover;
        }

        if ($request->hasFile('product_cover')) {
            if ($slider->product_cover) {
                $oldImagePath = public_path('images/covers/' . $slider->product_cover);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName4 = mt_rand(100000, 9999999999) . time() . '.' . $request->product_cover->extension();
            $request->product_cover->move(public_path('images/covers'), $imageName4);
        }else{
            $imageName4 = $slider->product_cover;
        }

        if ($request->hasFile('company_cover')) {
            if ($slider->company_cover) {
                $oldImagePath = public_path('images/covers/' . $slider->company_cover);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName5 = mt_rand(100000, 9999999999) . time() . '.' . $request->company_cover->extension();
            $request->company_cover->move(public_path('images/covers'), $imageName5);
        }else{
            $imageName5 = $slider->company_cover;
        }

        $slider->update([
            'about_cover' => $imageName,
            'contact_cover' => $imageName2,
            'blog_cover' => $imageName3,
            'product_cover' => $imageName4,
            'company_cover' => $imageName5,
        ]);

        return redirect()->route('dashboard.cover.create')->with('success', 'Slider updated successfully');
    }


}
