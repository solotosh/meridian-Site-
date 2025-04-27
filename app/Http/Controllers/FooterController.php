<?php

namespace App\Http\Controllers;
use App\Models\Footer;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
class FooterController extends Controller
{
    public function edit()
    {
        $footer = Footer::first();
        return view('backend.footer.edit', compact('footer'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'about_text' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'logo' => 'nullable|image',
        ]);

        $footer = Footer::first() ?? new Footer();
        $data = $request->only(['about_text', 'address', 'phone', 'email', 'copyright']);

        if ($request->hasFile('logo')) {
            if ($footer->logo && File::exists(public_path($footer->logo))) {
                File::delete(public_path($footer->logo));
            }

            $manager = new ImageManager(new Driver);
            $logo = $request->file('logo');
            $name = time() . '_footer.' . $logo->getClientOriginalExtension();
            $path = public_path('uploads/footer/' . $name);

            File::ensureDirectoryExists(public_path('uploads/footer'));
            $manager = new ImageManager(new GdDriver());
            $image = $manager->read($logo->getPathname());
            $image->resize(118, 93)->save(public_path('uploads/footer/' . $name));
            

            $data['logo'] = 'uploads/footer/' . $name;
        }

        $footer->fill($data)->save();

        return back()->with('success', 'Footer updated successfully!');
    }
}