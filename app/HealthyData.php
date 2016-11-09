<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthyData extends Model
{
    protected $table = 'healthdata';

    protected $fillable = ['user_id', 'user_name', 'height', 'weight', 'heart_rate', 'blood_pressure', 'sleep_time', 'steps', 'date'];
}
