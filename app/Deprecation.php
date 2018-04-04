<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Deprecation extends Model
{
    use Translatable;
    public $translatedAttributes = ['title'];
    protected $fillable=['id','percentage'];
    protected $primaryKey='id';
    protected $table='deprecations';
    function assets(){
        return $this->hasMany(Asset::class,'deprecation_id','id');
    }
}
