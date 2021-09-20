<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ISPViews extends Model
{
    use HasFactory;
    protected $table = 'isp_views';
    protected $fillable = ['title'];
}
