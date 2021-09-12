<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ISP extends Model
{
    protected $table = 'isp';

    use HasFactory;
    public function sector(){
        return $this->belongsTo('App\Sector');
    }

    public function commodities(){
        return $this->hasMany('App\Commodity', 'isp_id');
    }

    public function artifacts(){
        return $this->belongsToMany('App\ArtifactAANR', 'artifactaanr_isp', 'artifactaanr_id', 'isp_id');
    }
}
