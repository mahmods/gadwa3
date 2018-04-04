<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use Translatable;
    public $translatedAttributes = ['title','description'];
    protected $table='studies_raw_materials';
    protected $fillable = ['id','price','production','sales','unit_id','study_id'];

    function study(){
        return $this->belongsTo(Study::class,'study_id','id');
    }
    function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
}
