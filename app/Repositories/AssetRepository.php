<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 23/08/17
 * Time: 9:23 ص
 */
namespace App\Repositories;
use Request;
use App\Asset;
/**
 * Class AssetRepository
 * @package App\Repositories
 */
class AssetRepository extends BaseRepository
{
    /**
     * @var $asset
     */
    protected $asset;
    /**
     * AssetRepository constructor.
     */
    public function __construct()
    {
        $this->asset = new Asset();
    }

    public function getAllAsset($study_id=NULL)
    {
        if (Request::route()->getName() == "apiGetAllAsset") {
            $assets = $this->getAllItems($this->asset)->where('study_id',$study_id);
            if (count($assets) != 0) {
                return response()->json(['status_code' => 200, 'assets' => $assets]);
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
            return $this->getAllItems($this->asset)->where('study_id',$study_id);

        return $this->getAllItems($this->asset);

    }
    public function postAddAsset($data, $asset=null)
    {
        if (Request::route()->getName() == "apiPostAddAsset") {
            $request = \Illuminate\Http\Request::capture();
            foreach ($request->get('assets') as $row) {
                if (isset($row['id'])) {
                    $obj = Asset::firstOrNew([
                        'id' => $row['id']
                    ]);
                } else {
                    $obj = new Asset();
                }
                if($row['value']) {
                $obj->fill([
                    'title' => $row['title'],
                    'space' => $row['space'],
                    'value' => $row['value'],
                    'count' => $row['count'],
                    'deprecation_id' => $row['deprecation_id'],
                    'study_id' => $request->get('sid')
                ]);
                $obj->save();
                }
            }
            return response()->json(['status_code' => 200]);
        }

        $this->addItem($data, $asset);
    }
    /**
     * @param $assetId
     * @return mixed
     */
    public function getAssetById($assetId)
    {
        return $this->getItemById($assetId, $this->asset);
    }
    /**
     * @param $assetId
     * @param $data
     * @param $asset
     * @return mixed
     */
    public function updateAsset($assetId, $data, $asset)
    {
        return $this->updateItemById($assetId, (array)$data, $asset);
    }
    /**
     * @param $assetId
     */
    public function deleteAssetById($assetId)
    {
        if(Asset::find($assetId))
        {
            $this->deleteItemById($assetId, $this->asset);
        }
        return response()->json(['status_code' => 200]);

    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllAssetView()
    {
        return Asset::all();
    }
}