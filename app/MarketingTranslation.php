<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketingTranslation extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['title','description'];
    protected $table='studies_marketing_translations';
}
