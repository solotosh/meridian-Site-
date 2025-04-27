<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\AboutCounter;
use App\Models\AboutFeature;
use App\Models\Service;
use App\Models\Technology;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\SurveyService;
use App\Models\AboutLandSurvey;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\Partner;
use Illuminate\Support\Str;
use App\Models\Contact;
use App\Models\BlogComment;
use App\Models\SeoData;
use App\Models\Project;
class HomeController extends Controller
{
    public function index(){
       
        $featuredProperties = About::where('subheading', 'Featured')->latest()->take(6)->get();
        return view('frontend.index', compact('featuredProperties'));
    }

    public function aboutPage()
    {
        $about = About::first(); // Or use `latest()->first()` if there are multiple
        //dd($about->image_top) ;
        return view('frontend.about', compact('about'));
    }

   
public function blog()
{
    $blogs = Blog::latest()->take(6)->get(); // Limit to 6 recent posts
    return view('frontend.blog', compact('blogs'));
}


public function service()
{
  
    $services = SurveyService::all();
    $testimonials = Testimonial::all();
    $teamMembers = TeamMember::all();
    $partners = Partner::all();

    return view('frontend.service', compact('services', 'testimonials', 'teamMembers', 'partners'));
}
public function show($id)
{
    $service = SurveyService::findOrFail($id);
    return view('frontend.service_detail', compact('service'));
    
}
public function bshow($slug)
{
    // Fetch the blog based on slug or id
    $blog = Blog::where('slug', $slug)
        ->orWhere('id', $slug)
        ->firstOrFail();

    // Fetch recent posts for the footer or sidebar
    $recentPosts = Blog::latest()->take(3)->get(); // Get the latest 3 posts

    // Fetch categories and comments for the current blog
    $categories = Blog::select('category')->distinct()->pluck('category');
    $comments = $blog->comments()->where('status', 'approved')->latest()->get();

    // Fetch SEO data for the page (you can adjust this as needed)
    $seo = SeoData::where('page', 'blog')->first();
    $pageTitle = $blog->title;

    // Pass the blog, recent posts, categories, comments, seo data, and page title to the view
    return view('frontend.blog_detail', compact('blog', 'recentPosts', 'categories', 'comments', 'seo', 'pageTitle'));
}

public function storeComment(Request $request)
{
    $request->validate([
        'blog_id' => 'required|exists:blogs,id',
        'name' => 'required|string|max:255',
        'message' => 'required|string'
    ]);

    Comment::create($request->all());

    return back()->with('success', 'Comment posted successfully!');
}







public function postComment(Request $request, $slug)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable',
        'subject' => 'nullable',
        'message' => 'required'
    ]);

    $blog = Blog::where('slug', $slug)->firstOrFail();

    BlogComment::create([
        'blog_id' => $blog->id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'message' => $request->message,
        'status' => 'pending'
    ]);

    return redirect()->back()->with('success', 'Your comment has been submitted! and is  going to show soon');
}


public function categoryFilter($category)
{
    // Get IDs of all blogs in this category
    $blogIds = Blog::where('category', $category)->pluck('id');

    // Pick one random blog ID as featured
    $featuredId = $blogIds->random();

    // Get the featured blog
    $featured = Blog::findOrFail($featuredId);

    // Paginate remaining blogs, excluding the featured one
    $blogs = Blog::where('category', $category)
                 ->where('id', '!=', $featuredId)
                 ->latest()
                 ->paginate(6);

    // Sidebar data
    $recentPosts = Blog::latest()->take(3)->get();
    $categories = Blog::select('category')->distinct()->pluck('category');
    $formattedCategory = Str::headline(str_replace('-', ' ', $category));

    return view('frontend.blog_category', compact(
        'blogs', 'featured', 'recentPosts', 'categories', 'category', 'formattedCategory'
    ));
}

public function contact()
{
    $contact = Contact::latest()->first();
    return view('frontend.contact', compact('contact'));
}

public function faqPage()
{
    $faqs = \App\Models\Faq::latest()->get();
    return view('frontend.faq', compact('faqs'));
}




public function technology()
{
    $technologies = Technology::latest()->paginate(6); // or use get() if no pagination
    return view('frontend.technology', compact('technologies'));
}


public function showTechnology($id)
{
    $tech = \App\Models\Technology::findOrFail($id);
    return view('frontend.technology_details', compact('tech'));
}


public function project()
{ $projects = Project::all();

    $similar = Project::where('tagline', 'like', '%Survey%')  // For example, look for projects with "Survey" in their tagline
    ->get();
    
    return view('frontend.project',compact('projects','similar'));
}

public function projectDetail($id)
{
    $project = \App\Models\Project::findOrFail($id); // Get the project by ID
    $relatedProjects = \App\Models\Project::where('id', '!=', $id)->inRandomOrder()->take(3)->get(); // Get related projects

return view('frontend.project_detail', compact('project', 'relatedProjects'));
}

public function home()
{
    $projects = AboutLandSurvey::latest()->take(5)->get();
    return view('frontend.home', compact('projects'));
}


}
