<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['title'];
    protected $table='cities_translations';
}
