<?php

namespace App\Http\Controllers;
use App\ExpenseCategories;
use App\Repositories\ExpenseCategoriesRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class ExpenseCategoriesController
 * @package App\Http\Controllers
 */
class ExpenseCategoriesController extends Controller
{
    /**
     * @var ExpenseCategoriesRepository
     */
    protected $expenseCategoriesRepository;
    /**
     * @var ExpenseCategories
     */
    protected $expenseCategories;
    /**
     * ExpenseCategoriesController constructor.
     */
    public function __construct()
    {
        $this->expenseCategoriesRepository=new ExpenseCategoriesRepository();
        $this->expenseCategories=new ExpenseCategories();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=$this->expenseCategoriesRepository->getAllExpenseCategories();
        return view('backend.constants.expense_categories.all_expense_categories',compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.constants.expense_categories.add_category');
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
        $this->expenseCategoriesRepository->postAddExpenseCategories($request->all(),$this->expenseCategories);
        return redirect()->route('getAllExpenseCategories');
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
     * @param  int  $expenseCategoriesId
     * @return \Illuminate\Http\Response
     */
    public function edit($expenseCategoriesId)
    {
        $category=$this->expenseCategoriesRepository->getExpenseCategoriesById($expenseCategoriesId);
        return view('backend.constants.expense_categories.category',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $expenseCategoriesId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $expenseCategoriesId)
    {
        $this->validate($request,[
            'title'=>'required|max:100',
            'description'=>'required',
        ]);
        $this->expenseCategoriesRepository->updateExpenseCategories($expenseCategoriesId,(array) $request->all(),$this->expenseCategories);
        return redirect()->route('getAllExpenseCategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $expenseCategoriesId
     * @return \Illuminate\Http\Response
     */
    public function delete($expenseCategoriesId)
    {
        $this->expenseCategoriesRepository->deleteExpenseCategoriesById($expenseCategoriesId);
        return redirect()->route('getAllExpenseCategories');
    }
}

