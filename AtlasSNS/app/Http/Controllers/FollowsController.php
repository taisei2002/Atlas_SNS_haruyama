<?php

namespace App\Http\Controllers;
use App\User;
use Auth;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList(User $user){
        //フォローリスト
        $user = \DB::table('users')->get();
        return view('follows.followList',['user'=>$user]);
}

public function index(User $user)
{
    $all_users = $user->getAllUsers(auth()->user()->id);
}

    public function followerList(User $user){
        $user = \DB::table('users')->get();
        return view('follows.followerList',['user'=>$user]);
    }

 public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        {
          
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();

            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }
