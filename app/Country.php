<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 22/08/17
 * Time: 12:40 م
 */


namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    use Translatable;
    public $translatedAttributes = ['title'];
    protected $table='countries';
    protected $fillable = ['code'];


}