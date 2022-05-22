<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');

        $list = \DB::table('posts')->get();
        return view('post.index')->with('posts', $posts);

    }



    public function postTweet(Request $request)
    {
        $post = $request->input('newPost');
        \DB::table('posts')->insert([ 'tweet' => $tweet ]);
        return redirect('posts.index');
    }
}
