<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    protected $fillable = ['creator_id', 'creator_name', 'request', 'receiver_type', 'is_replied'];
}
