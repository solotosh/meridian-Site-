<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class AboutController extends Controller
{
    // Show all About Us entries
    public function allAbout()
    {
        $about = About::all();
        return view('backend.about_main.index', compact('about'));
    }

    // Show create form
    public function addAbout()
    {
        return view('backend.about_main.create');
    }

    // Store new entry
    public function store(Request $request)
    {
        $data = $request->validate([
            'heading' => 'required|string|max:255',
            'subheading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'highlight_number' => 'nullable|string|max:255',
            'highlight_text' => 'nullable|string|max:255',
            'link_text' => 'nullable|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'image_top' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_bottom' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        $manager = new ImageManager(new GdDriver());
    
        // Process Top Image
        if ($request->hasFile('image_top')) {
            $image = $request->file('image_top');
            $imageName = time() . '_top.' . $image->getClientOriginalExtension();
            $manager->read($image->getPathname())->resize(440, 570)->save(public_path('uploads/about/' . $imageName));
            $data['image_top'] = 'uploads/about/' . $imageName;
        }
    
        // Process Bottom Image
        if ($request->hasFile('image_bottom')) {
            $image = $request->file('image_bottom');
            $imageName = time() . '_bottom.' . $image->getClientOriginalExtension();
            $manager->read($image->getPathname())->resize(600, 500)->save(public_path('uploads/about/' . $imageName));
            $data['image_bottom'] = 'uploads/about/' . $imageName;
        }
        //dd($data);
    
        // ✅ Save data
        About::create($data);
    
        return redirect()->route('allabout')->with([
            'message' => 'About info added!',
            'alert-type' => 'success'
        ]);
    }
    

    // Show edit form
    public function EditAbout($id)
    {
        $about = About::findOrFail($id);
        return view('backend.about_main.edit', compact('about'));
    }

    // Update existing entry
    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'heading' => 'required|string|max:255',
            'subheading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'highlight_number' => 'nullable|string|max:255',
            'highlight_text' => 'nullable|string|max:255',
            'link_text' => 'nullable|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'image_top' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_bottom' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        $manager = new ImageManager(new GdDriver());
    
        if ($request->hasFile('image_top')) {
            if ($about->image_top && file_exists(public_path($about->image_top))) {
                unlink(public_path($about->image_top));
            }
            $image = $request->file('image_top');
            $imageName = time() . '_top.' . $image->getClientOriginalExtension();
            $manager->read($image->getPathname())->resize(440, 570)->save(public_path('uploads/about/' . $imageName));
            $data['image_top'] = 'uploads/about/' . $imageName;
        }
    
        if ($request->hasFile('image_bottom')) {
            if ($about->image_bottom && file_exists(public_path($about->image_bottom))) {
                unlink(public_path($about->image_bottom));
            }
            $image = $request->file('image_bottom');
            $imageName = time() . '_bottom.' . $image->getClientOriginalExtension();
            $manager->read($image->getPathname())->resize(600, 500)->save(public_path('uploads/about/' . $imageName));
            $data['image_bottom'] = 'uploads/about/' . $imageName;
        }
    
        $about->update($data);
    
        return redirect()->route('allabout')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }
    
    // Delete entry
    public function destroy(About $about)
    {
        if ($about->image_top && file_exists(public_path($about->image_top))) {
            unlink(public_path($about->image_top));
        }

        if ($about->image_bottom && file_exists(public_path($about->image_bottom))) {
            unlink(public_path($about->image_bottom));
        }

        $about->delete();

        return redirect()->back()->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
