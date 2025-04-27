<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutCustomer;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Illuminate\Support\Str;
class AboutCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $customers = AboutCustomer::orderBy('position')->get();
        return view('backend.about_customers.index', compact('customers'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd('create');
        return view('backend.about_customers.add');
    }

    /**
     * Store a newly created resource in storage.
     */
  
    
    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'alt' => 'nullable|string|max:255',
            'position' => 'nullable|integer',
            'label_top' => 'nullable|string|max:255',
            'label_bottom' => 'nullable|string|max:255',
        ]);
    
        $manager = new ImageManager(new GdDriver());
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $folder = public_path('uploads/customers');
    
                // Ensure folder exists
                if (!file_exists($folder)) {
                    mkdir($folder, 0775, true);
                }
    
                $filepath = $folder . '/' . $filename;
    
                // Resize and save
                $manager->read($file->getPathname())
                        ->resize(100, 100)
                        ->save($filepath);
    
                // Save only the filename in DB
                AboutCustomer::create([
                    'image' => $filename,
                    'alt' => $request->input('alt'),
                    'position' => $request->input('position', 45 * $index),
                    'label_top' => $index === 0 ? $request->input('label_top') : null,
                    'label_bottom' => $index === 0 ? $request->input('label_bottom') : null,
                ]);
            }
        }
    
        return redirect()->route('aboutclients')->with([
            'message' => 'Customer images uploaded successfully!',
            'alert-type' => 'success',
        ]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //dd('edit');
        $customer = AboutCustomer::findOrFail($id);
        return view('backend.about_customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
  
    
    public function update(Request $request, $id)
    {
//dd($request->all());

        $customer = AboutCustomer::findOrFail($id);
    
        $data = $request->validate([
            'alt' => 'nullable|string|max:255',
            'position' => 'nullable|integer',
            'label_top' => 'nullable|string|max:255',
            'label_bottom' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            // delete old image
            $oldPath = public_path('uploads/customers/' . $customer->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
    
            $manager = new ImageManager(new GdDriver());
            $filename = Str::uuid() . '.' . $request->file('image')->getClientOriginalExtension();
            $manager->read($request->file('image')->getPathname())
                    ->resize(100, 100)
                    ->save(public_path('uploads/customers/' . $filename));
    
            $data['image'] = $filename;
        }
    
        $customer->update($data);
    
        return redirect()->route('aboutclients')->with([
            'message' => 'Customer updated successfully!',
            'alert-type' => 'success',
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       // dd($id);
        $customer = AboutCustomer::findOrFail($id);
    
        // Delete the image from public/uploads/customers/
        $imagePath = public_path('uploads/customers/' . $customer->image);
        if ($customer->image && file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        // Delete the database record
        $customer->delete();
    
        return redirect()->route('aboutclients')->with([
            'message' => 'Customer deleted successfully!',
            'alert-type' => 'success',
        ]);
    }
    
}
