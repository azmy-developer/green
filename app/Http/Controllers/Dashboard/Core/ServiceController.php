<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::all();
        return view('dashboard.core.service.index', compact('services'));
    }



    public function create()
    {
        return view('dashboard.core.service.create');
    }

    public function store(Request $request)
    {
//         dd($request);

        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'desc_ar' => 'required|string',
            'desc_en' => 'required|string',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // تحقق من جميع الصور المرسلة
        ]);

        // رفع الصورة الرئيسية
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('services'), $imageName);
        } else {
            $imageName = null;
        }

        // إنشاء خدمة جديدة
        $service = new Service();
        $service->name_ar = $request->name_ar;
        $service->name_en = $request->name_en;
        $service->desc_ar = $request->desc_ar;
        $service->desc_en = $request->desc_en;
        $service->image = $imageName;
        $service->save();



        return redirect()->route('dashboard.service.index')->with('success', 'تم إنشاء الخدمة بنجاح');
    }



    public function show($id)
    {

    }


    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('dashboard.core.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'desc_ar' => 'required|string',
            'desc_en' => 'required|string',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // تحقق من جميع الصور المرسلة
        ]);

        if ($request->hasFile('image')) {

            if ($service->image) {
                $oldImagePath = public_path('services/' . $service->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('services'), $imageName);
            $service->image = $imageName;
        }else{
            $imageName = $service->image;
        }

        $service->update([

            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'desc_ar' => $request->input('desc_ar'),
            'desc_en' => $request->input('desc_en'),
            'image' => $imageName,
        ]);


        return redirect()->route('dashboard.service.index')->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return [
            'success' => true,
            'msg' => __("messages.deleted_success")
        ];
    }
}
