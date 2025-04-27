<?php

namespace App\Http\Controllers;

use App\Models\HeaderSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class HeaderSettingController extends Controller
{
    protected $imageManager;

    public function __construct()
    {
        $this->imageManager = new ImageManager(new GdDriver());
    }

    public function index()
    {
        $header = HeaderSetting::first();
    
        if (!$header) {
            $header = HeaderSetting::create([
                'address' => '',
                'hours' => '',
                'phone' => '',
                'email' => '',
                'logo' => null,
                'mobile_logo' => null,
                'social_links' => json_encode([])
            ]);
        }
    
        return view('backend.header.index', compact('header'));
    }
    
    public function edit(HeaderSetting $headerSetting)
    {
        return view('backend.header.edit', compact('headerSetting'));
    }

    public function update(Request $request, HeaderSetting $headerSetting)
    {
        $data = $request->validate([
            'address' => 'required',
            'hours' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image',
            'mobile_logo' => 'nullable|image',
            'social_links' => 'nullable|array',
        ]);
    
        // Create upload directory if not exists
        $destinationPath = public_path('uploads/logo');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
    
        // Process Logo
        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoName = 'logo_' . time() . '.jpg';
            $logoPath = $destinationPath . '/' . $logoName;
    
            $this->imageManager->read($logoFile)
                ->resize(250, 80)
                ->toJpeg(80)
                ->save($logoPath);
    
            $data['logo'] = 'uploads/logo/' . $logoName;
        }
    
        // Process Mobile Logo
        if ($request->hasFile('mobile_logo')) {
            $mobileFile = $request->file('mobile_logo');
            $mobileName = 'mobile_logo_' . time() . '.jpg';
            $mobilePath = $destinationPath . '/' . $mobileName;
    
            $this->imageManager->read($mobileFile)
                ->resize(180, 60)
                ->toJpeg(80)
                ->save($mobilePath);
    
            $data['mobile_logo'] = 'uploads/logo/' . $mobileName;
        }
    
        // Encode social links
        $data['social_links'] = json_encode($request->social_links);
    
        $headerSetting->update($data);
    
        return redirect()->route('admin.header.index')->with('success', 'Header updated successfully!');
    }
    
}
