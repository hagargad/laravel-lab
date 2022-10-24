<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::paginate(8);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {

         $allUsers = User::all();
        return view('posts.create',[
            'allUsers' => $allUsers

        ])->with('success','Post created successfully!');
    }

    public function store(Request $request)
    {
        $allUsers = User::all();
        $request->validate([
            'title' => 'required|max(20)',
            'body' => 'required|max(255)',
            ]);
            $data = request()->all();

            Post::create([
                'title' => request()->title,
                'body' => $data['body'],
                'user_id' => $data['post_creator'],
                'published_at' => $data['published_at'],
            ]);
              $request->save();
            return to_route('posts.index')->with('success','Post created successfully!');;
        // $post = new Post();
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->user_id=$request->post_creator;
        // $post->published_at = $request->published_at;

        // $post->save();
        // return redirect('posts.index')->with('success','Post created successfully!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)

    {
        $allUsers = User::all();

        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    {
        $allUsers = User::all();

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id=$request->post_creator;
        $post->published_at = $request->published_at;

        $post->save();
        return redirect('posts.index')->with('success','Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post deleted successfully!');

    }
}
