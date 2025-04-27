<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

       // dd('index');
        $services = Service::all();
        return view('backend.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());


        $request->validate([
            'title' => 'required|string',
            'icon' => 'nullable|string',
            'description' => 'nullable|string',
            'link' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        $data = $request->only(['title', 'icon', 'description', 'link']);
    
        if ($request->hasFile('image')) {
            $filename = Str::uuid() . '.' . $request->file('image')->getClientOriginalExtension();
            $manager = new ImageManager(new GdDriver());
            $manager->read($request->file('image')->getPathname())
                    ->resize(600, 400)
                    ->save(public_path('uploads/services/' . $filename));
            $data['image'] = 'uploads/services/' . $filename;
        }
    
        Service::create($data);

        $notification = [
            'message' => 'Service added successfully!',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('allservices')->with($notification);
    
        
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
    public function edit(string $id)
    {
        //dd($id);
        $service= Service::findOrFail($id);

       return view('backend.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, Service $service)
     {
       // dd($service);
         $request->validate([
             'title' => 'required|string',
             'icon' => 'nullable|string',
             'description' => 'nullable|string',
             'link' => 'nullable',
             'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
         ]);
     
         $data = $request->only(['title', 'icon', 'description', 'link']);
     
         if ($request->hasFile('image')) {
             if ($service->image && file_exists(public_path($service->image))) {
                 unlink(public_path($service->image));
             }
             $filename = Str::uuid() . '.' . $request->file('image')->getClientOriginalExtension();
             $manager = new ImageManager(new GdDriver());
             $manager->read($request->file('image')->getPathname())
                     ->resize(600, 400)
                     ->save(public_path('uploads/services/' . $filename));
             $data['image'] = 'uploads/services/' . $filename;
         }
     
         $service->update($data);


         $notification = [
            'message' => 'Service updated successfully!',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('allservices')->with($notification);

     
    
     }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {

        //dd($service);
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }
    
        $service->delete();
    
        return redirect()->back()->with([
            'message' => 'Service deleted successfully!',
            'alert-type' => 'success',
        ]);
    }
    
}
