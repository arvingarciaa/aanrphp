<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APIEntries extends Model
{
    protected $table = 'api_entries';

    use HasFactory;
}
