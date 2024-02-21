<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the latest blog post
        $latestblog = Blog::latest('created_at')->first();

        // Check if the latest blog post is hidden
        if ($latestblog->status === 'Hide') {
            // Get the next latest blog post that is not hidden
            $latestblog = Blog::where('status', '!=', 'Hide')->latest('created_at')->first();
        }

        // Fetch other blog posts for pagination
        $blogs = Blog::where('status', '!=', 'Hide')->latest('created_at')->paginate(6);

        $categoryfooter = Category::all();

        return view('home.index', compact('categoryfooter', 'latestblog', 'blogs'));
    }

    public function blogs()
    {
        $latestblog = Blog::latest('created_at')->first();
        $blog = Blog::latest('created_at')->paginate(6);
        $categoryfooter = Category::all();
        return view('home.blog-list', compact('categoryfooter', 'latestblog', 'blog'));
    }



    public function author(string $name)
    {
        // Find the name by its name
        $name = User::where('name', $name)->firstOrFail();

        // Get all blogs that belong to the found name
        $blog = $name->blog()->latest('created_at')->paginate(6);
        $categoryfooter = Category::all();

        return view('home.author', compact('name', 'blog', 'categoryfooter'));
    }

    public function category(string $category)
    {
        // Find the category by its name
        $category = Category::where('category', $category)->firstOrFail();

        // Get all blogs that belong to the found category
        $blog = $category->blog()->latest('created_at')->paginate(6);

        // Retrieve the latest blog overall
        $latestblog = $category->blog()->latest('created_at')->first();
        $categoryfooter = Category::all();

        return view('home.category-list', compact('category', 'latestblog', 'blog', 'categoryfooter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $title)
    {
        $blog = Blog::where('title', $title)->first();

        // Check if the blog post exists
        if (!$blog) {
            abort(404); // Or handle the case where the blog post is not found
        }

        $key = 'blog_' . $blog->id;

        // Check if the session has a key for this specific blog post
        if (!session()->has($key)) {
            // Increment the post_view only if the session key is not found
            $blog->increment('post_view');

            // Store the session key for this specific blog post
            session()->put($key, true);
        }

        $categoryfooter = Category::all();
        return view('home.single-blog', compact('blog', 'categoryfooter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
