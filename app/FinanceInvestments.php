<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class FinanceInvestments extends Model
{
    //use Translatable;
    //public $translatedAttributes = ['title', 'description'];
    protected $table = 'studies_finance_investments';
    protected $fillable = ['id', 'study_id','personal_investment','loan','other'];

    function study()
    {
        return $this->belongsTo(Study::class, 'study_id', 'id');
    }

}
