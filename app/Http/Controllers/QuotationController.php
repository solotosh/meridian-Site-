<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Exports\QuotationExport;
use Illuminate\Support\Str;
use App\Models\Quote;

class QuotationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'location' => 'required|string|max:255',
            'details' => 'required|string',
            'title_deed' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('title_deed')) {
            $file = $request->file('title_deed');
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/title_deed');

            // Create folder if not exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $file->move($destinationPath, $filename);
            $validated['title_deed'] = 'uploads/title_deed/' . $filename;
        }

        Quote::create($validated);

        return redirect()->back()->with('success', 'Quote request sent successfully!');
    }
    public function index()
    {
        $quotes = Quote::latest()->get();
        return view('backend.quotes.index', compact('quotes'));
    }

    public function show($id)
    {
        $quote = Quote::findOrFail($id);
        return view('backend.quotes.show', compact('quote'));
    }

    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);

        // Delete title deed file if exists
        if ($quote->title_deed && file_exists(public_path($quote->title_deed))) {
            unlink(public_path($quote->title_deed));
        }

        $quote->delete();

        return redirect()->back()->with('success', 'Quote deleted successfully.');
    }
}
