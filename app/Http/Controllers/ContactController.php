<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
class ContactController extends Controller
{
    

    public function index() {
        $contact = Contact::first();
        return view('backend.contacts.index', compact('contact'));
    }

    public function update(Request $request) {
        $contact = Contact::firstOrNew([]);
        $contact->fill($request->only([
            'email', 'email2', 'phone', 'phone2', 'address',
            'map_lat', 'map_lng', 'map_title'
        ]))->save();
        
        return redirect()->back()->with('success', 'Contact details updated!');
    }
}