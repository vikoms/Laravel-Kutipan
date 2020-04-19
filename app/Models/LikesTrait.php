<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;


trait LikesTrait
{
  public function likes()
  {
    return $this->morphMany('App\Models\Like','likeable');
  }

  public function is_liked() {
   return $this->likes->where('user_id', Auth::user()->id)->count();
  }
}
