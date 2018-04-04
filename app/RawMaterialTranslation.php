<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterialTranslation extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['title','description'];
    protected $table='studies_rw_mat_translations';
}
