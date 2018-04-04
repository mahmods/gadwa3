<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 24/08/17
 * Time: 01:59 م
 */


namespace App\Http\Controllers;
use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;
    /**
     * @var Product
     */
    protected $product;

    /**
     * StudiesProductController constructor.
     */
    public function __construct()
    {
        $this->productRepository=new ProductRepository();
        $this->product=new Product();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($study_id=null)
    {
        $products=$this->productRepository->getAllProducts($study_id);
        return view('backend.products.all_products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.add_product');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>'required|max:100',
            'price' =>'required|numeric|max:100',
            'production' =>'required|numeric|max:100',
            'sales' =>'required|numeric|max:100',
            'unit_id' =>'required',
            'study_id' =>'required',
            'description'=>'required',
        ]);
        $this->productRepository->postAddProduct($request->all(),$this->product);
        return redirect()->route('getAllProducts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function edit($productId)
    {
        $product=$this->productRepository->getProductById($productId);
        return view('backend.products.product',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        $this->validate($request,[
            'title' =>'required|max:100',
            'price' =>'required|numeric|max:100',
            'production' =>'required|numeric|max:100',
            'sales' =>'required|numeric|max:100',
            'unit_id' =>'required',
            'study_id' =>'required',
            'description'=>'required',
        ]);
        $this->productRepository->updateProduct($productId,(array) $request->all(),$this->product);
        return redirect()->route('getAllProducts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function delete($productId)
    {
        $this->productRepository->deleteProductById($productId);
        return redirect()->route('getAllProducts');
    }
}