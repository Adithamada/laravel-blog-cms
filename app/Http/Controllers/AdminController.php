<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user_id)
    {
        $user=auth()->user();
        $user_id=$user->id;
        return view('dashboard.admin',compact('user_id'));
    }
    public function blog($user_id)
    {
        $user=auth()->user();
        $user_id=$user->id;
        $blog = Blog::latest('created_at')->paginate(5);
        $category = Category::all();
        return view('blog.admin',[
            'blog'=>$blog,
            'category'=>$category,
            'user_id'=>$user_id
        ]);
    }
    public function category($user_id)
    {
        $user=auth()->user();
        $user_id=$user->id;
        return view('user.admin',compact('user_id'));
    }
    public function user($user_id)
    {
        $user=auth()->user();
        $user_id=$user->id;
        return view('user.admin',compact('user_id'));
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
    public function show(string $id)
    {
        //
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
