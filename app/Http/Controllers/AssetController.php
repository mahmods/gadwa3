<?php

namespace App\Http\Controllers;
use App\Asset;
use App\Repositories\AssetRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/**
 * Class AssetController
 * @package App\Http\Controllers
 */
class AssetController extends Controller
{
    /**
     * @var $assetRepository
     */
    protected $assetRepository;
    /**
     * @var $asset
     */
    protected $asset;
    /**
     * AssetController constructor.
     */
    public function __construct()
    {
        $this->assetRepository=new AssetRepository();
        $this->asset=new Asset();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($study_id=null)
    {
        $assets=$this->assetRepository->getAllAsset($study_id);
        return view('backend.assets.all_assets',compact('assets'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.assets.add_asset');
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
            'space' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'value' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'count'=>'required|numeric'
        ]);
        $this->assetRepository->postAddAsset($request->all(),$this->asset);
        return redirect()->route('getAllAssets');
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
     * @param  int  $assetId
     * @return \Illuminate\Http\Response
     */
    public function edit($assetId)
    {
        $asset=$this->assetRepository->getAssetById($assetId);
        return view('backend.assets.asset',compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $assetId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $assetId)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'description'=>'required',
        ]);
        $this->assetRepository->updateAsset($assetId,(array) $request->all(),$this->asset);
        return redirect()->route('getAllAssets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $assetId
     * @return \Illuminate\Http\Response
     */
    public function delete($assetId)
    {
        $this->assetRepository->deleteAssetById($assetId);
        return redirect()->route('getAllAssets');
    }
}

