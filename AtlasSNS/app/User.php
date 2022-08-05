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

     public function follow($id)
    {

        $user = User::users('id');
        dd('いまここ');
        return $this->follows('followed_id')->attach($id);


    }

    // フォロー解除する
    public function unfollow( $user_id)
    {

        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing($user_id)
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['id']);
    }

    // フォローされているか
    public function isFollowed($user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['id']);
    }
}
