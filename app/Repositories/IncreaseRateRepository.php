<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 28/08/17
 * Time: 13:16 م
 */

namespace App\Repositories;
use App\IncreaseRate;
use Request;

/**
 * Class IncreaseRateRepository
 * @package App\Repositories
 */
class IncreaseRateRepository extends BaseRepository
{
    /**
     * @var $increaseRate
     */
    protected $increaseRate;
    /**
     * IncreaseRateRepository constructor.
     */
    public function __construct()
    {
        $this->increaseRate = new IncreaseRate();
    }
    /**
     * @return array of all IncreaseRates
     */
    public function getAllIncreaseRates($study_id= NULL)
    {
        if (Request::route()->getName() == "apiGetAllIncreaseRates") {
            $increase_rates = $this->getAllItems($this->increaseRate)->where('study_id', $study_id);;
            if (count($increase_rates) != 0) {
                return response()->json(['status_code' => 200, 'increase_rates' => $increase_rates]);
            } else {
                return response()->json([
                    'error' => [
                        'message' => 'Not Found',
                        'status_code' => 404
                    ]
                ]);
            }
        }
        return $this->getAllItems($this->increaseRate);

    }

    public function postAddIncreaseRate($data, $increaseRate=NULL)
    {
        if (Request::route()->getName() == "apiPostAddIncreaseRate") {
            $request = \Illuminate\Http\Request::capture();
            foreach ($request->get('increase_rates') as $row) {
                if(isset($row['id'])) {
                    $obj = IncreaseRate::firstOrNew([
                        'id' => $row['id']
                    ]);
                }else{
                    $obj = new IncreaseRate();
                }
                $obj->fill([
                    'years' => $row['years'],
                    'percentage' => (double)$row['percentage'],
                    'study_id' => $request->get('sid')
                ]);
                $obj->save();
            }
            return response()->json(['status_code' => 200]);
        }
        $this->addItem($data, $increaseRate);
    }
    /**
     * @param $increaseRateId
     * @return mixed
     */
    public function getIncreaseRateById($increaseRateId)
    {
        return $this->getItemById($increaseRateId, $this->increaseRate);
    }
    /**
     * @param $increaseRateId
     * @param $data
     * @param $increaseRate
     * @return mixed
     */
    public function updateIncreaseRate($increaseRateId, $data, $increaseRate)
    {

        return $this->updateItemById($increaseRateId, (array)$data, $increaseRate);
    }
    /**
     * @param $increaseRateId
     */
    public function deleteIncreaseRateById($increaseRateId)
    {
        $this->deleteItemById($increaseRateId, $this->increaseRate);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllIncreaseRatesView()
    {
        return IncreaseRate::all();
    }
}