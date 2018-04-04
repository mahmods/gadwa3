<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FourAnalyzeTranslation extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['power', 'athreat', 'chance', 'challenge'];
    protected $table='studies_four_analyze_translations';
}
