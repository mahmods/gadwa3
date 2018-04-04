<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class AssetTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','description'];
    protected $table='studies_assets_translations';
}