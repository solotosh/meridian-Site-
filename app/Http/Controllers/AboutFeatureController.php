<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutFeature;

class AboutFeatureController extends Controller
{
    
public function index()
{
   // dd('about featers');
    $features = AboutFeature::latest()->paginate(10);
    return view('backend.features.index', compact('features'));
}

public function create()
{
    return view('backend.features.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'icon' => 'nullable|string|max:255',
    ]);

    AboutFeature::create($request->all());

    return redirect()->route('about-features.index')->with('success', 'Feature created successfully.');
}

public function edit($id)
{
    $aboutFeature = AboutFeature::findOrFail($id);
    return view('backend.features.edit', compact('aboutFeature'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'icon' => 'nullable|string|max:255',
    ]);

    $aboutFeature = AboutFeature::findOrFail($id);
    $aboutFeature->update($request->all());

    return redirect()->route('about-features.index')->with('success', 'Feature updated successfully.');
}


public function destroy($id)
{
    $feature = AboutFeature::findOrFail($id);
    $feature->delete();

    return redirect()->route('about-features.index')->with('success', 'Feature deleted successfully.');
}


}
