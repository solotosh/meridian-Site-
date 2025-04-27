<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChooseUsReason;
use Illuminate\Support\Str;
class ChooseUsReasonController extends Controller
{
    public function index()
    {
        $reasons = ChooseUsReason::all();
        return view('backend.chooseus.index', compact('reasons'));
    }

    public function create()
    {
        return view('backend.chooseus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon_class' => 'nullable|string|max:100',
            'description' => 'nullable|string'
        ]);

        ChooseUsReason::create($request->all());
        return redirect()->route('admin.chooseus.index')->with('success', 'Reason added!');
    }

    public function edit($id)
    {
        $reason = ChooseUsReason::findOrFail($id);
        return view('backend.chooseus.edit', compact('reason'));
    }

    public function update(Request $request, $id)
    {
        $reason = ChooseUsReason::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'icon_class' => 'nullable|string|max:100',
            'description' => 'nullable|string'
        ]);

        $reason->update($request->all());
        return redirect()->route('admin.chooseus.index')->with('success', 'Reason updated!');
    }

    public function destroy($id)
    {
        $reason = ChooseUsReason::findOrFail($id);
        $reason->delete();
        return redirect()->route('admin.chooseus.index')->with('success', 'Reason deleted!');
    }
}

