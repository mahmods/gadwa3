<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 21/08/17
 * Time: 04:54 م
 */

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Study extends Model
{
    use Translatable;
    public $translatedAttributes = ['title','description'];
    protected $fillable=[
            'phone','space',
            'email','location',
            'user_id','country_id',
            'city_id','currency_id',
            'sector_id','working_capital_months'
    ];
    protected $primaryKey='id';
    protected $table='studies';
    function customer(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
    function sector(){
        return $this->belongsTo(Sector::class,'sector_id','id');
    }
    function studySector(){
        return $this->hasMany(StudiesSector::class,'study_id','id');
    }
    function products() {
        return $this->hasMany(Product::class,'study_id','id');
    }
    function competitors() {
        return $this->hasMany(Competitor::class,'study_id','id');
    }
    function marketing() {
        return $this->hasMany(Marketing::class,'study_id','id');
    }
    function four_analyze() {
        return $this->hasMany(FourAnalyze::class,'study_id','id');
    }
    function increases_rate() {
        return $this->hasMany(IncreaseRate::class,'study_id','id');
    }
    function assets() {
        return $this->hasMany(Asset::class,'study_id','id');
    }
    function rawMaterials() {
        return $this->hasMany(RawMaterial::class,'study_id','id');
    }
    function expenses() {
        return $this->hasMany(Expense::class,'study_id','id');
    }
    function financeInvestments() {
        return $this->hasOne(FinanceInvestments::class,'study_id','id');
    }

}

