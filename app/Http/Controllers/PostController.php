<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPosts = [
            ['id' => 1, 'title' => 'about marketing', 'posted_by' => 'Hagar hosny', 'creation_date' => '2022-10-18'],
            ['id' => 2, 'title' => 'business vs tech', 'posted_by' => 'Hania Hany', 'creation_date' => '2022-10-9'],
            ['id' => 3, 'title' => 'branding & strategy', 'posted_by' => 'Radwa Gad', 'creation_date' => '2022-10-18'],
            ['id' => 4, 'title' => 'business administration', 'posted_by' => 'Gamila Mamdouh', 'creation_date' => '2022-10-9'],
        ];

        return view('posts.index', [
            'posts' => $allPosts

        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    /**
     *To display the data :..........
     * @param int $postId;
     * @return use Illuminate\Http\Response;
     */

    public function show($postId)
    {
    return view(view:'posts.show',data:['id'=>$postId]);
    }
    public function store(Request $request)
    {
    return redirect()->route(route:'posts.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {
        // $post =Posts::findOrFail($postId);
        return view('edit', compact('post'));
    }
}
