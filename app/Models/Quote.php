<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Quote extends Model
{

  use LikesTrait;

    protected $fillable = [
      'title','slug','subject','user_id'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function comments()
    {
      return $this->hasMany('App\Models\QuoteComment','quote_id','id');
    }

    public function tags()
    {
      return $this->belongsToMany('App\Models\Tag');
    }

    public function isOwner()
    {

      if(Auth::guest()) {
        return false;
      } else {
        return Auth::user()->id == $this->user->id;
      }
    }
}
