<?php
/**
 * Created by PhpStorm.
 * User: mustapha
 * Date: 23/08/17
 * Time: 04:37 م
 */

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use Translatable;
    public $translatedAttributes = ['title','description'];
    protected $fillable=['id'];
    protected $primaryKey='id';
    protected $table='unites';
}
