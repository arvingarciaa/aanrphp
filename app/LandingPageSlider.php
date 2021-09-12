<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingPageSlider extends Model
{
    //
    public function consortia(){
        return $this->belongsTo('App\Consortia');
    }
}
