<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
      public function posts() {
        //1対多の「多」側なので複数形
        return $this->hasMany('App\Post');
        }

   protected $fillable = ['post'];

}
