<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class ExpenseTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['item','type','location','title','description'];
    protected $table='studies_expenses_translations';
}
