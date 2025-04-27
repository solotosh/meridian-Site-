<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Faq;
class FaqController extends Controller
{

   
    
        public function index()
        {
           // dd('faqs.index');
            $faqs = Faq::latest()->get();
            return view('backend.faqs.index', compact('faqs'));
        }
    
        public function create()
        {
           // dd('faq');
            return view('backend.faqs.create');
        }
    
        public function store(Request $request)
        {
            $data = $request->validate([
                'question' => 'required|string|max:255',
                'heading' => 'nullable|string|max:255',
                'answer' => 'required|string',
            ]);
    
            Faq::create($data);
            return redirect()->route('admin.faqs.index')->with('message', 'FAQ added successfully.');
        }
    
        public function edit($id)
        {
            $faq = Faq::findOrFail($id);
            return view('backend.faqs.edit', compact('faq'));
        }
    
        public function update(Request $request, $id)
        {
           // dd($request->all());
            $faq = Faq::findOrFail($id);
    
            $data = $request->validate([
                'question' => 'required|string|max:255',
                'heading' => 'nullable|string|max:255',
                'answer' => 'required|string',
            ]);
    
            $faq->update($data);
            return redirect()->route('admin.faqs.index')->with('message', 'FAQ updated successfully.');
        }
    
        public function destroy($id)
        {
            Faq::findOrFail($id)->delete();
            return back()->with('message', 'FAQ deleted successfully.');
        }
    }
    
