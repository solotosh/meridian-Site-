<?php


namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();
        return view('backend.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('backend.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver);
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('uploads/partners/' . $filename);

        File::ensureDirectoryExists(public_path('uploads/partners'));
        $manager->read($image)->resize(280, 170)->save($path);

        Partner::create([
            'name' => $request->name,
            'image' => 'uploads/partners/' . $filename,
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner added successfully.');
    }

    public function edit(Partner $partner)
    {
        return view('backend.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $data = ['name' => $request->name];

        if ($request->hasFile('image')) {
            if (File::exists(public_path($partner->image))) {
                File::delete(public_path($partner->image));
            }

            $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver);
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/partners/' . $filename);

            File::ensureDirectoryExists(public_path('uploads/partners'));
            $manager->read($image)->resize(380, 270)->save($path);

            $data['image'] = 'uploads/partners/' . $filename;
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        if (File::exists(public_path($partner->image))) {
            File::delete(public_path($partner->image));
        }

        $partner->delete();

        return back()->with('success', 'Partner deleted successfully.');
    }
}
