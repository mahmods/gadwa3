<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitorTranslation extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['title','description','product','place'];
    protected $table='studies_competitors_translations';
}
