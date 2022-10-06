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

      //  $follower = Auth::user();
        $follows = auth()->user()->follows()->get();

        $user = auth()->user();
        $follow_ids = $follower->followingIds($user->id);
        $following_ids = $follow_ids->pluck('followed_id')->toArray();
        $posts = $post->getTimelines($user->id, $following_ids);


        //つぶやき　テストコード
        //$user_id = DB::table('posts');
        //$post = DB::table('users')
        //->leftJoin('posts', 'users.id', '=', 'posts.user_id')//テーブル結合
        //->get();


//画像アイコン
        $images = DB::table('users')->get();
        $images = auth()->user()->follows()->get();


        return view('follows.followList')->with(['user'=>$follows,'images'=>$images,'post'=>$posts]);
}


public function timeline() {
        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_user_id'))->latest()->get();
        return view('posts.timeline')->with([
            'posts' => $post,
            ]);
    }

    public function followerList(User $user){
        //フォロワーリスト
        $followers = auth()->user()->followUsers()->get();

        $images = DB::table('users')->get();
        $images = auth()->user()->followUsers()->get();

             $user = DB::table('users')
        ->leftJoin('posts', 'users.id', '=', 'posts.user_id')//テーブル結合
      //  ->where( 'posts.posts','=',$id )
          ->get();


        return view('follows.followerList')->with(['user'=>$followers,'images'=>$images ]);
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
