<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsortiaMember extends Model
{
    use HasFactory;
    public function consortia(){
        return $this->belongsTo('App\Consortia');
    }
}
