<?php


namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('backend.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('backend.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publish_date' => 'required|date',
            'image' => 'nullable|image',
            'author_image' => 'nullable|image',
        ]);
    
        $data = $request->only(['title', 'category', 'author', 'publish_date', 'excerpt', 'content']);
        $manager = new ImageManager(new GdDriver);
    
        foreach (['image', 'author_image'] as $imgField) {
            if ($request->hasFile($imgField)) {
                $file = $request->file($imgField);
                $name = time() . '_' . $imgField . '.' . $file->getClientOriginalExtension();
                $path = public_path('uploads/blogs/' . $name);
                File::ensureDirectoryExists(public_path('uploads/blogs'));
                $manager->read($file)->resize(370, 250)->save($path);
                $data[$imgField] = 'uploads/blogs/' . $name;
            }
        }
    
        $data['slug'] = Str::slug($request->title);
        Blog::create($data);
    
        return redirect()->route('admin.blogs.index')->with('success', 'Blog added successfully.');
    }
    

    public function edit(Blog $blog)
    {
        return view('backend.blogs.edit', compact('blog'));
    }

    
public function update(Request $request, Blog $blog)
{
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'publish_date' => 'required|date',
        'image' => 'nullable|image',
        'author_image' => 'nullable|image',
    ]);

    $data = $request->only(['title', 'category', 'author', 'publish_date', 'excerpt', 'content']);
    $manager = new ImageManager(new GdDriver);

    foreach (['image', 'author_image'] as $imgField) {
        if ($request->hasFile($imgField)) {
            if (File::exists(public_path($blog->$imgField))) {
                File::delete(public_path($blog->$imgField));
            }

            $file = $request->file($imgField);
            $name = time() . '_' . $imgField . '.' . $file->getClientOriginalExtension();
            $path = public_path('uploads/blogs/' . $name);
            File::ensureDirectoryExists(public_path('uploads/blogs'));
            $manager->read($file)->resize(370, 250)->save($path);
            $data[$imgField] = 'uploads/blogs/' . $name;
        }
    }

    $data['slug'] = Str::slug($request->title);
    $blog->update($data);

    return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
}

    public function destroy(Blog $blog)
    {
        foreach (['image', 'author_image'] as $imgField) {
            if (File::exists(public_path($blog->$imgField))) {
                File::delete(public_path($blog->$imgField));
            }
        }

        $blog->delete();
        return back()->with('success', 'Blog deleted.');
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recentPosts = Blog::latest()->take(5)->get();
        $categories = Blog::distinct()->pluck('category');


        $comments = BlogComment::where('blog_id', $blog->id)
            ->where('status', 'approved')
            ->latest()
            ->get();


    
        return view('frontend.blog_detail', compact('blog', 'recentPosts', 'categories', 'comments'));
    }
    


}
