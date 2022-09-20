<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

   protected $fillable = ['id','user_id', 'post'];
    //
      public function post() {
        //1対多の「多」側なので複数形
        return $this->hasMany('App\User');
        }

public function getUserTimeLine(Int $user_id)
{
return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(50);
}

}
