<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 23/08/17
 * Time: 9:23 ص
 */

namespace App\Repositories;

use App\Currency;

/**
 * Class CurrencyRepository
 * @package App\Repositories
 */
class CurrencyRepository extends BaseRepository
{
    /**
     * @var Currency
     */
    protected $currency;

    /**
     * CurrencyRepository constructor.
     */
    public function __construct()
    {
        $this->currency = new Currency();
    }

    /**
     * @return array of all Currencies
     */
    public function getAllCurrencies()
    {
        return $this->getAllItems($this->currency);
    }

    /**
     * @param $data
     * @param $currency
     */
    public function postAddCurrency($data, $currency)
    {
        $this->addItem($data, $currency);
    }

    /**
     * @param $currencyId
     * @return mixed
     */
    public function getCurrencyById($currencyId)
    {
        return $this->getItemById($currencyId, $this->currency);
    }

    /**
     * @param $currencyId
     * @param $data
     * @param $currency
     * @return mixed
     */
    public function updateCurrency($currencyId, $data, $currency)
    {

        return $this->updateItemById($currencyId, (array)$data, $currency);
    }

    /**
     * @param $currencyId
     */
    public function deleteCurrencyById($currencyId)
    {
        $this->deleteItemById($currencyId, $this->currency);
    }

    static public function getAllCurrenciesView()
    {
        return Currency::all();
    }

}