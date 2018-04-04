<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 23/08/17
 * Time: 02:51 م
 */


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\City;

class AjaxController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCities(Request $request)
    {
        //return view('backend.layouts.main_layout');
        $data=City::where('country_id',$request->get('id'))->get();
        echo "<option value=''>".trans('backend.choose')."</option>";
        if($data){
            foreach($data as $row){
                ($request->get('cityId')==$row->id)? $select='selected': $select='';
                echo "<option value='$row->id' $select>$row->title</option>";
            }
        }

    }
}