<?php

namespace App\Http\Controllers;
use App\User;
use App\users;
use App\Post;
use Auth;
use DB;
use Validator;
use App\Follow;

use Illuminate\Http\Request;

class FollowsController extends Controller
{

    public function followList(User $user, Follow $follower){

        $follower = Auth::user();
        $follows = auth()->user()->follows()->get();

        return view('follows.followList')->with([
            'user'=>$follows,]);
}

    public function followerList(User $user){
        //フォロワーリスト
        $followers = auth()->user()->followUsers()->get();
        return view('follows.followerList')->with(['user'=>$followers]);
    }

//フォロー
 public function follow(User $User , $id)
    {

// idを取り出す
        $user = User::find($id);

        $follower = Auth::user();

// フォローしているか
        $is_following = $follower->isFollowing($user->id);
 // もしフォローしていなければフォローする
        if(!$is_following){
             $follower->follow($user->id);
        }

         return back();
}

public function unfollow(User $User , $id)
{

        $user = User::find($id);
        Auth::User()->unfollow($user->id);
        $follower = Auth::user();
        $is_following = $follower->isFollowing($user->id);

        if(!$is_following){
            $follower->unfollow($user->id);
        }
        return back();
    }
}
