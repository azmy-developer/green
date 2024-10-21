<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\NewSlider;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index() {

        $sliders = Slider::all();
        return view('dashboard.core.slider.index', compact('sliders'));
    }

    public function create()
    {
        $categories = Slider::all();
        return view('dashboard.core.slider.create', compact('categories'));
    }


    public function store(Request $request)
    {


        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/slider'), $imageName);
        }

if ($request->hasFile('image2')) {
            $imageName2 = mt_rand(1000, 9999) . time() . '.' . $request->image2->extension();
            $request->image2->move(public_path('images/slider'), $imageName2);
        }

        Slider::create([
            'title_ar' => $request->input('title_ar'),
            'title_en' => $request->input('title_en'),
            'text_ar' => $request->input('text_ar'),
            'text_en' => $request->input('text_en'),
            'image' => $imageName,
            'image2' => $imageName2,
        ]);

        return redirect()->route('dashboard.slider.index')->with('success', 'Slider added successfully');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        return view('dashboard.core.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);



        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/slider'), $imageName);
            $slider->image = $imageName;
        }else{
            $imageName = $slider->image;
        }

        if ($request->hasFile('image2')) {
            $imageName2 = mt_rand(1000, 9999) . time() . '.' . $request->image2->extension();
            $request->image2->move(public_path('images/slider'), $imageName2);
            $slider->image2 = $imageName;
        }else{
            $imageName2 = $slider->image2;
        }

        $slider->update([
            'title_ar' => $request->input('title_ar'),
            'title_en' => $request->input('title_en'),
            'text_ar' => $request->input('text_ar'),
            'text_en' => $request->input('text_en'),
            'image' => $imageName,
            'image2' => $imageName2,
        ]);

        return redirect()->route('dashboard.slider.index')->with('success', 'Slider updated successfully');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return [
            'success' => true,
            'msg' => __("messages.deleted_success")
        ];    }

}
