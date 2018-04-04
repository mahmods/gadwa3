<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table='study_status';
    protected $fillable = ['id','study_id','step_one','step_two','step_three','step_four','step_five','step_six','is_completed'];
}
