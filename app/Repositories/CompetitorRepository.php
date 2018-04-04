<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 23/08/17
 * Time: 9:23 ص
 */
namespace App\Repositories;
use Request;
use App\Competitor;
/**
 * Class CompetitorRepository
 * @package App\Repositories
 */
class CompetitorRepository extends BaseRepository
{
    /**
     * @var Competitor
     */
    protected $competitor;
    /**
     * CompetitorRepository constructor.
     */
    public function __construct()
    {
        $this->competitor = new Competitor();
    }
    /**
     * @return array of all competitors
     */
    public function getAllCompetitors($study_id=null)
    {
        if(Request::route()->getName() == "apiGetAllCompetitors")
        {
            $competitors=$this->getAllItems($this->competitor)->where('study_id', $study_id);
            if (count($competitors) != 0)
            {
                return response()->json(['status_code' => 200, 'competitors' => $competitors]);
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
            return $this->getAllItems($this->competitor)->where('study_id', $study_id);
        return $this->getAllItems($this->competitor);
    }
    /**
     * @param $data
     * @param $competitor
     * @return \Illuminate\Http\JsonResponse
     */
    public function postAddCompetitor($data, $competitor=null)
    {
        if(Request::route()->getName() == "apiPostAddCompetitor")
        {
            //$this->addItem($data, $competitor);
            //return response()->json(['status_code'=>200]);
            $request=\Illuminate\Http\Request::capture();
            $arraySource1=Competitor::where('study_id',$request->get('sid'))->get()->toArray();
            $arraySource2=$request->get('competitors');
            $array1 = array_column($arraySource1,'id');
            $array2 = array_column($arraySource2,'id');
            $ids_to_delete = array_diff($array1, $array2);
            Competitor::whereIn('id', $ids_to_delete)->delete();
            foreach($request->get('competitors') as $row){
                if(isset($row['id'])) {
                    $obj = Competitor::firstOrNew(['id' => $row['id']]);
                }else{
                    $obj = new Competitor();
                }
                //::firstOrNew(['id'=>5]);
                if($row['title']) {
                    $obj->fill([
                        'title'=>$row['title'],
                        'product'=>$row['product'],
                        'place'=>$row['place'],
                        'study_id'=>$request->get('sid')
                    ]);
                    $obj->save();
                }

            }
            return response()->json(['status_code' => 200]);
        }
        $this->addItem($data, $competitor);
    }
    /**
     * @param $competitorId
     * @return mixed
     */
    public function getCompetitorById($competitorId)
    {
        if(Request::route()->getName() == "apiGetCompetitorById")
        {
            $competitor=$this->getItemById($competitorId, $this->competitor);
            if (count($competitor) != 0)
            {
                return response()->json(['status_code' => 200, 'competitor' => $competitor]);
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
        return $this->getItemById($competitorId, $this->competitor);
    }
    /**
     * @param $competitorId
     * @param $data
     * @param $competitor
     * @return mixed
     */
    public function updateCompetitor($competitorId, $data, $competitor)
    {
        if(Request::route()->getName() == "apiUpdateCompetitorById")
        {
            $this->updateItemById($competitorId, (array)$data, $competitor);
            return response()->json(['status_code'=>200]);
        }
        return $this->updateItemById($competitorId, (array)$data, $competitor);
    }
    /**
     * @param $competitorId
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCompetitorById($competitorId)
    {
        $this->deleteItemById($competitorId, $this->competitor);
        return response()->json(['status_code'=>200]);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllCompetitorsView()
    {
        return Competitor::all();
    }
}