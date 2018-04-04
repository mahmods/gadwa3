<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 23/08/17
 * Time: 9:23 ص
 */

namespace App\Repositories;

use Request;
use App\Product;

/**
 * Class ProductRepository
 * @package App\Repositories
 */
class ProductRepository extends BaseRepository
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * ProductRepository constructor.
     */
    public function __construct()
    {
        $this->product = new Product();
    }

    /**
     * @return array of all products
     */
    public function getAllProducts($study_id = null)
    {
        if (Request::route()->getName() == "apiGetAllProducts") {
            $products = $this->getAllItems($this->product)->where('study_id', $study_id);
            if (count($products) != 0) {
                return response()->json(['status_code' => 200, 'products' => $products]);
            } else {
                return response()->json([
                    'error' => [
                        'message' => 'Not Found',
                        'status_code' => 404
                    ]
                ]);
            }
        }
        if ($study_id)
            return $this->getAllItems($this->product)->where('study_id', $study_id);
        return $this->getAllItems($this->product);
    }
    /**
     * @param $data
     * @param $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function postAddProduct($data, $product = NULL)
    {
        if (Request::route()->getName() == "apiPostAddProduct") {
            $request = \Illuminate\Http\Request::capture();
            foreach ($request->get('products') as $row) {
                if(isset($row['id'])) {
                    $obj = Product::firstOrNew([
                        'id' => $row['id']
                    ]);
                }else{
                    $obj = new Product();
                }
                if($row['production']){
                    $obj->fill([
                        'title' => $row['title'],
                        'production' => $row['production'],
                        'unit_id'=>$row['unit_id'],
                        'price' => $row['price'],
                        'study_id' => $request->get('sid')
                    ]);
                    $obj->save();
                }
            }
            return response()->json(['status_code' => 200]);
        }
        $this->addItem($data, $product);
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function getProductById($productId)
    {
        if (Request::route()->getName() == "apiGetProductById") {
            $product = $this->getItemById($productId, $this->product);
            if (count($product) != 0) {
                return response()->json(['status_code' => 200, 'product' => $product]);
            } else {
                return response()->json([
                    'error' => [
                        'message' => 'Not Found',
                        'status_code' => 404
                    ]
                ]);
            }
        }
        return $this->getItemById($productId, $this->product);
    }

    /**
     * @param $productId
     * @param $data
     * @param $product
     * @return mixed
     */
    public function updateProduct($productId, $data, $product)
    {
        if (Request::route()->getName() == "apiUpdateProductById") {
            $this->updateItemById($productId, (array)$data, $product);
            return response()->json(['status_code' => 200]);
        }
        return $this->updateItemById($productId, (array)$data, $product);
    }

    public function deleteProductById($productId)
    {
        if(Product::find($productId))
        {
            $this->deleteItemById($productId, $this->product);
        }

        return response()->json(['status_code' => 200]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllProductsView()
    {
        return Product::all();
    }
}