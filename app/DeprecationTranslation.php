<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeprecationTranslation extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['title'];
    protected $table='deprecations_translations';
}
