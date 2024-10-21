<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;


class AboutController extends Controller
{

    public function index()
    {
        $about = About::first();
        return view('dashboard.core.about.index',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function edit(About $about)
    {
        return view('dashboard.core.about.edit' , compact('about' ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\About $about
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required|max:255',
            'vision_ar' => 'nullable',
            'vision_en' => 'nullable',
            'goals_ar' => 'nullable',
            'goals_en' => 'nullable',
            'message_ar' => 'nullable',
            'message_en' => 'nullable',
            'solutions_ar' => 'nullable',
            'solutions_en' => 'nullable',
            'strategy_ar' => 'nullable',
            'strategy_en' => 'nullable',
        ]);
        $requestData = $request->all();

        if ($request->hasFile('vision_img')) {
            if ($about->vision_img) {
                $oldImagePath = public_path('about/' . $about->vision_img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName = mt_rand(100000000, 9999999999) . time() . '.' . $request->vision_img->extension();
            $request->vision_img->move(public_path('about'), $imageName);
            $about->vision_img = $imageName;
        }else{
            $imageName = $about->vision_img;
        }
        if ($request->hasFile('goals_img')) {
            if ($about->goals_img) {
                $oldImagePath = public_path('about/' . $about->goals_img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName2 = mt_rand(100000, 999999999) . time() . '.' . $request->goals_img->extension();
            $request->goals_img->move(public_path('about'), $imageName2);
            $about->goals_img = $imageName2;
        }else{
            $imageName2 = $about->goals_img;
        }

        if ($request->hasFile('message_img')) {
            if ($about->message_img) {
                $oldImagePath = public_path('about/' . $about->message_img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName3 = mt_rand(100, 999) . time() . '.' . $request->message_img->extension();
            $request->message_img->move(public_path('about'), $imageName3);
            $about->message_img = $imageName3;
        }else{
            $imageName3 = $about->message_img;
        }

        if ($request->hasFile('solutions_img')) {
            if ($about->solutions_img) {
                $oldImagePath = public_path('about/' . $about->solutions_img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName4 = mt_rand(1000, 99999) . time() . '.' . $request->solutions_img->extension();
            $request->solutions_img->move(public_path('about'), $imageName4);
            $about->solutions_img = $imageName4;
        }else{
            $imageName4 = $about->solutions_img;
        }

        if ($request->hasFile('strategy_img')) {
            if ($about->strategy_img) {
                $oldImagePath = public_path('about/' . $about->strategy_img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName5 = mt_rand(100000, 9999999) . time() . '.' . $request->strategy_img->extension();
            $request->strategy_img->move(public_path('about'), $imageName5);
            $about->strategy_img = $imageName5;
        }else{
            $imageName5 = $about->strategy_img;
        }
        // Merge imageName5 into the request data
        $requestData['vision_img'] = $imageName;
        $requestData['goals_img'] = $imageName2;
        $requestData['message_img'] = $imageName3;
        $requestData['solutions_img'] = $imageName4;
        $requestData['strategy_img'] = $imageName5;

        // Update the content
        $about->update($requestData);
        return redirect()->route('dashboard.about.index')->with('message' , "About Updated Successfully");
    }

}
