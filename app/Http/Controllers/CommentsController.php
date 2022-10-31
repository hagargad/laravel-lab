<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Nette\Utils\Random;

class CommentsController extends Controller
{
    public function index()
    {
        // $allComments = Comment::all();
        //    return view('posts.show',['Comments'=>$allComments]);
    }

    public function storeComment(Post $post, Request $request)
    {

        request()->validate([
            'content' => 'required'
        ]);
        $data = request()->all();

        // $post->comments()->create([]);
        Comment::create([
            'content' => $data['content'],

        ]);

        return back()->with('success', 'Comment created successfully!');;
    }
}
