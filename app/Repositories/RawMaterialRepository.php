<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 23/08/17
 * Time: 9:23 ص
 */

namespace App\Repositories;
use Request;
use App\RawMaterial;

/**
 * Class RawMaterialRepository
 * @package App\Repositories
 */
class RawMaterialRepository extends BaseRepository
{
    /**
     * @var RawMaterial
     */
    protected $raw;
    /**
     * RawMaterialRepository constructor.
     */
    public function __construct()
    {
        $this->raw = new RawMaterial();
    }
    /**
     * @return array of all rawMaterials
     */
    public function getAllRawMaterials($study_id=NULL)
    {
        if(Request::route()->getName() == "apiGetAllRawMaterialsByStudy")
        {
            $row_materials=$this->getAllItems($this->raw)->where('study_id',$study_id);
            if (count($row_materials) != 0)
            {
                return response()->json(['status_code' => 200, 'raw_materials' => $row_materials]);
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
            return $this->getAllItems($this->raw)->where('study_id',$study_id);
        return $this->getAllItems($this->raw);
    }
    /**
     * @param $data
     * @param $rawMaterial
     * @return \Illuminate\Http\JsonResponse
     */
    public function postAddRawMaterial($data, $rawMaterial=NULL)
    {
        if (Request::route()->getName() == "apiPostAddRawMaterial") {

            $request = \Illuminate\Http\Request::capture();
            foreach ($request->get('raw_materials') as $row) {
                if(isset($row['id'])) {
                    $obj = RawMaterial::firstOrNew([
                        'id' => $row['id']
                    ]);
                }else{
                    $obj = new RawMaterial();
                }
                $obj->fill([
                    'title' => $row['title'],
                    'production' => $row['production'],
                    'unit_id'=>$row['unit_id'],
                    'price' => $row['price'],
                    'study_id' => $request->get('sid')
                ]);
                $obj->save();
            }
            return response()->json(['status_code' => 200]);
        }
        $this->addItem($data, $rawMaterial);
    }
    /**
     * @param $rawMaterialId
     * @return mixed
     */
    public function getRawMaterialById($rawMaterialId)
    {
        if(Request::route()->getName() == "apiGetRawMaterialById")
        {
            $row_material=$this->getItemById($rawMaterialId, $this->raw);
            if (count($row_material) != 0)
            {
                return response()->json(['status_code' => 200, 'row_materials' => $row_material]);
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
            return $this->getItemById($rawMaterialId, $this->raw);
    }
    /**
     * @param $rawMaterialId
     * @param $data
     * @param $rawMaterial
     * @return mixed
     */
    public function updateRawMaterial($rawMaterialId, $data, $rawMaterial)
    {
        if(Request::route()->getName() == "apiUpdateRawMaterialById")
        {
            $this->updateItemById($rawMaterialId, (array)$data, $rawMaterial);
            return response()->json(['status_code'=>200]);
        }
        return $this->updateItemById($rawMaterialId, (array)$data, $rawMaterial);
    }
    /**
     * @param $rawMaterialId
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteRawMaterialById($rawMaterialId)
    {
        if (RawMaterial::find($rawMaterialId))
        {
            $this->deleteItemById($rawMaterialId, $this->raw);
        }
        return response()->json(['status_code'=>200]);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllRawMaterialsView()
    {
        return RawMaterial::all();
    }
}