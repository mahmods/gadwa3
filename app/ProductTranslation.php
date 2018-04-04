<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['title','description'];
    protected $table='studies_products_translations';
}
