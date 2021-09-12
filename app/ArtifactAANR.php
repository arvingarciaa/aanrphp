<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class ArtifactAANR extends Model
{
    protected $table = 'artifactaanr';
    protected $fillable = ['title'];
    use SearchableTrait;
    use HasFactory;

    protected $searchable = [
        'columns' => [
            'artifactaanr.title' => 10,
            'artifactaanr.keywords' => 10,
            'artifactaanr.description' => 5,
            'artifactaanr.author_institution' => 3,
            'artifactaanr.author' => 3,
            'artifactaanr.date_published' => 3,
        ]
    ];

    public function industry(){
        return $this->belongsTo('App\Industry');
    }

    public function consortia(){
        return $this->belongsTo('App\Consortia');
    }

    public function content(){
        return $this->belongsTo('App\Content');
    }

    public function isp(){
        return $this->belongsToMany('App\ISP', 'artifactaanr_isp', 'artifactaanr_id', 'isp_id');
    }

    public function commodities(){
        return $this->belongsToMany('App\Commodity', 'artifactaanr_commodity','artifactaanr_id', 'commodity_id');
    }
}
