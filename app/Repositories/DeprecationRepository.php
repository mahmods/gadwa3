<?php

namespace App\Repositories;

use App\Deprecation;
use Request;

/**
 * Class DeprecationRepository
 * @package App\Repositories
 */
class DeprecationRepository extends BaseRepository
{
    protected $deprecation;

    /**
     * DeprecationRepository constructor.
     */
    public function __construct()
    {
        $this->deprecation = new Deprecation();
    }

    /**
     * @return array of all deprecations
     */
    public function getAllDeprecation()
    {
        if (Request::route()->getName() == "apiGetAllDeprecation") {
            $deprecations = $this->getAllItems($this->deprecation);
            if (count($deprecations) != 0) {
                return response()->json(['status_code' => 200, 'deprecations' => $deprecations]);
            } else {
                return response()->json([
                    'error' => [
                        'message' => 'Not Found',
                        'status_code' => 404
                    ]
                ]);
            }
        }
        return $this->getAllItems($this->deprecation);
    }

    public function postAddDeprecation($data, $deprecation)
    {
        $this->addItem($data, $deprecation);
    }

    public function getDeprecationById($deprecationId)
    {
        return $this->getItemById($deprecationId, $this->deprecation);
    }

    public function updateDeprecation($deprecationId, $data, $deprecation)
    {

        return $this->updateItemById($deprecationId,(array) $data, $deprecation);
    }

    public function deleteDeprecationById($deprecationId)
    {
        $this->deleteItemById($deprecationId, $this->deprecation);
    }

    static public function getAllDeprecationsView()
    {
        return Deprecation::all();
    }

}