<?php

namespace App\Http\Controllers;
use App\FinanceInvestments;
use App\Repositories\FinanceInvestmentsRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class FinanceInvestmentsController
 * @package App\Http\Controllers
 */
class FinanceInvestmentsController extends Controller
{
    /**
     * @var FinanceInvestmentsRepository
     */
    protected $financeInvestmentsRepository;
    /**
     * @var FinanceInvestments
     */
    protected $financeInvestments;

    /**
     * StudiesFinanceInvestmentsController constructor.
     */
    public function __construct()
    {
        $this->financeInvestmentsRepository=new FinanceInvestmentsRepository();
        $this->financeInvestments=new FinanceInvestments();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($study_id=null)
    {
        $financeInvestments=$this->financeInvestmentsRepository->getAllFinanceInvestments($study_id);
        return view('backend.finance_investments.all_finance_investments',compact('financeInvestments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.finance_investments.add_finance_investments');
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
            'personal_investment'=>'required|numeric',
            'loan'=>'required|numeric',
            'other'=>'required|numeric',
            'study_id' =>'required',
        ]);
        $this->financeInvestmentsRepository->postAddFinanceInvestments($request->all(),$this->financeInvestments);
        return redirect()->route('getAllFinanceInvestments');
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
     * @param  int  $financeInvestmentsId
     * @return \Illuminate\Http\Response
     */
    public function edit($financeInvestmentsId)
    {
        $financeInvestments=$this->financeInvestmentsRepository->getFinanceInvestmentsById($financeInvestmentsId);
        return view('backend.finance_investments.finance_investments',compact('financeInvestments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $financeInvestmentsId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $financeInvestmentsId)
    {
        $this->validate($request,[
            'personal_investment'=>'required|numeric',
            'loan'=>'required|numeric',
            'other'=>'required|numeric',
            'study_id' =>'required',
        ]);
        $this->financeInvestmentsRepository->updateFinanceInvestments($financeInvestmentsId,(array) $request->all(),$this->financeInvestments);
        return redirect()->route('getAllFinanceInvestments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $financeInvestmentsId
     * @return \Illuminate\Http\Response
     */
    public function delete($financeInvestmentsId)
    {
        $this->financeInvestmentsRepository->deleteFinanceInvestmentsById($financeInvestmentsId);
        return redirect()->route('getAllFinanceInvestments');
    }
}
