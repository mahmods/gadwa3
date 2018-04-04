<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 22/08/17
 * Time: 12:40 م
 */


namespace App\Repositories;
use App\Country;

/**
 * Class CountryRepository
 * @package App\Repositories
 */
class CountryRepository extends BaseRepository
{
    /**
     * @var Country
     */
    protected $country;
    /**
     * CountryRepository constructor.
     */
    public function __construct()
    {
        $this->country = new Country();
    }
    /**
     * @return array of all countrys
     */
    public function getAllCountries()
    {
        return $this->getAllItems($this->country);
    }
    /**
     * @param $data
     * @param $country
     */
    public function postAddCountry($data, $country)
    {
        $this->addItem($data, $country);
    }
    /**
     * @param $countryId
     * @return mixed
     */
    public function getCountryById($countryId)
    {
        return $this->getItemById($countryId, $this->country);
    }
    /**
     * @param $countryId
     * @param $data
     * @param $country
     * @return mixed
     */
    public function updateCountry($countryId, $data, $country)
    {

        return $this->updateItemById($countryId, (array)$data, $country);
    }
    /**
     * @param $countryId
     */
    public function deleteCountryById($countryId)
    {
        $this->deleteItemById($countryId, $this->country);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllCountriesView()
    {
        return Country::all();
    }
}