<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use Translatable;
    public $translatedAttributes = ['title','description'];
    protected $table='sectors';
    protected $fillable = ['id'];
}
