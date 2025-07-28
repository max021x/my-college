<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;   
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $posts = Post::latest()->paginate(6) ; 
        return view('posts.index' , ['posts' => $posts]) ; 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => ['required', 'max:255'],
            'category' => ['required'],
            'description' => ['required'],
            'markdown' => ['required'],
        ]);

        Auth::user()->posts()->create($fields);

        return back()->with('success', 'Your post was Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {  
        return view('posts.show' , ['post' => $post]) ; 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
