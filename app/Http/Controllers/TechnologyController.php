<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class TechnologyController extends Controller
{
    protected $imageManager;

    public function __construct()
    {
        $this->imageManager = new ImageManager(new GdDriver());
    }

    public function index()
    {
        $technologies = Technology::latest()->get();
        return view('backend.technology.index', compact('technologies'));
    }

    public function create()
    {
        return view('backend.technology.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'long_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = public_path('uploads/technology/' . $filename);

            // Resize and save
            $this->imageManager->read($file)->resize(270, 330)->save($path);
            $data['image'] = 'uploads/technology/' . $filename;
        }

        Technology::create($data);

        return redirect()->route('technologies.index')->with('success', 'Technology added successfully!');
    }

    public function edit(Technology $technology)
    {
        return view('backend.technology.edit', compact('technology'));
    }

    public function update(Request $request, Technology $technology)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'long_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($technology->image && File::exists(public_path($technology->image))) {
                File::delete(public_path($technology->image));
            }

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = public_path('uploads/technology/' . $filename);

            // Resize and save
            $this->imageManager->read($file)->resize(270, 330)->save($path);
            $data['image'] = 'uploads/technology/' . $filename;
        }

        $technology->update($data);

        return redirect()->route('technologies.index')->with('success', 'Technology updated successfully!');
    }

    public function destroy(Technology $technology)
    {
        if ($technology->image && File::exists(public_path($technology->image))) {
            File::delete(public_path($technology->image));
        }

        $technology->delete();

        return redirect()->route('technologies.index')->with('success', 'Technology deleted successfully!');
    }
}
