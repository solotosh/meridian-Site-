<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Callback;
class CallbackRequestController extends Controller
{
    



    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Create a new Callback entry in the database
        Callback::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
        ]);

        // Return a successful response with a success message
        return response()->json(['success' => true, 'message' => 'Callback request saved successfully.']);
    }


public function index()
{
    $requests = Callback::latest()->paginate(13);
    return view('backend.callbacks.index', compact('requests'));
}



}
