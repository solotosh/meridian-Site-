<?php


namespace App\Http\Controllers;

use App\Models\FaqMessage;
use Illuminate\Http\Request;

class FaqMessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        FaqMessage::create($validated);

        return redirect()->back()->with('success', 'Thank you! Your question has been submitted.');
    }


    public function index()
    {
        $messages = FaqMessage::latest()->get();
        return view('backend.faq-messages.index', compact('messages'));
    }

    // app/Http/Controllers/Admin/FaqMessageController.php

public function show($id)
{
    $message = FaqMessage::findOrFail($id);
    return view('backend.faq-messages.show', compact('message'));
}

public function destroy($id)
{
    FaqMessage::destroy($id);
    return redirect()->route('admin.faq.messages')->with('success', 'Message deleted successfully.');
}

}
