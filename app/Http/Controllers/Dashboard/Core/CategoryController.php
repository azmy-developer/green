<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('dashboard.core.category.index', compact('categories'));
    }



    public function create()
    {
        $companies = Company::all();

        return view('dashboard.core.category.create',compact('companies'));
    }

    public function store(Request $request)
    {
//         dd($request);

        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'desc_ar' => 'required|string',
            'desc_en' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // تحقق من جميع الصور المرسلة
        ]);

        // رفع الصورة الرئيسية
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('category'), $imageName);
        } else {
            $imageName = null;
        }

        // إنشاء خدمة جديدة
        $service = new Category();
        $service->name_ar = $request->name_ar;
        $service->name_en = $request->name_en;
        $service->desc_ar = $request->desc_ar;
        $service->desc_en = $request->desc_en;
        $service->image = $imageName;
        $service->company_id = $request->company_id;
        $service->save();



        return redirect()->route('dashboard.category.index')->with('success', 'تم إنشاء شركه بنجاح');
    }



    public function show($id)
    {

    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $companies = Company::all();
        return view('dashboard.core.category.edit', compact('category','companies'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'desc_ar' => 'required|string',
            'desc_en' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // تحقق من جميع الصور المرسلة
        ]);

        if ($request->hasFile('image')) {

            if ($category->image) {
                $oldImagePath = public_path('category/' . $category->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('company'), $imageName);
            $category->image = $imageName;
        }else{
            $imageName = $category->image;
        }

        $category->update([

            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'desc_ar' => $request->input('desc_ar'),
            'desc_en' => $request->input('desc_en'),
            'company_id' => $request->input('company_id'),
            'image' => $imageName,
        ]);


        return redirect()->route('dashboard.category.index')->with('success', 'Company updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return [
            'success' => true,
            'msg' => __("messages.deleted_success")
        ];
    }


    public function getCategories($companyId)
    {
        $categories = Category::where('company_id', $companyId)->get()->pluck('name', 'id');
        return response()->json($categories);
    }
}
