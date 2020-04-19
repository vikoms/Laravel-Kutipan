<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class QuoteComment extends Model
{

  use LikesTrait;

  protected $fillable = ['subject','quote_id','user_id'];

    public function user()
    {
      return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function quote()
    {
      return $this->belongsTo('App\Models\Quote','quote_id','id');
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
