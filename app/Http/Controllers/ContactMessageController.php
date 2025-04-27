<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
class ContactMessageController extends Controller
{
    // Store message
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    // Admin view
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('backend.message.index', compact('messages'));
    }

    // Show individual message
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('backend.message.show', compact('message'));
    }

    // Delete
    public function destroy($id)
    {
        ContactMessage::destroy($id);
        return redirect()->back()->with('success', 'Message deleted successfully.');
    }

 // Make sure dompdf is installed

public function download($id)
{
    $message = ContactMessage::findOrFail($id);
    $pdf = Pdf::loadView('backend.message.pdf', compact('message'));

    return $pdf->download('Message_From_' . $message->username . '.pdf');
}



public function reply(Request $request, $id)
{
    $request->validate([
        'subject' => 'required|string|max:255',
        'reply_message' => 'required|string',
    ]);

    $message = ContactMessage::findOrFail($id);

    Mail::raw($request->reply_message, function ($mail) use ($message, $request) {
        $mail->to($message->email)
             ->subject($request->subject);
    });

    return redirect()->back()->with('success', 'Reply sent successfully to ' . $message->email);
}


}
