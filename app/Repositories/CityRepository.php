<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 22/08/17
 * Time: 12:40 م
 */


namespace App\Repositories;
use App\City;

/**
 * Class CityRepository
 * @package App\Repositories
 */
class CityRepository extends BaseRepository
{
    /**
     * @var City
     */
    protected $city;
    /**
     * CityRepository constructor.
     */
    public function __construct()
    {
        $this->city = new City();
    }
    /**
     * @return array of all citys
     */
    public function getAllCities()
    {
        return $this->getAllItems($this->city);
    }
    /**
     * @param $data
     * @param $city
     */
    public function postAddCity($data, $city)
    {
        $this->addItem($data, $city);
    }
    /**
     * @param $cityId
     * @return mixed
     */
    public function getCityById($cityId)
    {
        return $this->getItemById($cityId, $this->city);
    }
    /**
     * @param $cityId
     * @param $data
     * @param $city
     * @return mixed
     */
    public function updateCity($cityId, $data, $city)
    {

        return $this->updateItemById($cityId, (array)$data, $city);
    }
    /**
     * @param $cityId
     */
    public function deleteCityById($cityId)
    {
        $this->deleteItemById($cityId, $this->city);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllCitiesView()
    {
        return City::all();
    }
}