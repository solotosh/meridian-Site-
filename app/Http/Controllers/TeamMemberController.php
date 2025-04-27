<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Illuminate\Support\Str;

class TeamMemberController extends Controller
{
    public function index()
    {
        $team = TeamMember::latest()->get();
        return view('backend.team.index', compact('team'));
    }

    public function create()
    {
        return view('backend.team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'whatsapp' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new GdDriver());
            $filename = time() . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
            $manager->read($image->getPathname())->resize(370, 370)->save(public_path('uploads/team/' . $filename));
            $data['image'] = 'uploads/team/' . $filename;
        }

        TeamMember::create($data);
        return redirect()->route('admin.team.index')->with('success', 'Team member added!');
    }

    public function edit($id)
    {
        $member = TeamMember::findOrFail($id);
        return view('backend.team.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'whatsapp' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            if ($member->image && file_exists(public_path($member->image))) {
                unlink(public_path($member->image));
            }

            $image = $request->file('image');
            $manager = new ImageManager(new GdDriver());
            $filename = time() . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
            $manager->read($image->getPathname())->resize(370, 370)->save(public_path('uploads/team/' . $filename));
            $data['image'] = 'uploads/team/' . $filename;
        }

        $member->update($data);
        return redirect()->route('admin.team.index')->with('success', 'Team member updated!');
    }
    

    public function destroy($id)
{
    $member = TeamMember::findOrFail($id);

    if ($member->image && file_exists(public_path($member->image))) {
        unlink(public_path($member->image));
    }

    $member->delete();

    return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully!');
}

}
