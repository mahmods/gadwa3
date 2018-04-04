<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use Translatable;
    public $translatedAttributes = ['title','description','item','type','location'];
    protected $table='studies_expenses';
    protected $fillable = ['id','value','space','count','category_id','study_id'];

    function study(){
        return $this->belongsTo(Study::class,'study_id','id');
    }


}
