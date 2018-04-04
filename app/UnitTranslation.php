<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','description'];
    protected $table='unites_translations';
}
