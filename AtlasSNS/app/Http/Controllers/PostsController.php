<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Validator;

class PostsController extends Controller
{

public function index()
  {
     $posts = Post::get();

      return view('posts.index',[
    'posts'=> $posts
  ]);

    }

    public function create(Request $request)
    {

        $post = $request->input('newPost');
        $user_id = Auth::id();//ログインユーザー認証

        \DB::table('posts')->insert([
        'post' => $post,
        'user_id' => $user_id
    ]);

         return redirect('/top');

    }

}
