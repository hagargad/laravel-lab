<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return PostResource::collection($posts);
    }

    public function show($postId)
    {
        $post = Post::find($postId);

        return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->all();
        $post = Post::create([
            'title' => request()->title,
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);

        return new PostResource($post);
    }
}
