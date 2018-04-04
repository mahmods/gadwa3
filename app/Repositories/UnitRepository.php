<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 23/08/17
 * Time: 4:47 م
 */

namespace App\Repositories;
use App\Unit;

/**
 * Class UnitRepository
 * @package App\Repositories
 */
class UnitRepository extends BaseRepository
{
    /**
     * @var $unit
     */
    protected $unit;
    /**
     * UnitRepository constructor.
     */
    public function __construct()
    {
        $this->unit = new Unit();
    }
    /**
     * @return array of all Units
     */
    public function getAllUnites()
    {
        return $this->getAllItems($this->unit);
    }
    /**
     * @param $data
     * @param $unit
     */
    public function postAddUnit($data, $unit)
    {
        $this->addItem($data, $unit);
    }
    /**
     * @param $unitId
     * @return mixed
     */
    public function getUnitById($unitId)
    {
        return $this->getItemById($unitId, $this->unit);
    }
    /**
     * @param $unitId
     * @param $data
     * @param $unit
     * @return mixed
     */
    public function updateUnit($unitId, $data, $unit)
    {

        return $this->updateItemById($unitId, (array)$data, $unit);
    }
    /**
     * @param $unitId
     */
    public function deleteUnitById($unitId)
    {
        $this->deleteItemById($unitId, $this->unit);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllUnitesView()
    {
        return Unit::all();
    }
}