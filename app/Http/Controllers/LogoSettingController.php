<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\LogoSetting;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

use Intervention\Image\ImageManager;

use Intervention\Image\Drivers\Gd\Driver as GdDriver;
class LogoSettingController extends Controller
{
    public function index(){
        $logo= LogoSetting::first();
       
        return view('backend.logo.show', compact('logo'));

    }

public function create(){
    //dd('create');

    return view('backend.logo.add');
}


public function store(Request $request)
{
    $request->validate([
        'logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $logoSetting = LogoSetting::firstOrNew([]);

    if ($request->hasFile('logo')) {
        $imageFile = $request->file('logo');
        $imageName = time() . '.' . $imageFile->getClientOriginalExtension();

        // ✅ Use ImageManager with GdDriver
        $manager = new ImageManager(new GdDriver());
        $image = $manager->read($imageFile->getPathname());
        $image->resize(300, 100);
        $image->save(public_path('uploads/logo/' . $imageName));

        $logoSetting->logo = $imageName;
    }

    $logoSetting->save();

    $notification = [
        'message' => 'Logo uploaded successfully!',
        'alert-type' => 'success'
    ];

    return redirect()->route('logocreate')->with($notification);
}


}
