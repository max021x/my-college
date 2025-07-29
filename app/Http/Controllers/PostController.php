<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Mailer\Transport\Dsn;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.viewPosts', ['posts' => $posts]);
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

        $request->validate([
            'title' => ['required', 'max:255'],
            'category' => ['required'],
            'description' => ['required'],
            'markdown' => ['required'],
            'cover' => ['nullable' , 'file' , 'mimes:png,jpg,webp' , 'max:1024']
        ]);

        // return the path 
        
        $path = null ; 
        if($request->hasFile('cover')){
            $path = Storage::disk('public' , $request->cover)->put('blog-images' , $request->cover) ; 
        }
        Auth::user()->posts()->create(
            [
                'title' => $request->title ,
                'category' => $request->category ,
                'description' => $request->description ,
                'markdown' => $request->markdown , 
                'cover' => $path
            ]
        );

        return back()->with('success', 'Your post was Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {   
        $post->markdown = Str::markdown($post->markdown);
        return view('posts.show', ['post' => $post]);
    }

    public function category (string $category) {
        $posts = Post::where('category' , $category)->latest()->paginate(6);
        return view('posts.viewPosts', ['posts' => $posts]);    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {   
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $fields = $request->validate([
            'title' => ['required', 'max:255'],
            'category' => ['required'],
            'description' => ['required'],
            'markdown' => ['required'],
        ]);

        $post->update($fields);

        return back()->with('updated', 'Your post was Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('delete', ' Your post was deleted !');
    }
}
