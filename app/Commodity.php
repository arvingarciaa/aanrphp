<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    use HasFactory;

    public function isp(){
        return $this->belongsTo('App\ISP', 'isp_id');
    }

    public function artifacts(){
        return $this->belongsToMany('App\ArtifactAANR', 'artifactaanr_commodity');
    }
}
