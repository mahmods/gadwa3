<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class FourAnalyze extends Model
{
    use Translatable;
    public $translatedAttributes = ['power', 'athreat', 'chance', 'challenge'];
    protected $table = 'studies_four_analyze';
    protected $fillable = ['id', 'study_id'];

    function study()
    {
        return $this->belongsTo(Study::class, 'study_id', 'id');
    }

}
