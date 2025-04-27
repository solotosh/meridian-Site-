<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AboutLandSurvey;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class AboutLandSurveyController extends Controller
{
    public function index()
    {
        $entries = AboutLandSurvey::latest()->get();
        return view('backend.about.all', compact('entries'));
    }

    public function create()
    {
        return view('backend.about.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'author_name' => 'nullable|string',
            'author_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'category' => 'nullable|string',
            'status' => 'nullable|string',
            'link' => 'nullable|string',
            'icon_class' => 'nullable|string|max:100',
        ]);
    
        $entry = new AboutLandSurvey();
        $manager = new ImageManager(new GdDriver());
    
        // Store text fields first
        $entry->fill($request->only([
            'title',
            'description',
            'author_name',
            'category',
            'status',
            'link',
            'icon_class'
        ]));
    
        // Store and resize main image
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_main.' . $imageFile->extension();
            $image = $manager->read($imageFile->getPathname());
            $image->resize(370, 240)->save(public_path('uploads/about_land/' . $imageName));
            $entry->image = 'uploads/about_land/' . $imageName;
        }
    
        // Store and resize author image
        if ($request->hasFile('author_image')) {
            $authorImageFile = $request->file('author_image');
            $authorImageName = time() . '_author.' . $authorImageFile->extension();
            $authorImg = $manager->read($authorImageFile->getPathname());
            $authorImg->resize(100, 100)->save(public_path('uploads/about_land/' . $authorImageName));
            $entry->author_image = 'uploads/about_land/' . $authorImageName;
        }
    
        // Save to database
        $entry->save();
    
        return redirect()->route('admin.about.land.index')->with([
            'message' => 'Entry created successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $entry = AboutLandSurvey::findOrFail($id);
        return view('backend.about.edit', compact('entry'));
    }

    public function update(Request $request, $id)
    {
        $entry = AboutLandSurvey::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'author_name' => 'nullable|string',
            'author_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'category' => 'nullable|string',
            'status' => 'nullable|string',
            'link' => 'nullable',
            'icon_class' => 'nullable|string|max:100',
        ]);

        $manager = new ImageManager(new GdDriver());

        if ($request->hasFile('image')) {
            if ($entry->image && file_exists(public_path($entry->image))) {
                unlink(public_path($entry->image));
            }

            $imageFile = $request->file('image');
            $imageName = time() . '_main.' . $imageFile->extension();
            $manager->read($imageFile->getPathname())
                    ->resize(370, 240)
                    ->save(public_path('uploads/about_land/' . $imageName));
            $entry->image = 'uploads/about_land/' . $imageName;
        }

        if ($request->hasFile('author_image')) {
            if ($entry->author_image && file_exists(public_path($entry->author_image))) {
                unlink(public_path($entry->author_image));
            }

            $authorImageFile = $request->file('author_image');
            $authorImageName = time() . '_author.' . $authorImageFile->extension();
            $manager->read($authorImageFile->getPathname())
                    ->resize(100, 100)
                    ->save(public_path('uploads/about_land/' . $authorImageName));
            $entry->author_image = 'uploads/about_land/' . $authorImageName;
        }

        $entry->update($request->only([
            'title', 'description', 'author_name', 'category', 'status', 'link','icon_class' 
        ]));

        return redirect()->route('admin.about.land.index')->with([
            'message' => 'Entry updated successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $entry = AboutLandSurvey::findOrFail($id);

        if ($entry->image && file_exists(public_path($entry->image))) {
            unlink(public_path($entry->image));
        }

        if ($entry->author_image && file_exists(public_path($entry->author_image))) {
            unlink(public_path($entry->author_image));
        }

        $entry->delete();

        return redirect()->route('admin.about.land.index')->with([
            'message' => 'Entry deleted successfully!',
            'alert-type' => 'success'
        ]);
    }


}
