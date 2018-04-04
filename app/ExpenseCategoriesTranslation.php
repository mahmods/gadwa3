<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategoriesTranslation extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['title','description'];
    protected $table='expenses_categories_translations';
}
