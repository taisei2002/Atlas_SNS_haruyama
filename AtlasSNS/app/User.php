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


        public function posts() { //1対多の「多」側なので複数形
        return $this->hasMany('App\Post');
        }

    // フォロワー→フォロー
    public function  follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'following_id', 'followed_id');
    }

    // フォロー→フォロワー
    public function followUsers()
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
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['followed_id']);
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['following_id']);
    }
//Userphp
        public function getTimeLines(Int $user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC');
    }

}
