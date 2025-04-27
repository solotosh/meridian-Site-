<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProjectController extends Controller
{
    public function index() {
        //dd('projects');
        $projects = Project::all();
        return view('backend.projects.index', compact('projects'));
    }

    public function create() {
       // dd('create');
        return view('backend.projects.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'tagline' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'link' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $data = $request->only(['title', 'tagline', 'description', 'icon', 'link']);

        if ($request->hasFile('image')) {
            $filename = Str::uuid() . '.' . $request->image->extension();
            $manager = new ImageManager(new Driver());
            $manager->read($request->image->path())->resize(600, 400)
                ->save(public_path('uploads/projects/' . $filename));
            $data['image'] = 'uploads/projects/' . $filename;
        }

        Project::create($data);
        return redirect()->route('projects.index')->with('message', 'Project added successfully!');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('backend.projects.edit', compact('project'));
    }
    

    public function update(Request $request, $id){
        $project = Project::findOrFail($id); // Get the project model

        $request->validate([
            'title' => 'required|string',
            'tagline' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'link' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        $data = $request->only(['title', 'tagline', 'description', 'icon', 'link']);
    
        if ($request->hasFile('image')) {
            // Delete old image
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }
    
            // Save new image
            $filename = Str::uuid() . '.' . $request->image->extension();
            $manager = new ImageManager(new Driver());
            $manager->read($request->image->path())
                    ->resize(600, 400)
                    ->save(public_path('uploads/projects/' . $filename));
    
            $data['image'] = 'uploads/projects/' . $filename;
        }
    
        $project->update($data);
        return redirect()->route('projects.index')->with('message', 'Project updated successfully!');
    }

    public function destroy( $id) {
      //  dd($project);
       $project=Project::findOrFail($id);
        if ($project->image && file_exists(public_path($project->image))) {
            unlink(public_path($project->image));
        }
        $project->delete();
        return redirect()->route('projects.index')->with('message', 'Project deleted successfully!');
    }
    
}
