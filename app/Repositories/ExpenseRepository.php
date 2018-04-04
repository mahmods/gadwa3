<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 28/08/17
 * Time: 10:23 ص
 */

namespace App\Repositories;
use App\ExpenseCategories;
use Auth;
use Request;
use App\Expense;
use App\Study;

/**
 * Class ExpenseRepository
 * @package App\Repositories
 */
class ExpenseRepository extends BaseRepository
{
    /**
     * @var Expense
     */
    protected $expense;

    /**
     * ExpenseRepository constructor.
     */
    public function __construct()
    {
        $this->expense = new Expense();
    }
    /**
     * @return array of all Expenses
     */
    public function getAllExpenses($study_id = NULL)
    {
        if (Request::route()->getName() == "apiGetAllExpenses") {
            $expenses = $this->getAllItems($this->expense)->where('study_id', $study_id);
            if (count($expenses) != 0) {
                return response()->json(['status_code' => 200, 'expenses' => $expenses]);
            } else {
                return response()->json([
                    'error' => [
                        'message' => 'Not Found',
                        'status_code' => 404
                    ]
                ]);
            }
        }
        return $this->getAllItems($this->expense);
    }

    /**
     * @param $data
     * @param $expense
     * @return \Illuminate\Http\JsonResponse
     */
    public function postAddExpense($data, $expense = NULL)
    {
        if (Request::route()->getName() == "apiPostAddExpense") {

            $request = \Illuminate\Http\Request::capture();
            foreach ($request->get('expenses') as $row) {
                if (isset($row['id'])) {
                    $obj = Expense::firstOrNew([
                        'id' => $row['id']
                    ]);
                } else {
                    $obj = new Expense();
                }

                if($row['value']) {
                    $obj->fill([
                        'item' => $row['item'],
                        'type' => $row['type'],
                        'location' => $row['location'],
                        'space' => $row['space'],
                        'value' => $row['value'],
                        'count' => $row['count'],
                        'category_id' => $row['category_id'],
                        'study_id' => $request->get('sid')
                    ]);
                    $obj->save();
                }
            }
            return response()->json(['status_code' => 200]);
        }
        $this->addItem($data, $expense);
    }

    /**
     * @param $expenseId
     * @return mixed
     */
    public function getExpenseById($expenseId)
    {
        if (Request::route()->getName() == "apiGetExpenseById") {
            $expense = $this->getItemById($expenseId, $this->expense);
            if (count($expense) != 0) {
                return response()->json(['status_code' => 200, 'expense' => $expense]);
            } else {
                return response()->json([
                    'error' => [
                        'message' => 'Not Found',
                        'status_code' => 404
                    ]
                ]);
            }
        }
        return $this->getItemById($expenseId, $this->expense);
    }
    /**
     * @param $expenseId
     * @param $data
     * @param $expense
     * @return mixed
     */
    public function updateExpense($expenseId, $data, $expense)
    {
        if (Request::route()->getName() == "apiGetExpenseById") {
            $this->updateItemById($expenseId, (array)$data, $expense);
            return response()->json(['status_code' => 200]);
        }
        return $this->updateItemById($expenseId, (array)$data, $expense);
    }
    /**
     * @param $expenseId
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteExpenseById($expenseId)
    {
        if (Expense::find($expenseId))
        {
            $this->deleteItemById($expenseId, $this->expense);
        }
        return response()->json(['status_code' => 200]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllExpensesView()
    {
        return Expense::all();
    }
    public function getWorkingCapital($study_id=NULL)
    {
        $categories = ExpenseCategories::all();
        foreach ($categories as $i => $category) {
            $cost = array();
            foreach (Expense::where('category_id', $category->id)->where('study_id',$study_id)->get() as $item) {
                /*$capital[]=[
                    'cost'=>$item->value*($item->count!=null?$item->count:1),
                ];*/
                $cost[] = $item->value * ($item->count != NULL ? $item->count : 1) * 12;
            }
            $capital[$i] = $category[$i] = [
                'title' => $category[$i] = $category->title,
                'cost' => array_sum($cost)
            ];
            /*$capital[$i]=$category[$i]=[
                'title'=>$category[$i]=$category->title,
                'cost'=>$category[$i]+=$category[$i]=$this->getAllExpenses()->where('category_id',$category->id)->sum('value'),
            ];*/
        }
       return response()->json(['status_code' => 200, 'working_capital' => $capital]);
    }
    public function getBenefitsAndServicesExpenses()
    {
        $benefits = Expense::where('category_id', 1)->get();
        return response()->json(['benefits' => $benefits], 200);
    }
}