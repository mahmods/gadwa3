<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 27/08/17
 * Time: 5:27 م
 */

namespace App\Repositories;
use App\ExpenseCategories;

/**
 * Class ExpenseCategoriesRepository
 * @package App\Repositories
 */
class ExpenseCategoriesRepository extends BaseRepository
{
    /**
     * @var ExpenseCategories
     */
    protected $expenseCategories;
    /**
     * ExpenseCategoriesRepository constructor.
     */
    public function __construct()
    {
        $this->expenseCategories = new ExpenseCategories();
    }
    /**
     * @return array of all ExpenseCategories
     */
    public function getAllExpenseCategories()
    {
        return $this->getAllItems($this->expenseCategories);
    }
    /**
     * @param $data
     * @param $expenseCategories
     */
    public function postAddExpenseCategories($data, $expenseCategories)
    {
        $this->addItem($data, $expenseCategories);
    }
    /**
     * @param $expenseCategoriesId
     * @return mixed
     */
    public function getExpenseCategoriesById($expenseCategoriesId)
    {
        return $this->getItemById($expenseCategoriesId, $this->expenseCategories);
    }
    /**
     * @param $expenseCategoriesId
     * @param $data
     * @param $expenseCategories
     * @return mixed
     */
    public function updateExpenseCategories($expenseCategoriesId, $data, $expenseCategories)
    {
        return $this->updateItemById($expenseCategoriesId, (array)$data, $expenseCategories);
    }
    /**
     * @param $expenseCategoriesId
     */
    public function deleteExpenseCategoriesById($expenseCategoriesId)
    {
        $this->deleteItemById($expenseCategoriesId, $this->expenseCategories);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllExpenseCategoriesView()
    {
        return ExpenseCategories::all();
    }
}