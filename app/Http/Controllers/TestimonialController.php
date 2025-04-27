<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Illuminate\Support\Str;
class TestimonialController extends Controller
{
    public function index() {
        //dd('test');
        $testimonials = Testimonial::latest()->get();
        return view('backend.testimonials.index', compact('testimonials'));
    }

    public function create() {
        return view('backend.testimonials.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'message' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $manager = new ImageManager(new GdDriver());
            $manager->read($image->getPathname())
                    ->resize(100, 100)
                    ->save(public_path('uploads/testimonials/' . $filename));
            $data['image'] = 'uploads/testimonials/' . $filename;
        }

        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added!');
    }

    public function edit($id) {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.testimonials.edit', compact('testimonial'));
    }



public function update(Request $request, $id)
{
    $testimonial = Testimonial::findOrFail($id);

    // Validate incoming data
    $data = $request->validate([
        'message' => 'required|string',
        'name' => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($testimonial->image && file_exists(public_path($testimonial->image))) {
            @unlink(public_path($testimonial->image));
        }

        // Process and save new image
        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();

        $manager = new ImageManager(new GdDriver());
        $manager->read($image->getPathname())
                ->resize(100, 100)
                ->save(public_path('uploads/testimonials/' . $filename));

        $data['image'] = 'uploads/testimonials/' . $filename;
    }

    // Update testimonial with new data
    $testimonial->update($data);

    return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated!');
}



    public function destroy($id) {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->image && file_exists(public_path($testimonial->image))) {
            unlink(public_path($testimonial->image));
        }
        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted!');
    }
}
