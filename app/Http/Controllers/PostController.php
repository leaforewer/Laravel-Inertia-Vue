<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Post/Index', [
            "posts" => Post::with('category')->orderBy('id', 'ASC')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return Inertia::render('Post/Create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::create(
            $request->validate([
                'title' => ['required', 'max:90'],
                // Str::slug('slug') => ['required'],
                'description' => ['required'],
                'category_id' => 'required|exists:App\Models\Category,id',
            ])
        );

        return Redirect::route('posts.index')->with('post_message', 'Your Post is Stored Successfully in the database');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return Inertia::render('Post/Edit', [
            'post' => [
                'id' => $post->id,
                'title' => $post->title,
                'category_id' => $post->category_id,
                'description' => $post->description
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => ['required', 'max:90'],
            // Str::slug('slug') => ['required'],
            'description' => ['required'],
            'category_id' => 'required|exists:App\Models\Category,id',
        ]);

        $post->update($data);

        return Redirect::route('posts.index')->with('post_message', 'Post Edit Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return Redirect::route('posts.index')->with('post_message', 'Post Delete Successfull');
    }
}
