<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function industry(){
        return $this->belongsTo('App\Industry');
    }
}
