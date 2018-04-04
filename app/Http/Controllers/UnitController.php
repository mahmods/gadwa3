<?php

namespace App\Http\Controllers;
use App\Unit;
use App\Repositories\UnitRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class UnitController
 * @package App\Http\Controllers
 */
class UnitController extends Controller
{
    /**
     * @var UnitRepository
     */
    protected $unitRepository;
    /**
     * @var Unit
     */
    protected $unit;
    /**
     * UnitController constructor.
     */
    public function __construct()
    {
        $this->unitRepository=new UnitRepository();
        $this->unit=new Unit();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unites=$this->unitRepository->getAllUnites();
        return view('backend.constants.units.all_unites',compact('unites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.constants.units.add_unit');
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
        $this->unitRepository->postAddUnit($request->all(),$this->unit);
        return redirect()->route('getAllUnites');
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
     * @param  int  $unitId
     * @return \Illuminate\Http\Response
     */
    public function edit($unitId)
    {
        $unit=$this->unitRepository->getUnitById($unitId);
        return view('backend.constants.units.unit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $unitId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $unitId)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'description'=>'required',
        ]);
        $this->unitRepository->updateUnit($unitId,(array) $request->all(),$this->unit);
        return redirect()->route('getAllUnites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $unitId
     * @return \Illuminate\Http\Response
     */
    public function delete($unitId)
    {
        $this->unitRepository->deleteUnitById($unitId);
        return redirect()->route('getAllUnites');
    }
}
