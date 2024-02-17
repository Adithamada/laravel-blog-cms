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

        $category = Category::all();

        return view('home.index', compact('category', 'latestblog', 'blogs'));
    }

    public function blogs()
    {
        $latestblog = Blog::latest('created_at')->first();
        $blog = Blog::latest('created_at')->paginate(6);
        $category = Category::all();
        return view('home.blog-list', compact('category', 'latestblog', 'blog'));
    }



    public function author(string $name)
    {
        // Find the name by its name
        $name = User::where('name', $name)->firstOrFail();

        // Get all blogs that belong to the found name
        $blog = $name->blog()->latest('created_at')->paginate(6);

        return view('home.author', compact('name', 'blog'));
    }

    public function category(string $category)
    {
        // Find the category by its name
        $category = Category::where('category', $category)->firstOrFail();

        // Get all blogs that belong to the found category
        $blog = $category->blog()->latest('created_at')->paginate(6);

        // Retrieve the latest blog overall
        $latestblog = $category->blog()->latest('created_at')->first();

        return view('home.category-list', compact('category', 'latestblog', 'blog'));
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
        return view('home.single-blog', compact('blog'));
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
