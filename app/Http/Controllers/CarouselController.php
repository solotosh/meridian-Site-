<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Illuminate\Support\Str;
use App\Models\Carousel;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Drivers\Gd\Driver;
class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('allslider');
        $sliders = Carousel::latest()->get();
        return view ('backend.slider.all',compact('sliders'));
    }


    public function create()
    {
        // You can pass additional data to the view if needed
        return view('backend.slider.add'); // Replace with your actual view name
    }
    // Make sure to import Intervention Image

    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'button1_text' => 'nullable|string|max:255',
            'button1_link' => 'nullable|max:255',
            'button2_text' => 'nullable|string|max:255',
            'button2_link' => 'nullable|max:255',
            'alignment' => 'nullable|string|in:left,center,right',
        ]);
    
        try {
            DB::beginTransaction();
    
            // Create the directory if it doesn't exist
            $path = public_path('uploads/carousel/');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }
    
            // Handle and resize the main image
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $imageFile = $request->file('image');
                
                // Generate timestamp filename with extension
                $imageName = time() . '.' . $imageFile->extension();
                
                // Process and save the image
                $image = $manager->read($imageFile->getPathname());
                $image->resize(1920, 760, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path . $imageName);
    
                // Save only the filename in database
                $validatedData['image'] = $imageName;
            }
    
            // Create a new carousel entry in the database
            Carousel::create($validatedData);
    
            DB::commit();
    
            return redirect()
                ->route('allslider')
                ->with('success', 'Carousel slide added successfully!');
    
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Carousel creation error: ' . $e->getMessage());
    
            return back()
                ->withInput()
                ->with('error', 'Error creating carousel slide. Please try again.');
        }
    }


    public function edit($id)
    {
        //dd($id);
        // Find the carousel entry by its ID
        $slider = Carousel::findOrFail($id);  // Using findOrFail to handle cases where the entry is not found
    
        // Return the edit view with the carousel data
        return view('backend.slider.edit', compact('slider'));  // Make sure to create the edit.blade.php view
    }
    public function update(Request $request, $id)
    {
        //dd($request->all());
        // Validate the incoming data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'button1_text' => 'nullable|string|max:255',
            'button1_link' => 'nullable|max:255',
            'button2_text' => 'nullable|string|max:255',
            'button2_link' => 'nullable|max:255',
            'alignment' => 'nullable|string|in:left,center,right',
        ]);
    
        try {
            DB::beginTransaction();
    
            // Find the carousel entry by ID
            $carousel = Carousel::findOrFail($id);
    
            // Create the directory if it doesn't exist
            $path = public_path('uploads/carousel/');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }
    
            // Handle and resize the main image if a new image is uploaded
            if ($request->hasFile('image')) {
                // If a new image is uploaded, delete the old one
                if (File::exists(public_path('uploads/carousel/' . $carousel->image))) {
                    File::delete(public_path('uploads/carousel/' . $carousel->image));
                }
    
                $manager = new ImageManager(new Driver());
                $imageFile = $request->file('image');
                
                // Generate timestamp filename with extension
                $imageName = time() . '.' . $imageFile->extension();
                
                // Process and save the image
                $image = $manager->read($imageFile->getPathname());
                $image->resize(1920, 760, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path . $imageName);
    
                // Save the new image filename to the validated data
                $validatedData['image'] = $imageName;
            } else {
                // If no new image is uploaded, keep the existing one
                $validatedData['image'] = $carousel->image;
            }
    
            // Update the carousel entry in the database
            $carousel->update($validatedData);
    
            DB::commit();
    
            return redirect()
                ->route('allslider')
                ->with('success', 'Carousel slide updated successfully!');
    
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Carousel update error: ' . $e->getMessage());
    
            return back()
                ->withInput()
                ->with('error', 'Error updating carousel slide. Please try again.');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function destroy($id)
    {
        try {
            // Find the carousel entry by its ID
            $carousel = Carousel::findOrFail($id);
    
            // Delete the associated image if it exists
            $imagePath = public_path('uploads/carousel/' . $carousel->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
    
            // Delete the carousel entry from the database
            $carousel->delete();
    
            return redirect()->route('allslider')->with('success', 'Carousel slide deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('allslider')->with('error', 'Error deleting carousel slide. Please try again.');
        }
    }
    
}
