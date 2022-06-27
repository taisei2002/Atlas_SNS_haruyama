<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\Post;
use App\User;
use Auth;
use Validator;

class UsersController extends Controller
{
    //
    public function profile(){
        $user = \DB::table('users')->get();
        return view('users.profile',['user'=>$user]);
    }
    public function search(){
        return view('users.search');
    }
    public function users()
    {
        $users = users::get();
    }
    //投稿内容
    public function index()
      {
         $user_id = Auth::id();

    { $list = \DB::table('posts')->get();
      $user = \DB::table('users')->first();
      return view('posts.index',['list'=>$list],['user'=>$user]);
    }




//ユーザーネーム
   {
      $user = \DB::table('users')->get();
       return view('layouts.login',['user'=>$user]);
  }

    DB::table('users')
    ->leftJoin('posts', function ($join) {
        $join->on('username.id', '=', 'post.id');

    })
    ->get();

}}
