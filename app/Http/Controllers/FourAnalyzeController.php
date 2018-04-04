<?php

namespace App\Http\Controllers;
use App\FourAnalyze;
use App\Repositories\FourAnalyzeRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class FourAnalyzeController
 * @package App\Http\Controllers
 */
class FourAnalyzeController extends Controller
{
    /**
     * @var FourAnalyzeRepository
     */
    protected $fourAnalyzeRepository;
    /**
     * @var FourAnalyze
     */
    protected $fourAnalyze;

    /**
     * StudiesFourAnalyzeController constructor.
     */
    public function __construct()
    {
        $this->fourAnalyzeRepository=new FourAnalyzeRepository();
        $this->fourAnalyze=new FourAnalyze();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($study_id=null)
    {
        $fourAnalyzes=$this->fourAnalyzeRepository->getAllFourAnalyzes($study_id);
        return view('backend.fourAnalyze.all_fourAnalyzes',compact('fourAnalyzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.fourAnalyze.add_fourAnalyze');
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
        $this->fourAnalyzeRepository->postAddFourAnalyze($request->all(),$this->fourAnalyze);
        return redirect()->route('getAllFourAnalyzes');
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
     * @param  int  $fourAnalyzeId
     * @return \Illuminate\Http\Response
     */
    public function edit($fourAnalyzeId)
    {
        $fourAnalyze=$this->fourAnalyzeRepository->getFourAnalyzeById($fourAnalyzeId);
        return view('backend.fourAnalyze.fourAnalyze',compact('fourAnalyze'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $fourAnalyzeId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fourAnalyzeId)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'description'=>'required',
            'study_id' =>'required',
        ]);
        $this->fourAnalyzeRepository->updateFourAnalyze($fourAnalyzeId,(array) $request->all(),$this->fourAnalyze);
        return redirect()->route('getAllFourAnalyzes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $fourAnalyzeId
     * @return \Illuminate\Http\Response
     */
    public function delete($fourAnalyzeId)
    {
        $this->fourAnalyzeRepository->deleteFourAnalyzeById($fourAnalyzeId);
        return redirect()->route('getAllFourAnalyzes');
    }
}
