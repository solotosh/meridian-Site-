<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogComment;
class BlogCommentController extends Controller
{
    public function index()
    {
        $comments = BlogComment::latest()->get();
        return view('backend.comments.index', compact('comments'));
    }

    public function approve($id)
    {
        $comment = BlogComment::findOrFail($id);
        $comment->status = 'approved';
        $comment->save();

        return redirect()->back()->with('success', 'Comment approved.');
    }

    public function destroy($id)
    {
        BlogComment::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Comment deleted.');
    }
}
