<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtifactAANR extends Model
{
    protected $table = 'artifactaanr';
    use HasFactory;
    public function industry(){
        return $this->belongsTo('App\Industry');
    }
}
