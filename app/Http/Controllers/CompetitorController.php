<?php

namespace App\Http\Controllers;
use App\Competitor;
use App\Repositories\CompetitorRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class CompetitorController
 * @package App\Http\Controllers
 */
class CompetitorController extends Controller
{
    /**
     * @var CompetitorRepository
     */
    protected $competitorRepository;
    /**
     * @var Competitor
     */
    protected $competitor;

    /**
     * StudiesCompetitorController constructor.
     */
    public function __construct()
    {
        $this->competitorRepository=new CompetitorRepository();
        $this->competitor=new Competitor();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($study_id=null)
    {
        $competitors=$this->competitorRepository->getAllCompetitors($study_id);
        return view('backend.competitors.all_competitors',compact('competitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.competitors.add_competitor');
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
        $this->competitorRepository->postAddCompetitor($request->all(),$this->competitor);
        return redirect()->route('getAllCompetitors');
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
     * @param  int  $competitorId
     * @return \Illuminate\Http\Response
     */
    public function edit($competitorId)
    {
        $competitor=$this->competitorRepository->getCompetitorById($competitorId);
        return view('backend.competitors.competitor',compact('competitor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $competitorId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $competitorId)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'description'=>'required',
            'study_id' =>'required',
        ]);
        $this->competitorRepository->updateCompetitor($competitorId,(array) $request->all(),$this->competitor);
        return redirect()->route('getAllCompetitors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $competitorId
     * @return \Illuminate\Http\Response
     */
    public function delete($competitorId)
    {
        $this->competitorRepository->deleteCompetitorById($competitorId);
        return redirect()->route('getAllCompetitors');
    }
}
