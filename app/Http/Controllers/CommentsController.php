<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


class CommentsController extends Controller
{
    public function index(){
        $allComments = Comment::all();
   return view('posts.show',['Comments'=>$allComments]);
    }

    public function store(Request $request){
        $data = request()->all();

        Comment::create([
            'title' => request()->title,
            'content' => $data['content'],
            'comment' => $data['comment'],
            'user_id' => $data['post_creator'],
            'published_at' => $data['published_at'],
        ]);
          $request->save();
        return to_route('comment.index')->with('success','Comment created successfully!');;
    }

}
