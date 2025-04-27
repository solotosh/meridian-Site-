<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funfact;
class FunfactController extends Controller
{
    

    public function index() {
        $funfacts = Funfact::all();
        return view('backend.funfacts.index', compact('funfacts'));
    }

    public function create()
{
    return view('backend.funfacts.create'); // matches the path we created
}

    

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'count' => 'required|integer',
        ]);
    
        Funfact::create($request->all());
        return redirect()->route('funfacts.index')->with('success', 'Funfact added!');
    }
    
    public function edit(Funfact $funfact) {
        return view('backend.funfacts.edit', compact('funfact'));
    }
    
    public function update(Request $request, Funfact $funfact) {
        $request->validate([
            'title' => 'required|string',
            'count' => 'required|integer',
        ]);
    
        $funfact->update($request->all());
        return redirect()->route('funfacts.index')->with('success', 'Funfact updated!');
    }
    
    public function destroy(Funfact $funfact) {
        $funfact->delete();
        return back()->with('success', 'Deleted!');
    }
    
}
