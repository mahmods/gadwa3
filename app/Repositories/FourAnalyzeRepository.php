<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 23/08/17
 * Time: 9:23 ص
 */

namespace App\Repositories;
use App\FourAnalyze;
use Request;


/**
 * Class FourAnalyzeRepository
 * @package App\Repositories
 */
class FourAnalyzeRepository extends BaseRepository
{
    /**
     * @var FourAnalyze
     */
    protected $fourAnalyze;
    /**
     * FourAnalyzeRepository constructor.
     */
    public function __construct()
    {
        $this->fourAnalyze = new FourAnalyze();
    }
    /**
     * @return array of all fourAnalyzes
     */
    public function getAllFourAnalyzes($study_id=null)
    {
        if(Request::route()->getName() == "apiGetAllFourAnalyzes")
        {
            $fourAnalyzes=$this->getAllItems($this->fourAnalyze)->where('study_id', $study_id);
            if (count($fourAnalyzes) != 0)
            {
                return response()->json(['status_code' => 200, 'fourAnalyzes' => $fourAnalyzes]);
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
            return $this->getAllItems($this->fourAnalyze)->where('study_id', $study_id);

        return $this->getAllItems($this->fourAnalyze);


    }
    /**
     * @param $data
     * @param $fourAnalyze
     */
    public function postAddFourAnalyze($data, $fourAnalyze=null)
    {
        if(Request::route()->getName() == "apiPostAddFourAnalyze")
        {
            //$this->addItem($data, $competitor);
            //return response()->json(['status_code'=>200]);
            $request=\Illuminate\Http\Request::capture();
            $arraySource1=FourAnalyze::where('study_id',$request->get('sid'))->get()->toArray();
            $arraySource2=$request->get('fourAnalyzes');
            $array1 = array_column($arraySource1,'id');
            $array2 = array_column($arraySource2,'id');
            $ids_to_delete = array_diff($array1, $array2);
            FourAnalyze::whereIn('id', $ids_to_delete)->delete();
            foreach($request->get('fourAnalyzes') as $row){
                if(isset($row['id'])) {
                    $obj = FourAnalyze::firstOrNew(['id' => $row['id']]);
                }else{
                    $obj = new FourAnalyze();
                }
                //::firstOrNew(['id'=>5]);
                if ($row['power'] || $row['athreat'] || $row['chance'] || $row['challenge'])
                $obj->fill([
                    'power'=>$row['power'],
                    'athreat'=>$row['athreat'],
                    'chance'=>$row['chance'],
                    'challenge'=>$row['challenge'],
                    'study_id'=>$request->get('sid')
                ]);
                $obj->save();
            }
            return response()->json(['status_code' => 200]);
        }
        $this->addItem($data, $fourAnalyze);
    }
    /**
     * @param $fourAnalyzeId
     * @return mixed
     */
    public function getFourAnalyzeById($fourAnalyzeId)
    {
        return $this->getItemById($fourAnalyzeId, $this->fourAnalyze);
    }
    /**
     * @param $fourAnalyzeId
     * @param $data
     * @param $fourAnalyze
     * @return mixed
     */
    public function updateFourAnalyze($fourAnalyzeId, $data, $fourAnalyze)
    {

        return $this->updateItemById($fourAnalyzeId, (array)$data, $fourAnalyze);
    }
    /**
     * @param $fourAnalyzeId
     */
    public function deleteFourAnalyzeById($fourAnalyzeId)
    {
        $this->deleteItemById($fourAnalyzeId, $this->fourAnalyze);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllFourAnalyzesView()
    {
        return FourAnalyze::all();
    }
}