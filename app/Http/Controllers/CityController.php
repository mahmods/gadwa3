<?php

namespace App\Http\Controllers;
use App\City;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class CityController
 * @package App\Http\Controllers
 */
class CityController extends Controller
{
    /**
     * @var CityRepository
     */
    protected $cityRepository;
    /**
     * @var City
     */
    protected $city;

    /**
     * StudiesCityController constructor.
     */
    public function __construct()
    {
        $this->cityRepository=new CityRepository();
        $this->city=new City();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($countryId=null)
    {
        $country_id=$countryId;
        $cities=$this->cityRepository->getAllCities()->where('country_id',$countryId);
        return view('backend.constants.cities.all_cities',compact('cities','country_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($country_id)
    {
        return view('backend.constants.cities.add_city',compact('country_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$countryId)
    {
        $this->validate($request,[
            'title' =>'required|max:100',
        ]);
        $this->cityRepository->postAddCity($request->all(),$this->city);
        return redirect()->route('getAllCities',['country_id'=>$countryId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $cityId
     * @return \Illuminate\Http\Response
     */
    public function edit($countryId,$cityId)
    {
        $city=$this->cityRepository->getCityById($cityId);
        return view('backend.constants.cities.city',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $cityId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$countryId,$cityId)
    {
        $this->validate($request,[
            'title'=>'required|max:100'
        ]);
        $this->cityRepository->updateCity($cityId,(array) $request->all(),$this->city);
        return redirect()->route('getAllCities',['country_id'=>$countryId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $cityId
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$cityId)
    {

        $this->cityRepository->deleteCityById($request->get('city_id'));
        return redirect()->route('getAllCities',['country_id'=>$request->get('country_id')]);
    }
}
