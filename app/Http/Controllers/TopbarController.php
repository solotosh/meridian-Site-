<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topbar;
class TopbarController extends Controller
{
    
    public function index()
    {
       // dd('topbar.index');
        $topbar = Topbar::first();
        return view('backend.topbar.index', compact('topbar'));
    }

    public function create()
    {
        //dd('topbar.index');
        return view('backend.topbar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'socials' => 'nullable|array',
        ]);

        Topbar::create([
            'location' => $request->location,
            'phone' => $request->phone,
            'email' => $request->email,
            'socials' => $request->socials,
        ]);

        return redirect()->route('topbar.index')->with('message', 'Topbar info saved!');
    }

    public function edit($id)
    {
        $topbar = Topbar::findOrFail($id);
        return view('backend.topbar.edit', compact('topbar'));
    }

    public function update(Request $request, $id)
    {
        $topbar = Topbar::findOrFail($id);

        $request->validate([
            'location' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'socials' => 'nullable|array',
        ]);

        $topbar->update([
            'location' => $request->location,
            'phone' => $request->phone,
            'email' => $request->email,
            'socials' => $request->socials,
        ]);

        return redirect()->route('topbar.index')->with('message', 'Topbar info updated!');
    }








}
