<?php

namespace App\Http\Controllers;
use App\Sector;
use App\Repositories\SectorRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class SectorController
 * @package App\Http\Controllers
 */
class SectorController extends Controller
{
    /**
     * @var SectorRepository
     */
    protected $sectorRepository;
    /**
     * @var Sector
     */
    protected $sector;

    /**
     * SectorController constructor.
     */
    public function __construct()
    {
        $this->sectorRepository=new SectorRepository();
        $this->sector=new Sector();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors=$this->sectorRepository->getAllSectors();
        return view('backend.constants.sectors.all_sectors',compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.constants.sectors.add_sector');
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
        ]);
        $this->sectorRepository->postAddSector($request->all(),$this->sector);
        return redirect()->route('getAllSectors');
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
        $sector=$this->sectorRepository->getSectorById($sectorId);
        return view('backend.constants.sectors.sector',compact('sector'));
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
        ]);
        $this->sectorRepository->updateSector($sectorId,(array) $request->all(),$this->sector);
        return redirect()->route('getAllSectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $sectorId
     * @return \Illuminate\Http\Response
     */
    public function delete($sectorId)
    {
        $this->sectorRepository->deleteSectorById($sectorId);
        return redirect()->route('getAllSectors');
    }
}
