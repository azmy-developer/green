<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index() {

        $teams = Team::all();
        return view('dashboard.core.team.index',compact('teams'));
    }


    public function create()
    {
        return view('dashboard.core.team.create');
    }


    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('teams'), $imageName);
            } else {
                $imageName=null;
            }

            Team::create([
                 'name' => $request->name,
                  'job_ar' => $request->job_ar,
                 'job_en' => $request->job_en,
                 'image' => $imageName,
                 'address'=>$request->address,
                 'phone'=>$request->phone,
                 'email'=>$request->email,
                 'fb'=>$request->fb,
                 'twitter'=>$request->twitter,
                 'inst'=>$request->inst,
            ]);

            return redirect()->route('dashboard.team.index')->with('success', 'Team added successfully');

    }


    public function edit($id)
    {
        $team =  Team::findOrFail($id);
        return view('dashboard.core.team.edit', compact('team'));
    }

   public function update(Request $request, $id)
{
    $team = Team::findOrFail($id);

    if ($request->hasFile('image')) {
        if ($team->image) {
            $oldImagePath = public_path('teams/' . $team->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image
            }
        }
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('teams'), $imageName);
    } else {
        $imageName = $team->image;
    }

    $team->update([
        'name' => $request->input('name'),
        'image' => $imageName,
        'address' => $request->input('address'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'job_ar' => $request->input('job_ar'),
        'job_en' => $request->input('job_en'),
        'fb'=>$request->fb,
        'twitter'=>$request->twitter,
        'inst'=>$request->inst,
    ]);

    return redirect()->route('dashboard.team.index')->with('success', 'تم تحديث الفريق بنجاح!');
}

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return [
            'success' => true,
            'msg' => __("messages.deleted_success")
        ];    }

}
