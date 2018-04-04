<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 23/08/17
 * Time: 9:23 ص
 */

namespace App\Repositories;
use App\Marketing;
use Request;


/**
 * Class MarketingRepository
 * @package App\Repositories
 */
class MarketingRepository extends BaseRepository
{
    /**
     * @var Marketing
     */
    protected $marketing;
    /**
     * MarketingRepository constructor.
     */
    public function __construct()
    {
        $this->marketing = new Marketing();
    }
    /**
     * @return array of all marketings
     */
    public function getAllMarketings($study_id=null)
    {
        if(Request::route()->getName() == "apiGetAllMarketings")
        {
            $marketings=$this->getAllItems($this->marketing)->where('study_id', $study_id);
            if (count($marketings) != 0)
            {
                return response()->json(['status_code' => 200, 'marketings' => $marketings]);
            }else
            {
                return response()->json([
                    'error' => [
                        'message' => 'Not Found',
                        'status_code' => 404
                    ]
                ]);
            }
        }

        if($study_id)
            return $this->getAllItems($this->marketing)->where('study_id', $study_id);

        return $this->getAllItems($this->marketing);


    }
    /**
     * @param $data
     * @param $marketing
     */
    public function postAddMarketing($data, $marketing=null)
    {
        if(Request::route()->getName() == "apiPostAddMarketing")
        {
            //$this->addItem($data, $competitor);
            //return response()->json(['status_code'=>200]);
            $request=\Illuminate\Http\Request::capture();
            $arraySource1=Marketing::where('study_id',$request->get('sid'))->get()->toArray();
            $arraySource2=$request->get('marketings');
            $array1 = array_column($arraySource1,'id');
            $array2 = array_column($arraySource2,'id');
            $ids_to_delete = array_diff($array1, $array2);
            Marketing::whereIn('id', $ids_to_delete)->delete();
            foreach($request->get('marketings') as $row){
                if(isset($row['id'])) {
                    $obj = Marketing::firstOrNew(['id' => $row['id']]);
                }else{
                    $obj = new Marketing();
                }
                //::firstOrNew(['id'=>5]);
                if ($row['title']){
                    $obj->fill([
                        'title'=>$row['title'],
                        'study_id'=>$request->get('sid')
                    ]);
                    $obj->save();
                }

            }
            return response()->json(['status_code' => 200]);
        }
        $this->addItem($data, $marketing);
    }
    /**
     * @param $marketingId
     * @return mixed
     */
    public function getMarketingById($marketingId)
    {
        return $this->getItemById($marketingId, $this->marketing);
    }
    /**
     * @param $marketingId
     * @param $data
     * @param $marketing
     * @return mixed
     */
    public function updateMarketing($marketingId, $data, $marketing)
    {

        return $this->updateItemById($marketingId, (array)$data, $marketing);
    }
    /**
     * @param $marketingId
     */
    public function deleteMarketingById($marketingId)
    {
        $this->deleteItemById($marketingId, $this->marketing);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllMarketingsView()
    {
        return Marketing::all();
    }
}