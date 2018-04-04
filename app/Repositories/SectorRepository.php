<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 23/08/17
 * Time: 9:23 ص
 */

namespace App\Repositories;
use App\Sector;

/**
 * Class SectorRepository
 * @package App\Repositories
 */
class SectorRepository extends BaseRepository
{
    /**
     * @var Sector
     */
    protected $sector;
    /**
     * SectorRepository constructor.
     */
    public function __construct()
    {
        $this->sector = new Sector();
    }
    /**
     * @return array of all sectors
     */
    public function getAllSectors()
    {
        return $this->getAllItems($this->sector);
    }
    /**
     * @param $data
     * @param $sector
     */
    public function postAddSector($data, $sector)
    {
        $this->addItem($data, $sector);
    }
    /**
     * @param $sectorId
     * @return mixed
     */
    public function getSectorById($sectorId)
    {
        return $this->getItemById($sectorId, $this->sector);
    }
    /**
     * @param $sectorId
     * @param $data
     * @param $sector
     * @return mixed
     */
    public function updateSector($sectorId, $data, $sector)
    {

        return $this->updateItemById($sectorId, (array)$data, $sector);
    }
    /**
     * @param $sectorId
     */
    public function deleteSectorById($sectorId)
    {
        $this->deleteItemById($sectorId, $this->sector);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllSectorsView()
    {
        return Sector::all();
    }
}