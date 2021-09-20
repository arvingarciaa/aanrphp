<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommodityViews extends Model
{
    use HasFactory;
    protected $table = 'commodity_views';
    protected $fillable = ['title'];
}
