<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStatistic extends Model
{
    protected $fillable = ['ip', 'city', 'device'];
}
