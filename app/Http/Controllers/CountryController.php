<?php

namespace App\Http\Controllers;
use App\Country;
use App\Repositories\CountryRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class CountryController
 * @package App\Http\Controllers
 */
class CountryController extends Controller
{
    /**
     * @var CountryRepository
     */
    protected $countryRepository;
    /**
     * @var Country
     */
    protected $country;

    /**
     * StudiesCountryController constructor.
     */
    public function __construct()
    {
        $this->countryRepository=new CountryRepository();
        $this->country=new Country();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=$this->countryRepository->getAllCountries();
        return view('backend.constants.countries.all_countries',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.constants.countries.add_country');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>'required|max:100',
            'code'=>'required',
        ]);
        $this->countryRepository->postAddCountry($request->all(),$this->country);
        return redirect()->route('getAllCountries');
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
     * @param  int  $countryId
     * @return \Illuminate\Http\Response
     */
    public function edit($countryId)
    {
        $country=$this->countryRepository->getCountryById($countryId);
        return view('backend.constants.countries.country',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $countryId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $countryId)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'code'=>'required',
        ]);
        $this->countryRepository->updateCountry($countryId,(array) $request->all(),$this->country);
        return redirect()->route('getAllCountries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $countryId
     * @return \Illuminate\Http\Response
     */
    public function delete($countryId)
    {
        $this->countryRepository->deleteCountryById($countryId);
        return redirect()->route('getAllCountries');
    }
}
