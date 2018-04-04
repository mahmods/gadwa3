<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use Translatable;
    public $translatedAttributes = ['title', 'description'];
    protected $table = 'studies_marketing';
    protected $fillable = ['id', 'study_id'];

    function study()
    {
        return $this->belongsTo(Study::class, 'study_id', 'id');
    }

}
