<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['content', 'creator', 'creator_name', 'activitydate'];
}
