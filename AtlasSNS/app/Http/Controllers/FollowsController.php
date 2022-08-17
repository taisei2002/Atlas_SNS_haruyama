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



    public function followerList(User $user){
        $user = \DB::table('users')->get();
        return view('follows.followerList',['user'=>$user]);
    }

//フォロー
 public function follow(User $user)
    {
        $auth=auth()->user()->id;
        $user=User::find($auth);

        $follower = Auth::user();
        $is_following = $follower->isFollowing($user->id);
dd($user);
        if(!$is_following){
             $follower->follow($user->id);
        }
            return back();
}
public function unfollow(User $user)
    {

        $auth=auth()->user()->id;
        $user=User::find($auth);

        $follower = Auth::user();
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following){
            $follower->unfollow($user->id);
        }

        return back();
    }
//テスト

public function test(Request $request)
{

 $id = $request->input('id');
\DB::table('users')->where('id',$id)->select();
 return view('posts.test');
}
}
