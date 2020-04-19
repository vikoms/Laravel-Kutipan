<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function quotes()
    {
      return $this->belongsToMany('App\Models\Quote');
    }
}
