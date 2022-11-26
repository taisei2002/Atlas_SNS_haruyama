<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //

    protected $fillable = ['following_id', 'followed_id'];

    protected $table = 'follows';



    public function getFollowCount($user_id)
    {
        return $this->where('following_id', $user_id)->count();
    }

    public function getFollowerCount($user_id)
    {
        return $this->where('followed_id', $user_id)->count();
    }
//Follow.php
     public function followingIds(Int $user_id)
  {
      return $this->where('following_id', $user_id)->get();
  }

     public function followedIds(Int $user_id)
  {
      return $this->where('followed_id', $user_id)->get();
  }



}
