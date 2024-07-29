<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(2);

        return view('dashboard', ['posts' => $posts]);
    }

    /**
     * Display post create page
     *
     * @return view
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Save new post.
     *
     */
    public function store(StoreRequest $request)
    {
        $formData = $request->validated();

        Post::create($formData);

        return redirect()->route('dashboard');
    }

    /**
     * Display selected post.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Display edit page.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update specified post.
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $formData = $request->validated();

        $post->update($formData);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }
}
