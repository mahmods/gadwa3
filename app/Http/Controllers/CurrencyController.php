<?php
namespace App\Http\Controllers;
use App\Currency;
use App\Repositories\CurrencyRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/**
 * Class CurrencyController
 * @package App\Http\Controllers
 */
class CurrencyController extends Controller
{
    /**
     * @var CurrencyRepository
     */
    protected $currencyRepository;
    /**
     * @var $currency
     */
    protected $currency;
    /**
     * CurrencyController constructor.
     */
    public function __construct()
    {
        $this->currencyRepository=new CurrencyRepository();
        $this->currency=new Currency();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies=$this->currencyRepository->getAllCurrencies();
        return view('backend.constants.currencies.all_currencies',compact('currencies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.constants.currencies.add_currency');
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
            'symbol' =>'required|max:255',
            'code'=>'required',
            'rate'=>'required|Between:0,1000',
        ]);
        $this->currencyRepository->postAddCurrency($request->all(),$this->currency);
        return redirect()->route('getAllCurrencies');
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
     * @param  int  $CurrencyId
     * @return \Illuminate\Http\Response
     */
    public function edit($CurrencyId)
    {
        $currency=$this->currencyRepository->getCurrencyById($CurrencyId);
        return view('backend.constants.currencies.currency',compact('currency'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $currencyId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $currencyId)
    {
        $this->validate($request,[
            'symbol' =>'required|max:255',
            'code'=>'required',
            'rate'=>'required',
        ]);
        $this->currencyRepository->updateCurrency($currencyId,(array) $request->all(),$this->currency);
        return redirect()->route('getAllCurrencies');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $CurrencyId
     * @return \Illuminate\Http\Response
     */
    public function delete($CurrencyId)
    {
        $this->currencyRepository->deleteCurrencyById($CurrencyId);
        return redirect()->route('getAllCurrencies');
    }
}