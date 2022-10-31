<?php

namespace App\Http\Controllers;

use App\Jobs\PruneOldPostsJob;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

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
        return view('posts.create', [
            'allUsers' => $allUsers

        ])->with('success', 'Post created successfully!');
    }

    public function store(Request $request)
    {

        $allUsers = User::all();

        $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $data = request()->all();

        $request->image->move(public_path('images'), $imageName);

        // dd( ['title' , request()->title,
        // 'body' , $data['body'],
        // 'user_id' , $data['post_creator'],
        // 'published_at' , $data['published_at'],
        // 'file_path' ,  '/'.public_path('images').'/'. $imageName]);

        Post::create([
            'title' => request()->title,
            'body' => $data['body'],
            'user_id' => $data['post_creator'],
            'published_at' => $data['published_at'],
            'file_path' =>  '/images/'. $imageName


        ]);



        // Public Folder

        // $path = Storage::putFile('images', $request->file($imageName));
        // return back()->with('success', 'Image uploaded Successfully!')
        // ->with('image', $imageName);

        return to_route('posts.index')->with('success', 'Post created successfully!');;
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

        return view('posts.edit', compact('post', 'allUsers'));
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
        $post->user_id = $request->post_creator;
        $post->published_at = $request->published_at;

        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post, Request $request)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    // Store Image
    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time() . '.' . $request->image->extension();

        // Public Folder
        $request->image->move(public_path('images'), $imageName);

        return back()->with('success', 'Image uploaded Successfully!')
            ->with('image', $imageName);
    }

    // public function PruneOldPosts(Post $post, Request $request, $posts)
    // {
    //       dd(('DATE_SUB(),INTERVAL 5 DAY'));

    //      if ($post = Post::where('published_at', '<', ('DATE_SUB(),INTERVAL 5 DAY'))) {

    //         foreach ($posts as $post) {
    //             $post->delete();
    //         }

    //         $job = (new PruneOldPostsJob($post->pruneposts))->onQueue('processing');

    //         dispatch($job);
    //     }
    //     return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    // }
}
