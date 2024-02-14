<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user_id)
    {
        $paginateblog = User::find($user_id)->blog()->paginate(5);
        $category = Category::all();
        $user = auth()->user();
        $user_id = $user->id;
        return view('blog.index', compact('paginateblog', 'user_id', 'category'));
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
        $user_id = auth()->user()->id;
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $post = new Blog;
        $post->title = $request->title;
        $post->user_id = $user_id;
        $post->category_id = $request->category_id;
        $post->image = $image_name;
        $post->date = $request->date;
        $post->desk = $request->desk;

        $image->move(public_path() . '/vendor/img/', $image_name);
        $post->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}