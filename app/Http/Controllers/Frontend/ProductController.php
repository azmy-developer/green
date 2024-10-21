<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function show(Request $request,$id)
    {

        // Get sorting and pagination values from request
        $sort = $request->input('sort', 'default');
        $pageSize = $request->input('pageSize', 20); // Default to 20 items per page

        // Build product query based on sort option
        $productsQuery = Product::query()->whereCategoryId($id);

        switch ($sort) {
            case 'name':
                $productsQuery->orderBy('name', 'asc');
                break;
            case 'price':
                $productsQuery->orderBy('price', 'asc');
                break;
            default:
                // Default sorting (e.g., by created date)
                $productsQuery->orderBy('created_at', 'desc');
                break;
        }

        // Paginate products based on the page size
        $products = $productsQuery->paginate($pageSize);
        // Retrieve categories for the filter view
        $categories = Category::with('subcategories')->get();
        return view('frontend.core.product.show',compact('products','categories'));

    }

    public function showByCompany(Request $request,$id)
    {
        // Get sorting and pagination values from request
        $sort = $request->input('sort', 'default');
        $pageSize = $request->input('pageSize', 20); // Default to 20 items per page

        // Build product query based on sort option
        $productsQuery = Product::query()->whereCompanyId($id);

        switch ($sort) {
            case 'name':
                $productsQuery->orderBy('name', 'asc');
                break;
            case 'price':
                $productsQuery->orderBy('price', 'asc');
                break;
            default:
                // Default sorting (e.g., by created date)
                $productsQuery->orderBy('created_at', 'desc');
                break;
        }

        // Paginate products based on the page size
        $products = $productsQuery->paginate($pageSize);
        $companyName = Company::whereId($id)->first()?->name;
// Retrieve categories for the filter view
        $categories = Category::with('subcategories')->whereCompanyId($id)->get();
        return view('frontend.core.product.show',compact('products','categories','companyName'));
    }


    public function filterProducts(Request $request)
    {

        $sort = $request->input('sort', 'default');
        $pageSize = $request->input('pageSize', 20);
        $categoryId = $request->input('category');
        $name = $request->input('name');

        $productsQuery = Product::query();

        if ($request->input('company_id')) {
            $productsQuery->where('company_id',$request->input('company_id'));
        }


        if ($categoryId && $categoryId != 0) {
            $productsQuery->where('category_id', $categoryId);
        }

        if ($name) {
            $productsQuery->where(function ($query) use ($name) {
                $query->where('name_ar', 'LIKE', "%{$name}%")
                    ->orWhere('name_en', 'LIKE', "%{$name}%");
            });
        }

        switch ($sort) {
            case 'name':
                $productsQuery->orderBy('name', 'asc');
                break;
            case 'price':
                $productsQuery->orderBy('price', 'asc');
                break;
            default:
                $productsQuery->orderBy('created_at', 'desc');
                break;
        }

        $products = $productsQuery->paginate($pageSize);
        dd($products);
        // If it's an AJAX request, return JSON response with HTML
        if ($request->ajax()) {
            $html = view('frontend.core.product.partials.product_list', compact('products'))->render();
            $paginate = view('frontend.core.product.partials.paginate', compact('products'))->render();

            return response()->json(['html' => $html,'pagination' => $paginate]);
        }
// Retrieve categories for the filter view
        $categories = Category::with('subcategories')->whereCompanyId($request->input('company_id'))->get();
        // If not AJAX, return the full page
        return view('frontend.core.product.show', compact('products', 'categories'));
    }


    public function detail($id)
    {
        $product = Product::with('images')->whereId($id)->first();
        $products = Product::whereCategoryId($product->category_id)->inRandomOrder()->get();
        return view('frontend.core.product.detail',compact('product','products'));
    }


    public function showByNameProduct(Request $request)
    {
        // Get sorting and pagination values from request
        $pageSize = $request->input('pageSize', 20); // Default to 20 items per page
        $name = $request->input('name');

        // Build product query based on sort option
        $productsQuery = Product::query();
        if ($name) {
            $productsQuery->where('name_ar', 'LIKE', "%{$name}%")
                ->orWhere('name_en', 'LIKE', "%{$name}%");
        }
        // Paginate products based on the page size
        $products = $productsQuery->paginate($pageSize);

// Retrieve categories for the filter view
        $categories = Category::with('subcategories')->get();
        return view('frontend.core.product.show',compact('products','categories'));
    }

}
