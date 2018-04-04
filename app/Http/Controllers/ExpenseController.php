<?php

namespace App\Http\Controllers;
use App\Expense;
use App\Repositories\ExpenseRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/**
 * Class ExpenseController
 * @package App\Http\Controllers
 */
class ExpenseController extends Controller
{
    /**
     * @var ExpenseRepository
     */
    protected $expenseRepository;
    /**
     * @var Expense
     */
    protected $expense;
    /**
     * ExpenseController constructor.
     */
    public function __construct()
    {
        $this->expenseRepository=new ExpenseRepository();
        $this->expense=new Expense();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses=$this->expenseRepository->getAllExpenses();
        return view('backend.expenses.all_expenses',compact('expenses'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.expenses.add_expense');
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
            'count'=>'required|numeric',
            'space'=>'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'value'=>'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
        ]);
        $this->expenseRepository->postAddExpense($request->all(),$this->expense);
        return redirect()->route('getAllExpenses');
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
     * @param  int  $expenseId
     * @return \Illuminate\Http\Response
     */
    public function edit($expenseId)
    {
        $expense=$this->expenseRepository->getExpenseById($expenseId);
        return view('backend.expenses.expense',compact('expense'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $expenseId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $expenseId)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'description'=>'required',
        ]);
        $this->expenseRepository->updateExpense($expenseId,(array) $request->all(),$this->expense);
        return redirect()->route('getAllExpenses');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $expenseId
     * @return \Illuminate\Http\Response
     */
    public function delete($expenseId)
    {
        $this->expenseRepository->deleteExpenseById($expenseId);
        return redirect()->route('getAllExpenses');
    }
}