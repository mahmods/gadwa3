<?php

namespace App\Http\Controllers;
use App\Deprecation;
use App\Repositories\DeprecationRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class DeprecationController extends Controller
{
    protected $deprecationRepository;
    protected $deprecation;

    public function __construct()
    {
        $this->deprecationRepository=new DeprecationRepository();
        $this->deprecation=new Deprecation();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deprecations=$this->deprecationRepository->getAllDeprecation();
        return view('backend.constants.deprecations.all_deprecations',compact('deprecations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.constants.deprecations.add_deprecation');
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
            'percentage'=>'required',
        ]);
        $this->deprecationRepository->postAddDeprecation($request->all(),$this->deprecation);
        return redirect()->route('getAllDeprecations');
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
     * @param  int  $deprecationId
     * @return \Illuminate\Http\Response
     */
    public function edit($deprecationId)
    {

        $deprecation=$this->deprecationRepository->getDeprecationById($deprecationId);
        return view('backend.constants.deprecations.deprecation',compact('deprecation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $deprecationId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $deprecationId)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'percentage'=>'required',
        ]);
        $this->deprecationRepository->updateDeprecation($deprecationId,(array) $request->all(),$this->deprecation);
        return redirect()->route('getAllDeprecations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $deprecationId
     * @return \Illuminate\Http\Response
     */
    public function delete($deprecationId)
    {
        $this->deprecationRepository->deleteDeprecationById($deprecationId);
        return redirect()->route('getAllDeprecations');
    }
}
