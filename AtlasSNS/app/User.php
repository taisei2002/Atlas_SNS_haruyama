<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use Auth;
use App\Post;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

      public function users() {
        //1対多の「１」側なので単数系
    return $this->belongsTo('App\Post');
    }

    // フォロワー→フォロー
    public function followUsers()
    {
        return $this->belongsToMany(self::class, 'follows', 'following_id', 'followed_id');
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'followed_id', 'following_id');
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    //ユーザー表示
        public function getAllUsers(Int $user_id)
    {
        return $this->Where('id', '<>', $user_id);
    }

// フォローする処理
    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
    }

    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id)
    {

        return $this->followUsers()->where('followed_id', $user_id)
        ->exists();
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return $this->follows()->where('following_id',$user_id)->exists();
    }
}
