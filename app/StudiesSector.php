<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class StudiesSector extends Model
{
    use Translatable;
    public $translatedAttributes = ['title','description'];
    protected $table='studies_sectors';
    protected $fillable = ['id','study_id'];

    function study(){
        return $this->belongsTo(Study::class,'study_id','id');
    }
}
