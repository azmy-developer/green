<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $setting = Setting::first();
        return view('dashboard.core.settings.index',compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function edit(Setting $setting)
    {
        return view('dashboard.core.settings.edit' , compact('setting' ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255',
            'email' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($request->hasFile('image')){
            if ($setting->image) {
                $oldImagePath = public_path('setting/' . $setting->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('setting'), $imageName);
        }else{
            $imageName=null;
        }
        $setting->title = $request->title;
        $setting->description = $request->description;

        $setting->image = $imageName;
        $setting->phone1 = $request->phone1;
        $setting->phone2 = $request->phone2;
        $setting->email = $request->email;

        $setting->save();
        return redirect()->route('dashboard.setting.index')->with('message' , "setting Updated Successfully");
    }

}
