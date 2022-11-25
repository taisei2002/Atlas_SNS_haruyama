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

    public function followList(Post $post, User $user, Follow $follower){


        $follows = auth()->user()->follows()->get();//フォロー取得
        $user = auth()->user();//認証ユーザー取得
        $follow_ids = $follower->followingIds($user->id);
        $following_ids = $follow_ids->pluck('followed_id')->toArray();
        $posts = Post::whereIn('user_id', $following_ids)
        ->orderBy('created_at','desc')
        ->get();


//画像アイコン
        $images = DB::table('users')->get();
        $images = auth()->user()->follows()->get();


        return view('follows.followList', compact('posts'))->with(['images'=>$images]);
}


public function timeline() {
        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_user_id'))->latest()->get();
        return view('posts.timeline')->with([
            'posts' => $post,
            ]);
    }

    public function followerList(User $user, Follow $follower){
        //フォロワーリスト
        $followers = auth()->user()->followUsers()->get();//フォロワー取得
        $user = auth()->user();//認証ユーザー取得
        $follower_ids = $follower->followedIds($user->id);
        $followed_ids = $follower_ids->pluck('following_id')->toArray();
        $posts = Post::whereIn('user_id', $followed_ids)
        ->orderBy('created_at','desc')
        ->get();



        $images = DB::table('users')->get();
        $images = auth()->user()->followUsers()->get();

             $user = DB::table('users')
        ->leftJoin('posts', 'users.id', '=', 'posts.user_id')//テーブル結合
      //  ->where( 'posts.posts','=',$id )
          ->get();


        return view('follows.followerList',compact('posts'))->with(['user'=>$followers,'images'=>$images ]);
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


public function test(Request $request)
{



$user = Auth::user();

  return view('posts.test');

}}
