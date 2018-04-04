<?php

namespace App\Http\Controllers;
use App\IncreaseRate;
use App\Repositories\IncreaseRateRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/**
 * Class IncreaseRateController
 * @package App\Http\Controllers
 */
class IncreaseRateController extends Controller
{
    /**
     * @var IncreaseRateRepository
     */
    protected $increaseRateRepository;
    /**
     * @var $increaseRate
     */
    protected $increaseRate;
    /**
     * IncreaseRateController constructor.
     */
    public function __construct()
    {
        $this->increaseRateRepository=new IncreaseRateRepository();
        $this->increaseRate=new IncreaseRate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $increase_rates=$this->increaseRateRepository->getAllIncreaseRates();
        return view('backend.increase_rates.all_increase_rates',compact('increase_rates'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.increase_rates.add_increase_rate');
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
            'years'=>'required',
            'percentage'=>'required',
        ]);
        $this->increaseRateRepository->postAddIncreaseRate($request->all(),$this->increaseRate);
        return redirect()->route('getAllIncreaseRates');
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
     * @param  int  $IncreaseRateId
     * @return \Illuminate\Http\Response
     */
    public function edit($IncreaseRateId)
    {
        $increase_rate=$this->increaseRateRepository->getIncreaseRateById($IncreaseRateId);
        return view('backend.increase_rates.increase_rate',compact('increase_rate'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $IncreaseRateId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IncreaseRateId)
    {
        $this->validate($request,[
            'years'=>'required',
            'percentage'=>'required',
        ]);
        $this->increaseRateRepository->updateIncreaseRate($IncreaseRateId,(array) $request->all(),$this->increaseRate);
        return redirect()->route('getAllIncreaseRates');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $IncreaseRateId
     * @return \Illuminate\Http\Response
     */
    public function delete($IncreaseRateId)
    {
        $this->increaseRateRepository->deleteIncreaseRateById($IncreaseRateId);
        return redirect()->route('getAllIncreaseRates');
    }
}