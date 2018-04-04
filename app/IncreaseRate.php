<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class IncreaseRate extends Model
{
    protected $table='studies_increases_rate';
    protected $fillable = ['id','years','percentage','study_id'];
}
