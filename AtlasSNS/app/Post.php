<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

   protected $fillable = ['id','user_id', 'post'];
    //
      public function posts() {
        //1対多の「多」側なので複数形
        return $this->hasMany('App\User');
        }



}
