<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtifactAANRViews extends Model
{
    use HasFactory;
    protected $table = 'artifactaanr_views';
    protected $fillable = ['title'];
}
