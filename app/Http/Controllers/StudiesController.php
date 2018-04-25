<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 21/08/17
 * Time: 04:19 م
 */

namespace App\Http\Controllers;
use App\Deprecation;
use App\ExpenseCategories;
use App\Product;
use App\StudiesSector;
use App\Study;
use App\Repositories\StudyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use PDF;

class StudiesController extends Controller
{
    protected $studyRepository;
    protected $study;

    public function __construct()
    {
        $this->studyRepository=new StudyRepository();
        $this->study=new Study();
    }

    public function getUserStudies($userId)
    {
        $studies=$this->studyRepository->getStudiesByUserId($userId);
        return view('front.pages.profile',compact('studies'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studies=$this->studyRepository->getAllStudies();
        return view('backend.studies.list',compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.studies.add');
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
            'phone' =>'required|max:100',
            'space' =>'required|max:100',
            'email' =>'required|email|unique:studies',
            'location' =>'required|max:100',
            'user_id' =>'required',
            'country_id' =>'required',
            'city_id' =>'required',
            'currency_id' =>'required',
            'sector_id' =>'required',
        ]);
        $this->studyRepository->postAddStudy($request->all(),$this->study);
        return redirect()->route('getAllStudies');
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
     * @param  int  $studyId
     * @return \Illuminate\Http\Response
     */
    public function edit($studyId)
    {

        $study=$this->studyRepository->getStudyById($studyId);
        return view('backend.studies.edit',compact('study'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $studyId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $studyId)
    {
        $this->validate($request,[
            'title' =>'required|max:100',
            'phone' =>'required|max:100',
            'space' =>'required|max:100',
            'email' =>'required|email',
            'location' =>'required|max:100',
            'user_id' =>'required',
            'country_id' =>'required',
            'city_id' =>'required',
            'currency_id' =>'required',
            'sector_id' =>'required',
        ]);
        $this->studyRepository->updateStudy($studyId,(array) $request->all(),$this->study);
        return redirect()->route('getAllStudies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $studyId
     * @return \Illuminate\Http\Response
     */
    public function delete($studyId)
    {
        $this->studyRepository->deleteStudyById($studyId);
        return redirect()->route('getAllStudies');
    }

    public function getUserId(){
        return response()->json(['user_id'=>Auth::user()->id]);
    }
    public function getStudyByUserId($userId=0)
    {
        if (Request::route()->getName() == "apiGetStudyByUserId") {
            $study = Study::where('user_id',$userId)->first();
            if (count($study) != 0) {
                return response()->json(['status_code' => 200, 'study' => $study]);
            } else {
                return response()->json([
                    'error' => [
                        'message' => 'Not Found',
                        'status_code' => 404
                    ]
                ]);
            }
        }
    }
    public function studyView($id)
    {
        $study=Study::find($id);
        $deprecations=Deprecation::all();
        $expenses_categories=ExpenseCategories::all();
        // $pdf = PDF::loadView('front.layouts.report',compact('study','deprecations','expenses_categories'));
        //return $pdf->stream('document.pdf');
        return view('front.layouts.report',compact('study','deprecations','expenses_categories'));
    }

    public function genreatePdf($id)
    {
        $study=Study::find($id);
        $deprecations=Deprecation::all();
        $expenses_categories=ExpenseCategories::all();
        $pdf = PDF::loadView('front.layouts.pdf',compact('study','deprecations','expenses_categories'));
		return $pdf->stream('document.pdf');
        //return view('front.layouts.report',compact('study','deprecations','expenses_categories'));
    }
}
