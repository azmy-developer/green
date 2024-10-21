<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Offer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\View\View
     */
    public function index()
    {
        $offers = Offer::all();
        return view('dashboard.core.offer.index', compact('offers'));
    }

    /**
     * @return Application|Factory|View|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.core.offer.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/offer'), $imageName);
        }else {
            $imageName=null;
        }

        Offer::create([
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'discount' => $request->input('discount'),
            'image' => $imageName,
        ]);

        return redirect()->route('dashboard.offer.index')->with('success', 'offer created successfully!');
    }

    public function edit($id)
    {
        $offer= Offer::findOrFail($id);

        return view('dashboard.core.offer.edit', compact('offer'));
    }

    public function update(Request $request, $id)
    {

        $offer = Offer::findOrFail($id);


        if ($request->hasFile('image')) {
            if ($offer->image) {
                $oldImagePath = public_path('images/offer/' . $offer->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image
                }
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/offer'), $imageName);
            $offer->image = $imageName;
        }else{
            $imageName = $offer->image;
        }

        $offer->update([
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'discount' => $request->input('discount'),
            'image' => $imageName,
        ]);

        return redirect()->route('dashboard.offer.index')->with('success', 'offer updated successfully!');
    }

    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return [
            'success' => true,
            'msg' => __("messages.deleted_success")
        ];    }
}
