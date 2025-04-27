<?php


// app/Http/Controllers/SeoController.php

namespace App\Http\Controllers;

use App\Models\SeoData;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index()
    {
        $seoData = SeoData::all();
        return view('backend.seo.index', compact('seoData'));
    }

    public function create()
    {
        return view('backend.seo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page' => 'required|string|max:255|unique:seo_data',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_author' => 'required|string|max:255',
        ]);

        SeoData::create($request->all());

        return redirect()->route('seo.index')->with('success', 'SEO data added successfully.');
    }

    public function edit($id)
    {
        $seo = SeoData::findOrFail($id);
        return view('backend.seo.edit', compact('seo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_author' => 'required|string|max:255',
        ]);

        $seo = SeoData::findOrFail($id);
        $seo->update($request->all());

        return redirect()->route('seo.index')->with('success', 'SEO data updated successfully.');
    }

    public function destroy($id)
    {
        $seo = SeoData::findOrFail($id);
        $seo->delete();

        return redirect()->route('seo.index')->with('success', 'SEO data deleted successfully.');
    }
}

