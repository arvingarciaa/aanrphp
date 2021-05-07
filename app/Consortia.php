<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consortia extends Model
{
    protected $table = 'consortia';

    public function consortia_members(){
        return $this->hasMany('App\ConsortiaMember');
    }
}
