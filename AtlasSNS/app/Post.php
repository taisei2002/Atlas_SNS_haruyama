<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

   protected $fillable = ['id','user_id', 'post'];


    public function user() { //1対多の「１」側なので単数系
        return $this->belongsTo('App\User');
     }

public function getTimeLines(Int $user_id)
    {
        return $this->where('user_id','<>',  $user_id)->orderBy('created_at', 'DESC')->paginate();
    }



}
