<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    use Translatable;
    public $translatedAttributes = ['title', 'description','product','place'];
    protected $table = 'studies_competitors';
    protected $fillable = ['id', 'study_id', 'product_id'];

    function study()
    {
        return $this->belongsTo(Study::class, 'study_id', 'id');
    }

}
