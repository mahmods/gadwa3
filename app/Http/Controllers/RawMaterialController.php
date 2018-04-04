<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 24/08/17
 * Time: 01:59 م
 */


namespace App\Http\Controllers;
use App\RawMaterial;
use App\Repositories\RawMaterialRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class RawMaterialController
 * @package App\Http\Controllers
 */
class RawMaterialController extends Controller
{
    /**
     * @var RawMaterialRepository
     */
    protected $rawRepository;
    /**
     * @var RawMaterial
     */
    protected $raw;

    /**
     * StudiesRawMaterialController constructor.
     */
    public function __construct()
    {
        $this->rawRepository=new RawMaterialRepository();
        $this->raw=new RawMaterial();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($study_id=null)
    {
        $rawMaterials=$this->rawRepository->getAllRawMaterials($study_id);
        return view('backend.raw_materials.all_raw_materials',compact('rawMaterials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.raw_materials.add_raw_material');
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
            'price' =>'required|numeric',
            'production' =>'required|numeric',
            'sales' =>'required|numeric',
            'unit_id' =>'required',
            'study_id' =>'required',
            'description'=>'required',
        ]);

        $this->rawRepository->postAddRawMaterial($request->all(),$this->raw);
        return redirect()->route('getAllRawMaterials');
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
     * @param  int  $rawMaterialId
     * @return \Illuminate\Http\Response
     */
    public function edit($rawMaterialId)
    {
        $rawMaterial=$this->rawRepository->getRawMaterialById($rawMaterialId);
        return view('backend.raw_materials.raw_material',compact('rawMaterial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $rawMaterialId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rawMaterialId)
    {
        $this->validate($request,[
            'title' =>'required|max:100',
            'price' =>'required|numeric',
            'production' =>'required|numeric',
            'sales' =>'required|numeric',
            'unit_id' =>'required',
            'study_id' =>'required',
            'description'=>'required',
        ]);
        $this->rawRepository->updateRawMaterial($rawMaterialId,(array) $request->all(),$this->raw);
        return redirect()->route('getAllRawMaterials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $rawMaterialId
     * @return \Illuminate\Http\Response
     */
    public function delete($rawMaterialId)
    {
        $this->rawRepository->deleteRawMaterialById($rawMaterialId);
        return redirect()->route('getAllRawMaterials');
    }
}