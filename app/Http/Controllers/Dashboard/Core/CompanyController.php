<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::all();
        return view('dashboard.core.company.index', compact('companies'));
    }



    public function create()
    {
        return view('dashboard.core.company.create');
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
            $request->image->move(public_path('company'), $imageName);
        } else {
            $imageName = null;
        }

        // إنشاء خدمة جديدة
        $service = new Company();
        $service->name_ar = $request->name_ar;
        $service->name_en = $request->name_en;
        $service->desc_ar = $request->desc_ar;
        $service->desc_en = $request->desc_en;
        $service->image = $imageName;
        $service->save();



        return redirect()->route('dashboard.company.index')->with('success', 'تم إنشاء شركه بنجاح');
    }



    public function show($id)
    {

    }


    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('dashboard.core.company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'desc_ar' => 'required|string',
            'desc_en' => 'required|string',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // تحقق من جميع الصور المرسلة
        ]);

        if ($request->hasFile('image')) {

            if ($company->image) {
                $oldImagePath = public_path('company/' . $company->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('company'), $imageName);
            $company->image = $imageName;
        }else{
            $imageName = $company->image;
        }

        $company->update([

            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'desc_ar' => $request->input('desc_ar'),
            'desc_en' => $request->input('desc_en'),
            'image' => $imageName,
        ]);


        return redirect()->route('dashboard.company.index')->with('success', 'Company updated successfully');
    }

    public function destroy($id)
    {
        $service = Company::findOrFail($id);
        $service->delete();

        return [
            'success' => true,
            'msg' => __("messages.deleted_success")
        ];
    }
}
