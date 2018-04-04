<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 22/08/17
 * Time: 12:24 م
 */

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    use Translatable;
    public $translatedAttributes = ['title'];
    protected $table='currencies';
    protected $fillable = ['symbol','code','rate'];


}
