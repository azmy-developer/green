<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Service;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('dashboard.core.product.index', compact('products'));
    }



    public function create()
    {
        $companies = Company::all();

        return view('dashboard.core.product.create',compact('companies'));
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
            'category_id' => 'required|exists:categories,id',
            'code' =>'required',
            'price' =>'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // تحقق من جميع الصور المرسلة
        ]);

        // رفع الصورة الرئيسية
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('product'), $imageName);
        } else {
            $imageName = null;
        }

        // إنشاء خدمة جديدة
        $service = new Product();
        $service->name_ar = $request->name_ar;
        $service->name_en = $request->name_en;
        $service->desc_ar = $request->desc_ar;
        $service->desc_en = $request->desc_en;
        $service->company_id = $request->company_id;
        $service->category_id = $request->category_id;
        $service->code = $request->code;
        $service->image = $imageName;
        $service->price = $request->price;
        $service->save();



        return redirect()->route('dashboard.product.index')->with('success', 'تم إنشاء الخدمة بنجاح');
    }



    public function show($id)
    {

    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $companies = Company::all();
        return view('dashboard.core.product.edit', compact('product', 'categories','companies'));
    }

    public function update(Request $request, $id)
    {
        $service = Product::findOrFail($id);

        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'desc_ar' => 'required|string',
            'desc_en' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:categories,id',
            'code' =>'required',
            'price' =>'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // تحقق من جميع الصور المرسلة
        ]);

        if ($request->hasFile('image')) {

            if ($service->image) {
                $oldImagePath = public_path('product/' . $service->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('product'), $imageName);
            $service->image = $imageName;
        }else{
            $imageName = $service->image;
        }

        $service->update([

            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'desc_ar' => $request->input('desc_ar'),
            'desc_en' => $request->input('desc_en'),
            'company_id' => $request->input('company_id'),
            'category_id' => $request->input('category_id'),
            'code' => $request->input('code'),
            'price' => $request->input('price'),
            'image' => $imageName,
        ]);


        return redirect()->route('dashboard.product.index')->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        $service = Product::findOrFail($id);
        $service->delete();

        return [
            'success' => true,
            'msg' => __("messages.deleted_success")
        ];
    }



    public function getImages($id)
    {
        $galleryImages = ProductImage::where('product_id', $id)->get();
        return response()->json(['images' => $galleryImages]);
    }

    public function deleteImage(Request $request, $id)
    {
        $image = ProductImage::findOrFail($id);

        // Remove the image from the server
        $imagePath = public_path('products/'.$id.'/' . $image->url);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Remove file
        }

        // Delete the image record from the database
        $image->delete();

        return response()->json(['success' => 'Image deleted successfully']);
    }


    public function upload(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $productId = $request->product_id;


        if ($request->hasFile('file')) {
            $image = $request->file('file');

            $filename = time() . '_' . uniqid() . '.' . $image->extension();
            $image->move(public_path('products/'.$productId.'/'), $filename); // Move image to storage

            // Save image path in the gallery_images table
            ProductImage::create([
                'product_id' => $productId,
                'url' => $filename,
            ]);


            return response()->json(['success' => 'Images uploaded successfully']);
        }

        return response()->json(['error' => 'File upload failed'], 400);
    }
}
