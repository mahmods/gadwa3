<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 12/09/17
 * Time: 10:23 ص
 */


namespace App\Http\Controllers;
use App\Repositories\ContentRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use PDF;
use PDF2;
use App\ArabicEncode\Arabic;

class IndexController extends Controller
{
    /**
     * HomeController constructor.
     */
    protected $contentRepository;
    public function __construct()
    {
        $this->contentRepository=new ContentRepository();
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=$this->contentRepository->getAllContentsByContentType('slider');
        $steps=$this->contentRepository->getAllContentsByContentType('steps');
        return view('front.layouts.index',compact('sliders','steps'));
    }

    public function pdfview(Request $request)
    {

        //$items = DB::table("items")->get();

        //view()->share('items',$items);


        if($request->has('download')){

            //require_once( __DIR__ . "../../../I18N/Arabic/Glyphs.php");‎
            //$text="اهلا وسهلا";
            //‎$Arabic = new I18N_Arabic_Glyphs('Glyphs');‎




            $Arabic = new Arabic('Glyphs');

            $text = 'بسم الله الرحمن الرحيم';
            $text = $Arabic->utf8Glyphs($text);

            die($text);

            /*PDF::setOptions([
                "defaultMediaType"=>"screen",
                //'defaultFont' => 'sans-serif',
                "defaultPaperSize"=>"a4"
                ]);


            $pdf = PDF::loadHTML('');
            //$pdf = PDF::loadView('front/pdf/step1');

            return $pdf->stream('pdfview.pdf');*/

        }


        return view('front/pdf/step1');

    }
    public function pdfview2(Request $request)
    {

        /*$html = view('front/pdf/step1',['dataloop'=>''])->render(); // file render
        //$html .= '<style>@media print { '.file_get_contents(ASSETS.'/front/theme.css').' }</style>';
        //$html .= '<style>@media print { '.file_get_contents(ASSETS.'/front/css/tornado-rtl.css').' }</style>';
        $html .= "<style>
                    @media print {

                    
                    }
                  </style>";
        // or pure html
        //$html = '<h1>مرحبا بكم فى العالم </h1>';
        $pdfarr = [
            'title'=>'اهلا بكم ',
            'data'=>$html, // render file blade with content html
            'header'=>['show'=>false], // header content
            'footer'=>['show'=>false], // Footer content
            'font'=>'aealarabiya', //  dejavusans, aefurat ,aealarabiya ,times
            'font-size'=>12, // font-size
            'text'=>'', //Write
            'rtl'=>true, //true or false
            'creator'=>'phpanonymous', // creator file - you can remove this key
            'keywords'=>'phpanonymous keywords', // keywords file - you can remove this key
            'subject'=>'phpanonymous subject', // subject file - you can remove this key
            'filename'=>'phpanonymous.pdf', // filename example - invoice.pdf
            'display'=>'stream', // stream , download , print
        ];

        PDF2::HTML($pdfarr);*/




    }
    function Preg($text){

        preg_match_all('/./us', $text, $ar);
        $text = join('',array_reverse($ar[0]));
        $text = preg_replace_callback('/\d+-\d+|\d+|\d+\.\d+|\S+@\S+/', function (array $m) { return strrev($m[0]); }, $text);
        return $text;
    }
}