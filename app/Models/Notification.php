<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $guarded = ['id'];

    public function user() 
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function quote() 
    {
        return $this->belongsTo('App\Models\Quote','quote_id','id');
    }
}
