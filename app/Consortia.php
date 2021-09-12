<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consortia extends Model
{
    protected $table = 'consortia';
    protected $fillable = ['link'];


    public function consortia_members(){
        return $this->hasMany('App\ConsortiaMember');
    }

    public function users(){
        return $this->hasMany('App\User');
    }

    public function artifacts(){
        return $this->hasMany('App\ArtifactAANR');
    }

    public function slider(){
        return $this->hasMany('App\LandingPageSlider');
    }
}
