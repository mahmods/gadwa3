<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use Translatable;
    public $translatedAttributes = ['title','description'];
    protected $table='contents';
    protected $fillable = ['id','image','content_type','video','step_type','hint_step','hint_order','step_name'];
}
