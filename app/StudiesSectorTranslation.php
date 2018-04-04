<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudiesSectorTranslation extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['title','description'];
    protected $table='studies_sectors_translations';
}
