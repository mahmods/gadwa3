<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 23/08/17
 * Time: 9:23 ص
 */
namespace App\Repositories;
use Request;
use App\StudiesSector;

/**
 * Class StudiesSectorRepository
 * @package App\Repositories
 */
class StudiesSectorRepository extends BaseRepository
{
    /**
     * @var StudiesSector
     */
    protected $sector;
    /**
     * StudiesSectorRepository constructor.
     */
    public function __construct()
    {
        $this->sector = new StudiesSector();
    }
    /**
     * @return array of all sectors
     */
    public function getAllStudiesSectors($study_id=null)
    {
        if (Request::route()->getName() == "apiGetAllStudiesSectors") {
            $sectors = $this->getAllItems($this->sector)->where('study_id',$study_id);
            if (count($sectors) != 0) {
                return response()->json(['status_code' => 200, 'returnSectors' => $sectors]);
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
            return $this->getAllItems($this->sector)->where('study_id',$study_id);
        return $this->getAllItems($this->sector);
    }

    public function postAddStudiesSector($data, $sector=null)
    {
        //$this->addItem($data, $sector);
        if (Request::route()->getName() == "apiPostAddStudySector") {
            $request=\Illuminate\Http\Request::capture();
            $arraySource1=StudiesSector::select('id','study_id')->where('study_id',$request->get('sid'))->get()->toArray();
            $arraySource2=$request->get('sectors');
            $array1 = array_column($arraySource1,'id');
            $array2 = array_column($arraySource2,'id');
            $ids_to_delete = array_diff($array1, $array2);
            StudiesSector::whereIn('id', $ids_to_delete)->delete();
            foreach($request->get('sectors') as $row){
                if(isset($row['id'])) {
                    $obj = StudiesSector::firstOrNew(['id' => $row['id']]);
                }else{
                    $obj = new StudiesSector();
                }
                //::firstOrNew(['id'=>5]);
                if($row['title']){
                $obj->fill([
                    'title'=>$row['title'],
                    'study_id'=>$request->get('sid')
                    ]);
                $obj->save();
                }
            }
            return response()->json(['status_code' => 200]);
        }
        $this->addItem($data, $sector);
    }
    /**
     * @param $sectorId
     * @return mixed
     */
    public function getStudiesSectorById($sectorId)
    {
        return $this->getItemById($sectorId, $this->sector);
    }
    /**
     * @param $sectorId
     * @param $data
     * @param $sector
     * @return mixed
     */
    public function updateStudiesSector($sectorId, $data, $sector)
    {

        return $this->updateItemById($sectorId, (array)$data, $sector);
    }
    /**
     * @param $sectorId
     */
    public function deleteStudiesSectorById($sectorId)
    {
        $this->deleteItemById($sectorId, $this->sector);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllStudiesSectorsView()
    {
        return StudiesSector::all();
    }
}