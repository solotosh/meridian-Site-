<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutCounter;
class AboutCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $counters = AboutCounter::all();
    return view('backend.counters.index', compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // dd('create');

       return view('backend.counters.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());

        $request->validate([
            'label' => 'required|string',
            'value' => 'required|integer',
            'suffix' => 'nullable|string|max:5',
            'background_color' => 'required|string',
        ]);
    
        AboutCounter::create($request->all());
        $notification = [
            'message' => 'Counter added!',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('allcounts')->with($notification);


        
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
        $counter = AboutCounter::findOrFail($id);
       // dd($counter);
    return view('backend.counters.edit', compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     */

    
    public function update(Request $request, $id)
    {
       // dd($request->all());
        $request->validate([
            'label' => 'required|string',
            'value' => 'required|integer',
            'suffix' => 'nullable|string|max:5',
            'background_color' => 'required|string',
        ]);
    
        $counter = AboutCounter::findOrFail($id);
        $counter->update($request->all());
    
        return redirect()->route('allcounts')->with([
            'message' => 'Counter updated successfully!',
            'alert-type' => 'success'
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
