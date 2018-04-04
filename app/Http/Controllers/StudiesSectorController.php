<?php

namespace App\Http\Controllers;
use App\StudiesSector;
use App\Repositories\StudiesSectorRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class StudiesSectorController
 * @package App\Http\Controllers
 */
class StudiesSectorController extends Controller
{
    /**
     * @var StudiesSectorRepository
     */
    protected $sectorRepository;
    /**
     * @var StudiesSector
     */
    protected $sector;

    /**
     * StudiesSectorController constructor.
     */
    public function __construct()
    {
        $this->sectorRepository=new StudiesSectorRepository();
        $this->sector=new StudiesSector();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors=$this->sectorRepository->getAllStudiesSectors();
        return view('backend.studies_sectors.all_sectors',compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.studies_sectors.add_sector');
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
            'study_id'=>'required',
        ]);
        $this->sectorRepository->postAddStudiesSector($request->all(),$this->sector);
        return redirect()->route('getAllStudiesSectors');
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
     * @param  int  $sectorId
     * @return \Illuminate\Http\Response
     */
    public function edit($sectorId)
    {
        $sector=$this->sectorRepository->getStudiesSectorById($sectorId);
        return view('backend.studies_sectors.sector',compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $sectorId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sectorId)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'description'=>'required',
            'study_id'=>'required',
        ]);
        $this->sectorRepository->updateStudiesSector($sectorId,(array) $request->all(),$this->sector);
        return redirect()->route('getAllStudiesSectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $sectorId
     * @return \Illuminate\Http\Response
     */
    public function delete($sectorId)
    {
        $this->sectorRepository->deleteStudiesSectorById($sectorId);
        return redirect()->route('getAllStudiesSectors');
    }
}
