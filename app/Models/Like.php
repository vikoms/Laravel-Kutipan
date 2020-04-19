<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $fillable = [
        'user_id','likeable_type','likeable_id'
    ];
    
    public $timestamps = false;

    public function likeable()
    {
        return $this->morphTo();
    }
}
