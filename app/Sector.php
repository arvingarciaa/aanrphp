<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    public function industry(){
        return $this->belongsTo('App\Industry');
    }

    public function isps(){
        return $this->hasMany('App\ISP');
    }
}
