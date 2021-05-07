<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    public function articles(){
        return $this->hasMany('App\Article');
    }

    public function sectors(){
        return $this->hasMany('App\Sector');
    }

    public function artifacts(){
        return $this->hasMany('App\ArtifactAANR');
    }
}
