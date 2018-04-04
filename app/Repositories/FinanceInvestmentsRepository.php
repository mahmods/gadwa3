<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 23/08/17
 * Time: 9:23 ص
 */

namespace App\Repositories;
use App\FinanceInvestments;
use Request;

/**
 * Class FinanceInvestmentsRepository
 * @package App\Repositories
 */
class FinanceInvestmentsRepository extends BaseRepository
{
    /**
     * @var FinanceInvestments
     */
    protected $financeInvestment;
    /**
     * FinanceInvestmentsRepository constructor.
     */
    public function __construct()
    {
        $this->financeInvestment = new FinanceInvestments();
    }
    /**
     * @return array of all financeInvestments
     */
    public function getAllFinanceInvestments($study_id=null)
    {
        if (Request::route()->getName() == "apiGetAllFinanceInvestments") {
            $financeInvestment = $this->getAllItems($this->financeInvestment)->where('study_id',$study_id);
            if (count($financeInvestment) != 0) {
                return response()->json(['status_code' => 200, 'financeInvestment' => $financeInvestment]);
            } else {
                return response()->json([
                    'error' => [
                        'message' => 'Not Found',
                        'status_code' => 404
                    ]
                ]);
            }
        }

        if($study_id)
            return $this->getAllItems($this->financeInvestment)->where('study_id', $study_id);

        return $this->getAllItems($this->financeInvestment);


    }
    /**
     * @param $data
     * @param $financeInvestment
     */
    public function postAddFinanceInvestments($data, $financeInvestment=null)
    {
        if (Request::route()->getName() == "apiPostAddFinanceInvestments") {
            $request=\Illuminate\Http\Request::capture();
            foreach($request->get('financeInvestments') as $row){
                //if($row['personal_investment'] && $row['loan']) {
                    if (isset($row['id'])) {
                        $obj = FinanceInvestments::firstOrNew(['id' => $row['id']]);
                    } else {
                        $obj = new FinanceInvestments();
                    }
                    //::firstOrNew(['id'=>5]);
                    $obj->fill([
                        'personal_investment' => $row['personal_investment'],
                        'loan' => 100-$row['personal_investment'],
                        'study_id'=>$request->get('sid')

                    ]);
                    $obj->save();
                    //dd($obj);
                //}
            }
            return response()->json(['status_code' => 200]);
        }
        $this->addItem($data, $financeInvestment);
    }
    /**
     * @param $financeInvestmentId
     * @return mixed
     */
    public function getFinanceInvestmentsById($financeInvestmentId)
    {
        return $this->getItemById($financeInvestmentId, $this->financeInvestment);
    }
    /**
     * @param $financeInvestmentId
     * @param $data
     * @param $financeInvestment
     * @return mixed
     */
    public function updateFinanceInvestments($financeInvestmentId, $data, $financeInvestment)
    {

        return $this->updateItemById($financeInvestmentId, (array)$data, $financeInvestment);
    }
    /**
     * @param $financeInvestmentId
     */
    public function deleteFinanceInvestmentsById($financeInvestmentId)
    {
        $this->deleteItemById($financeInvestmentId, $this->financeInvestment);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllFinanceInvestmentsView()
    {
        return FinanceInvestments::all();
    }
}