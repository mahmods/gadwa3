<?php

namespace App\Http\Controllers;
use App\Marketing;
use App\Repositories\MarketingRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class MarketingController
 * @package App\Http\Controllers
 */
class MarketingController extends Controller
{
    /**
     * @var MarketingRepository
     */
    protected $marketingRepository;
    /**
     * @var Marketing
     */
    protected $marketing;

    /**
     * StudiesMarketingController constructor.
     */
    public function __construct()
    {
        $this->marketingRepository=new MarketingRepository();
        $this->marketing=new Marketing();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($study_id=null)
    {
        $marketings=$this->marketingRepository->getAllMarketings($study_id);
        return view('backend.marketing.all_marketings',compact('marketings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.marketing.add_marketing');
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
            'description'=>'required',
            'study_id' =>'required',
        ]);
        $this->marketingRepository->postAddMarketing($request->all(),$this->marketing);
        return redirect()->route('getAllMarketings');
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
     * @param  int  $marketingId
     * @return \Illuminate\Http\Response
     */
    public function edit($marketingId)
    {
        $marketing=$this->marketingRepository->getMarketingById($marketingId);
        return view('backend.marketing.marketing',compact('marketing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $marketingId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $marketingId)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'description'=>'required',
            'study_id' =>'required',
        ]);
        $this->marketingRepository->updateMarketing($marketingId,(array) $request->all(),$this->marketing);
        return redirect()->route('getAllMarketings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $marketingId
     * @return \Illuminate\Http\Response
     */
    public function delete($marketingId)
    {
        $this->marketingRepository->deleteMarketingById($marketingId);
        return redirect()->route('getAllMarketings');
    }
}
