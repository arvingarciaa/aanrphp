<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';
    use HasFactory;
    public function content_subtypes(){
        return $this->hasMany('App\ContentSubtype');
    }
    public function artifacts(){
        return $this->hasMany('App\ArtifactAANR');
    }
}
