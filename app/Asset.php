<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 24/08/17
 * Time: 10:25 ص
 */

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use Translatable;
    public $translatedAttributes = ['title','description'];
    protected $fillable=['value','space','count','deprecation_id','study_id'];
    protected $primaryKey='id';
    protected $table='studies_assets';

    function study(){
        return $this->belongsTo(Study::class,'study_id','id');
    }
    function deprecation(){
        return $this->belongsTo(Deprecation::class,'deprecation_id','id');
    }
}