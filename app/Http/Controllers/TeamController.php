<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function index()
    {
       // dd('team.index');
        $teams = Team::latest()->get();
        return view('backend.team.index', compact('teams'));
    }

    public function create()
    {
        //dd('team');
        return view('backend.team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'position' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $manager = new ImageManager(new GdDriver());
            $filename = Str::uuid() . '.' . $request->image->extension();
            $manager->read($request->image->path())
                    ->resize(500, 500)
                    ->save(public_path('uploads/team/' . $filename));
            $data['image'] = 'uploads/team/' . $filename;
        }

        Team::create($data);
        return redirect()->route('team.index')->with('message', 'Team member added!');
    }

    public function edit( $id)
    {
        $team= Team::findOrFail($id);
        return view('backend.team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id); // ✅ Make sure we get the record first
    
        $data = $request->validate([
            'name' => 'required',
            'position' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
        ]);
    
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new GdDriver());
    
            $filename = Str::uuid() . '.' . $request->image->extension();
            $manager->read($request->image->path())
                    ->resize(400, 400)
                    ->save(public_path('uploads/team/' . $filename));
    
            $data['image'] = 'uploads/team/' . $filename;
        }
    
        $team->update($data);
    
        return redirect()->route('team.index')->with('message', 'Team member updated!');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return back()->with('message', 'Team member deleted!');
    }
}
