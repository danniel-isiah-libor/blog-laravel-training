<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
}
