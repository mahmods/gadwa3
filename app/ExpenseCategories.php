<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategories extends Model
{
    use Translatable;
    public $translatedAttributes = ['title','description'];
    protected $table='expenses_categories';
    protected $fillable = ['id'];

    function expense(){
        return $this->hasMany(Expense::class,'category_id','id');
    }

}
