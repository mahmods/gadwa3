<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectorTranslation extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['title','description'];
    protected $table='sectors_translations';
}
