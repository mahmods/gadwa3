<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="A Description Of The Project">
    <meta name="keywords" content="The keywords">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>Gadwa</title>
    <!-- Required CSS Files -->
    <link href="{{ASSETS}}/front/css/tornado-rtl.css" rel="stylesheet">
    <link href="{{ASSETS}}/front/css/animations.css" rel="stylesheet">
    <link href="{{ASSETS}}/front/theme.css" rel="stylesheet">
    
</head>
<body>
<!-- header -->
<!-- // header -->
<!-- page content -->
<htmlpageheader name="page-header">
</htmlpageheader>

<htmlpagefooter name="page-footer">
<img src="{{ASSETS}}/front/img/cover-footer.png" alt="" style="width:100%;"> 
</htmlpagefooter>
<div id="">

    <style>
      
        @page {
	header: page-header;
	footer: page-footer;
}



body {
	font-family: 'examplefont', sans-serif !important;
}
    </style>


    <div class="container page-content">
    <!-- page 0  -->
    <div>
        <h3 style="padding:20px 30px;background:#004b74;color:#FFF;text-align-center"> <span style="border: 5px solid #fff;
;"> دراسة جدوي مشروع {{$study->title}}</span></h3>
        <img src="{{ASSETS}}/front/img/cover.png" alt="" style="width:100%;"> 
    </div>
    <!-- End Page 0 -->

        <!-- Page 1 -->
        <div class=" " style="">
            <div class="row">
                <div class="col-s-5">
                    <h3 class"page-title">{{trans('report.report_content')}}</h3>
                    <ul class="index-list" style="padding:20px;font-size:16px;line-height:48px;">
                        <li>{{trans('report.project_info')}}</li>
                        <li>{{trans('report.market_info')}}</li>
                        <li>{{trans('report.productive_energy')}}</li>
                        <li>{{trans('report.sales')}}</li>
                        <li>{{trans('report.fixed_capital')}}</li>
                        <li>{{trans('report.operation_cost')}}</li>
                        <li>{{trans('report.salaries_and_wadges')}}</li>
                        <li>{{trans('report.investment_and_finance')}}</li>
                        <li>{{trans('report.financial_statements')}}</li>
                        <li>{{trans('report.financial_indicators')}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page 1 -->

        <!-- Page 2 -->
        <div class="output-page page-2">
            <h3 class="page-title">{{trans('report.project_info')}}</h3>

            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td class="icon-td"><img src="{{ASSETS}}/front/img/icon-1.png" alt=""></td>
                        <td class="col-s-4">{{trans('report.project_name')}}</td>
                        <td class="col-s-7">{{$study->title}}</td>
                    </tr>
                    <tr>
                        <td class="icon-td"><img src="{{ASSETS}}/front/img/icon-2.png" alt=""></td>
                        <td class="col-s-4">{{trans('report.project_location')}}</td>
                        <td class="col-s-7">{{$study->location}}</td>
                    </tr>
                    <tr>
                        <td class="icon-td"><img src="{{ASSETS}}/front/img/icon-3.png" alt=""></td>
                        <td class="col-s-4">{{trans('report.project_country')}}</td>
                        <td class="col-s-7">{{$study->country->title}}</td>
                    </tr>
                    <tr>
                        <td class="icon-td"><img src="{{ASSETS}}/front/img/icon-4.png" alt=""></td>
                        <td class="col-s-4">{{trans('report.project_space')}}</td>
                        <td class="col-s-7">{{$study->space}} {{trans('report.area_unit')}}</td>
                    </tr>
                    <tr>
                        <td class="icon-td"><img src="{{ASSETS}}/front/img/icon-5.png" alt=""></td>
                        <td class="col-s-4">{{trans('report.project_sector')}}</td>
                        <td class="col-s-7">{{$study->sector->title}}</td>
                    </tr>
                </table>
            </div>

            <div class="project-desc">
                <h3 style="margin-top:-20px;">{{trans('report.project_description')}}</h3>
                <div class="row row-zCenter">
                    <div class="col-s-9">
                        <p class="project-descrip">{{$study->description}}</p>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="col-s-7">
                    <h3 class="page-title">{{trans('report.project_services_and_products')}}</h3>

                    <ul class="">
                        @foreach($study->products as $i=>$product)
                            <li style="font-size:20px;">{{$product->title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
        </div>
        <!-- End Page 2 -->

        <!-- Page 3 -->
        <div class="output-page page-2">
            <h3 class="page-title">{{trans('report.market_info')}}</h3>

            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tbody>
                    <tr>
                        <td>{{trans('report.sectors_targeted')}}</td>
                    </tr>
                    @foreach($study->studySector as $i=> $sector)
                        <tr>
                            <td class="col-s-6">{{$sector->title}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        
        </div>
        <!-- End Page 3 -->

        <!-- Page 4 -->
        <div class="output-page page-2">
            <h3 class="page-title">{{trans('report.competitors')}}</h3>

            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tbody>
                    <tr>
                        <td class="col-s-6">{{trans('report.competitors_title')}}</td>
                        <td class="col-s-3">{{trans('report.competitors_product')}}</td>
                        <td class="col-s-3">{{trans('report.competitors_place')}}</td>
                    </tr>
                    @foreach($study->competitors as $competitor)
                        <tr>
                            <td class="col-s-6">{{$competitor->title}}</td>
                            <td class="col-s-3"> {{$competitor->product}}</td>
                            <td class="col-s-3">{{$competitor->place}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <h3 class="page-title">{{trans('report.marketing')}}</h3>
            <ul class="ui-tornado seco-list">
                @foreach($study->marketing as $marketing)
                    <li>{{$marketing->title}} </li>
                @endforeach
            </ul>
            
        </div>
        <!-- End Page 4 -->

        <!-- Page 5 -->
        <div class="output-page page-2">
            <h3>{{trans('report.four_analyze')}}</h3>

            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tbody>
                    <tr>
                        <td>{{trans('report.four_analyze_power')}}</td>
                    </tr>
                    @foreach($study->four_analyze as $four_analyze)
                        <tr>
                            @if($four_analyze->power)
                            <td class="col-s-6">{{$four_analyze->power}}</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tbody>
                    <tr>
                        <td>{{trans('report.four_analyze_challenge')}}</td>
                    </tr>
                    @foreach($study->four_analyze as $four_analyze)
                        <tr>
                            @if($four_analyze->challenge)
                                <td>{{$four_analyze->challenge}}</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tbody>
                    <tr>
                        <td>{{trans('report.four_analyze_chance')}}</td>
                    </tr>
                    @foreach($study->four_analyze as $four_analyze)
                    <tr>
                        @if($four_analyze->chance)
                        <td>{{$four_analyze->chance}}</td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tbody>
                    <tr>
                        <td>{{trans('report.four_analyze_athreat')}}</td>
                    </tr>
                    @foreach($study->four_analyze as $four_analyze)
                        <tr>
                            @if($four_analyze->athreat)
                            <td>{{$four_analyze->athreat}}</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <!-- End Page 5 -->

        <!-- Page 6 -->
        <div class="output-page page-2">
            <div class="page-title">{{trans('report.Production_capacity')}}</div>

            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td class="col-s-5 align-center"> {{trans('report.product_title')}}</td>
                        <td class="col-s-3 align-center">{{trans('report.product_unit')}}</td>
                        <td class="col-s-4 align-center">{{trans('report.Annual_operating_capacity')}}</td>
                    </tr>
                    @foreach($study->products as $i=>$product)
                        <tr>
                            <td class="col-s-5">{{$product->title}}</td>
                            <td class="col-s-3 align-center">{{$product->unit->title}}</td>
                            <td class="col-s-3 align-center">{{$product->price*12}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="page-title">{{trans('report.increases_rate')}}</div>
            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td>السنة</td>
                        <td>{{trans('report.increases_rate')}}</td>
                    </tr>
                    @foreach($study->increases_rate as $increases_rate)
                        <tr>
                            <td>{{$increases_rate->years}}</td>
                            <td>{{$increases_rate->percentage}}%</td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
        <!-- End Page 6 -->

        <!-- Page 7 -->
        <div class="output-page page-2">
            <h2 class="icon-title">{{trans('report.sales_count')}}
            </h2>
            <div class="responsive-table">
                <table class="table dark-theme output-table align-center">
                    <tr>
                        <td class="col-s-3">{{trans('report.product_title')}}</td>
                        <td>{{trans('report.product_unit')}}</td>
                        <td>{{trans('report.monthly_operating_capacity')}}</td>
                        <td>{{trans('report.Annual_operating_capacity')}}</td>
                        <td>{{trans('report.average_price')}}</td>
                        <td>{{trans('report.product_value')}}</td>
                    </tr>
                    @foreach($study->products as $i=>$product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->unit_id}}</td>
                            <td>{{number_format($product->production)}}</td>
                            <td>{{number_format($product->production*12)}}</td>
                            <td>{{number_format($product->price)}}</td>
                            <td>{{number_format($product->production*12*$product->price)}}</td>
                        </tr>
                    @endforeach
                </table>
                <table class="table dark-theme output-table align-center">
                    <tr>
                        <td class="col-s-10">{{trans('report.total')}}</td>
                        <td class="col-s-2">
                            @php
                                $sum_products=0;
                                foreach ($study->products as $key=>$product)
                                {
                                    $sum_products+=$product->production*12*$product->price;
                                }
                                echo number_format($sum_products);
                            @endphp
                        </td>
                    </tr>
                </table>
            </div>
            <h2 class="icon-title">{{trans('report.revenue_in_five_years')}}</h2>

            <div class="responsive-table">
                <table class="table dark-theme output-table align-center">
                    <tr>
                        <td class="col-s-3">{{trans('report.expected_revenue')}}</td>
                        @foreach($study->increases_rate as $increases_rate)
                            <td>{{$increases_rate->years}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>{{trans('report.annual_project_load_rate')}}<span
                                    class="small"> {{trans('report.project_growth_rate')}} </span></td>
                        @foreach($study->increases_rate as $increases_rate)
                            <td>{{$increases_rate->percentage}}%</td>
                        @endforeach
                    </tr>
                    @foreach($study->products as $i=>$product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{number_format($product->production*12*$product->price*($study->increases_rate[0]->percentage/100))}}</td>
                            <td>{{number_format($product->production*12*$product->price*($study->increases_rate[1]->percentage/100))}}</td>
                            <td>{{number_format($product->production*12*$product->price*($study->increases_rate[2]->percentage/100))}}</td>
                            <td>{{number_format($product->production*12*$product->price*($study->increases_rate[3]->percentage/100))}}</td>
                            <td>{{number_format($product->production*12*$product->price*($study->increases_rate[4]->percentage/100))}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>{{trans('report.total')}}</td>
                        @php
                            for($i=0;$i<count($study->increases_rate);$i++)
                            {
                                 $sum_rates=0;
                                foreach ($study->products as $key=>$product)
                                {
                                    $sum_rates+=$product->production*12*$product->price*($study->increases_rate[$i]->percentage/100);

                                }
                                echo '<td>'.number_format($sum_rates).'</td>';
                            }
                        @endphp
                    </tr>
                </table>
            </div>
        </div>

        <!-- End Page 7 -->

        <!-- Page 8 -->
        <div class="output-page page-2">
            <h2 class="icon-title2">
                {{trans('report.constructions_and_buildings')}}
            </h2>
            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td class="col-s-4">{{trans('report.constructions_and_buildings_title')}}</td>
                        <td class="col-s-3 align-center">{{trans('report.constructions_and_buildings_space')}}</td>
                        <td class="col-s-2 align-center">{{trans('report.constructions_and_buildings_price')}}</td>
                        <td class="col-s-3 align-center">{{trans('report.constructions_and_buildings_total')}}</td>
                    </tr>
                    @php $constructions_and_buildings_sum=0; @endphp
                    @foreach($study->assets as $asset)
                        @if($asset->deprecation_id==2)
                            <tr>
                                <td class="col-s-4">{{$asset->title}}</td>
                                <td class="col-s-3 align-center">{{number_format($asset->space)}}</td>
                                <td class="col-s-2 align-center">{{number_format($asset->value)}}</td>
                                <td class="col-s-3 align-center">{{number_format($asset->value*$asset->space)}}</td>
                            </tr>
                            @php $constructions_and_buildings_sum+=$asset->value*$asset->space ;@endphp
                        @endif
                    @endforeach
                </table>
                <table class="table dark-theme output-table align-center">
                    <tr>
                        <td class="col-s-10">{{trans('report.constructions_and_buildings_total')}}</td>
                        <td class="col-s-2">{{number_format($constructions_and_buildings_sum)}}</td>
                    </tr>
                </table>
            </div>
            <div class="lands">
                <h2>{{trans('report.lands')}}</h2>
                <div class="responsive-table">
                    <table class="table dark-theme output-table">
                        <tr>
                            <td class="col-s-4">{{trans('report.lands_space')}}</td>
                            <td class="col-s-4 align-center">{{trans('report.lands_price')}}</td>
                            <td class="col-s-4 align-center">{{trans('report.lands_total')}}</td>
                        </tr>
                    @php $lands_sum=0; @endphp
                    @foreach($study->assets as $asset)
                    @if($asset->deprecation_id==1)
                        <tr>
                            <td class="col-s-4">{{number_format($asset->space)}}</td>
                            <td class="col-s-4 align-center">{{number_format($asset->value)}}</td>
                            <td class="col-s-4 align-center">{{number_format($asset->value*$asset->space)}}</td>
                        </tr>
                        @php $lands_sum+=$asset->value*$asset->space ;@endphp
                    @endif
                @endforeach
                    </table>
                </div>
            </div>
        </div>
        <!-- End Page 8 -->

        <!-- Page 9 -->
        <div class="output-page page-2">
            <h2 class="icon-title2">{{trans('report.machine_and_equipment')}}</h2>
            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td class="col-s-4">{{trans('report.machine_and_equipment_requirements')}}</td>
                        <td class="col-s-1 align-center">{{trans('report.count')}}</td>
                        <td class="col-s-2 align-center">{{trans('report.price')}}</td>
                        <td class="col-s-3 align-center">{{trans('report.total_value')}}</td>
                    </tr>
                    @foreach($study->assets->where('deprecation_id',3) as $key=>$equipment)
                        <tr>
                            <td class="col-s-4">{{$equipment->title}}</td>
                            <td class="col-s-1 align-center">{{$equipment->count}}</td>
                            <td class="col-s-2 align-center">{{$equipment->value}}</td>
                            <td class="col-s-3 align-center">{{$equipment->count*$equipment->value}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="col-s-4">{{trans('report.total')}}</td>
                        <td class="col-s-1 align-center">-</td>
                        <td class="col-s-2 align-center">-</td>
                        @php
                            $sum_equipment=0;
                            foreach($study->assets->where('deprecation_id',3) as $key=>$equipment)
                            {
                                $sum_equipment+=$equipment->count*$equipment->value;
                            }
                            echo '<td class="col-s-3 align-center">'.$sum_equipment.'</td>';
                        @endphp
                    </tr>
                </table>
            </div>
            <div class="cars">

            <div class="responsive-table">
                    <table class="table dark-theme output-table">
                        <tr>
                            <td class="col-s-4">{{trans('report.cars')}}</td>
                            <td class="col-s-4 align-center">{{trans('report.total_value')}}</td>
                            <td class="col-s-4 align-center">
                                @php
                                    $sum_cars=0;
                                    foreach ($study->assets->where('deprecation_id',4) as $key=>$car)
                                    {
                                        $sum_cars+=$car->count*$car->value;
                                    }
                                    echo $sum_cars;
                                @endphp
                            </td>
                        </tr>
                    </table>

                    <table class="table dark-theme output-table">
                        @foreach($study->assets->where('deprecation_id',4) as $key=>$car)
                        <tr>
                            <td class="col-s-2">{{$car->title}}</td>
                            <td class="col-s-4 align-center">{{trans('report.value')}} : {{$car->value}}</td>
                            <td class="col-s-4 align-center">{{trans('report.total_value')}} : {{$car->count*$car->value}}</td>
                            <td class="col-s-2 align-center">{{trans('report.count')}}  : {{$car->count}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        
        </div>
        <!-- End Page 9 -->

        <!-- Page 10 -->
        <div class="output-page page-2">
            {{--<div class="circle-head">--}}
            {{--<h2>{{trans('report.rate_of_reserve_of_high_prices')}}</h2>--}}
            {{--<h2>=</h2>--}}
            {{--<h2>5 % </h2>--}}
            {{--</div>--}}
            <h2 class="icon-title">{{trans('report.furniture_and_fittings')}}
            </h2>
            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td class="col-s-4">{{trans('report.furniture_and_fittings')}}</td>
                        <td class="col-s-2 align-center">{{trans('report.count')}}</td>
                        <td class="col-s-2 align-center">{{trans('report.value')}}</td>
                        <td class="col-s-4 align-center">{{trans('report.total_value')}}</td>
                    </tr>
                    @foreach($study->assets->where('deprecation_id',6) as $key=>$furniture)
                        <tr>
                            <td class="col-s-4">{{$furniture->title}}</td>
                            <td class="col-s-2 align-center">{{$furniture->count}}</td>
                            <td class="col-s-2 align-center">{{$furniture->value}}</td>
                            <td class="col-s-4 align-center">{{$furniture->count*$furniture->value}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="col-s-4">{{trans('report.total_cost')}}</td>
                        <td class="col-s-2 align-center"></td>
                        <td class="col-s-2 align-center"></td>
                        @php
                            $sum_furniture=0;
                            foreach ($study->assets->where('deprecation_id',6) as $key=>$furniture)
                            {
                                $sum_furniture+=$furniture->count*$furniture->value;
                            }
                            echo '<td class="col-s-4 align-center">'.$sum_furniture.'</td>';
                        @endphp
                    </tr>
                </table>
            </div>
        </div>
        <!-- End Page 10 -->

        <!-- Page 11 -->
        <div class="output-page page-2">
            <h3 class="page-title2">{{trans('report.pre_operating_expenses')}}</h3>
            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    @php $pre_operating_sum=0; @endphp
                    @foreach($study->assets->where('deprecation_id',5) as $key=>$pre_operating)
                    <tr>
                        <td class="col-s-4">{{$pre_operating->title}}</td>
                        <td class="col-s-4 align-center">{{$pre_operating->value}}</td>
                    </tr>
                    @php $pre_operating_sum+=$pre_operating->value; @endphp
                    @endforeach
                    <tr>
                        <td class="col-s-4">{{trans('report.total_pre_operating_expenses')}}</td>
                        <td class="col-s-4 align-center">{{ $study->assets->where('deprecation_id',5)->sum('value') }}</td>
                    </tr>
                </table>
            </div>

            <h2 class="icon-title">{{trans('report.annual_depreciation_and_amortization')}}</h2>
            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td class="col-s-4">{{trans('report.annual_depreciation_and_amortization')}}</td>
                        <td class="col-s-3 align-center">{{trans('report.original_value')}}</td>
                        <td class="col-s-2 align-center">{{trans('report.depreciation_rate')}}</td>
                        <td class="col-s-3 align-center">{{trans('report.total_value')}}</td>
                    </tr>
                    @foreach($deprecations as $key=>$deprecation)
                        <tr>
                            <td class="col-s-4">{{$deprecation->title}}</td>
                            <td class="col-s-3 align-center">{{$deprecation->assets->sum('value')}}</td>
                            <td class="col-s-2 align-center">{{$deprecation->percentage}}%</td>
                            <td class="col-s-3 align-center">{{$deprecation->assets->sum('value')*($deprecation->percentage/100)}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        @php
                            $sum_assets_original_value=0;
                            $sum_assets_deprecation=0;
                            foreach ($deprecations as $key=>$deprecation)
                            {
                                $sum_assets_original_value+=$deprecation->assets->sum('value');
                                $sum_assets_deprecation+=$deprecation->assets->sum('value')*($deprecation->percentage/100);
                            }
                        @endphp
                        <td class="col-s-4">{{trans('report.deprecation_sum')}}</td>
                        <td class="col-s-3 align-center">{{$sum_assets_original_value}}</td>
                        <td class="col-s-2 align-center"></td>
                        <td class="col-s-3 align-center">{{$sum_assets_deprecation}}</td>
                    </tr>
                </table>
            </div>
            
        </div>
        <!-- End Page 11 -->

        <!-- Page 12 -->
        <div class="output-page page-2">
            <h3 class="icon-title">{{trans('report.fixed_capital')}}
            </h3>
            <!-- راس المال الثابت  <canvas id="mony-charts"></canvas> -->
            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td>تكاليف الارض</td>
                        <td>5464654646</td>
                    </tr>
                </table>
            </div>

            <h3 class="icon-title">{{trans('report.operation_cost')}}</h3>
            <h3 class="page-title"> {{trans('report.operating_requirements')}} </h3>
            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td>{{trans('report.product_title')}}</td>
                        <td class="align-center">{{trans('report.product_unit')}}</td>
                        <td class="align-center">{{trans('report.monthly_operating_capacity')}}</td>
                        <td class="align-center">{{trans('report.annual_project_load_rate')}}</td>
                        <td class="align-center">{{trans('report.price')}}</td>
                        <td class="align-center">{{trans('report.value')}}</td>
                    </tr>
                    @foreach($study->rawMaterials as $key=>$raw_material)
                        <tr>
                            <td>{{$raw_material->title}}</td>
                            <td class="align-center">{{$raw_material->unit->title}}</td>
                            <td class="align-center">{{$raw_material->production}}</td>
                            <td class="align-center">{{$raw_material->production*12}}</td>
                            <td class="align-center">{{$raw_material->price}}</td>
                            <td class="align-center">{{$raw_material->production*12*$raw_material->price}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>{{trans('report.total')}}</td>
                        <td class="align-center"></td>
                        <td class="align-center">-</td>
                        <td class="align-center">-</td>
                        <td class="align-center">-</td>
                        @php
                            $sum_raw_materials_annual=0;
                            $sum_raw_materials_monthly=0;
                            foreach($study->rawMaterials as $key=>$raw_material)
                            {
                               $sum_raw_materials_annual+=$raw_material->production*12*$raw_material->price;
                               $sum_raw_materials_monthly+=$raw_material->production*$raw_material->price;
                            }
                            echo '<td class="align-center">'.$sum_raw_materials_annual.'</td>';
                        @endphp
                    </tr>
                </table>
            </div>
            
        </div>
        <!-- End Page 12 -->

        <!-- Page 13 -->
        <div class="output-page page-2">
            <h3 class="icon-title">{{trans('report.costs_of_utilities_and_services')}}</h3>
            <!-- تكاليف المنافع والخدمات  <canvas id="services-charts"></canvas> -->
            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td>تكاليف المنافع والخدمات </td>
                        <td>5464654646</td>
                    </tr>
                </table>
            </div>
            
            @php
                $sum_annual_utilities_and_services_expense=0;
                foreach($study->expenses->where('category_id',1) as $key=>$utilities_and_services_expense)
                {
                    $sum_annual_utilities_and_services_expense+=($utilities_and_services_expense->value*12);
                }
            @endphp
            <h3 class="icon-title">تكاليف التشغيل</h3>
            <h3 class="page-title">{{trans('report.administrative_and_general_expenses')}} </h3>
            
            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td>{{trans('report.type')}}</td>
                        <td class="align-center">{{trans('report.expected_monthly_cost')}}</td>
                        <td class="align-center">{{trans('report.expected_annual_cost')}}</td>
                    </tr>
                    @foreach($study->expenses->where('category_id',2) as $key=>$general_expense)
                        @if($general_expense->type)
                            <tr>
                                <td> {{$general_expense->type}}</td>
                                <td class="align-center">{{$general_expense->value}}</td>
                                <td class="align-center">{{$general_expense->value*12}}</td>
                            </tr>
                        @endif
                    @endforeach
                    <tr>
                        <td>{{trans('report.sum_general_expenses')}}</td>
                        @php
                            $sum_annual_general_expense=0;
                            $sum_monthly_general_expense=0;
                            foreach($study->expenses->where('category_id',2) as $key=>$general_expense)
                            {
                                $sum_annual_general_expense+=($general_expense->value*12);
                                $sum_monthly_general_expense+=$general_expense->value;
                            }
                            echo '<td class="align-center">'.$sum_monthly_general_expense.'</td>';
                            echo '<td class="align-center">'.$sum_annual_general_expense.'</td>';
                        @endphp
                    </tr>
                </table>
            </div>
        
        </div>
        <!-- End Page 13 -->

        <!-- Page 14 -->
        <div class="output-page page-2">
            <h3 class="page-title">{{trans('report.marketing_costs')}}</h3>

            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td>{{trans('report.marketing_costs_type')}}</td>
                        <td class="align-center">{{trans('report.expected_monthly_marketing_cost')}}</td>
                        <td class="align-center"> {{trans('report.expected_annual_marketing_cost')}}</td>
                    </tr>
                    @foreach($study->expenses->where('category_id',3) as $key=>$marketing_expense)
                        @if($general_expense->type)
                            <tr>
                                <td> {{$marketing_expense->type}}</td>
                                <td class="align-center">{{$marketing_expense->value}}</td>
                                <td class="align-center">{{$marketing_expense->value*12}}</td>
                            </tr>
                        @endif
                    @endforeach
                    <tr>
                        <td>{{trans('report.sum_marketing_expenses')}}</td>
                        @php
                            $sum_annual_marketing_expense=0;
                            $sum_monthly_marketing_expense=0;
                            foreach($study->expenses->where('category_id',3) as $key=>$marketing_expense)
                            {
                                $sum_annual_marketing_expense+=$marketing_expense->value*12;
                                $sum_monthly_marketing_expense+=$marketing_expense->value;
                            }

                            echo '<td class="align-center">'.$sum_monthly_marketing_expense.'</td>';
                            echo '<td class="align-center">'.$sum_annual_marketing_expense.'</td>';
                        @endphp
                    </tr>
                </table>
            </div>
            <div class="lands">
                <h2> {{trans('report.rent')}}</h2>

                <div class="responsive-table">
                    <table class="table dark-theme output-table">
                        <tr>
                            <td>{{trans('report.rent_location')}}</td>
                            <td>{{trans('report.rent_space')}}</td>
                            <td class="align-center">{{trans('report.monthly_rent')}}</td>
                            <td class="align-center">{{trans('report.annual_rent')}} </td>
                        </tr>
                        @foreach($study->expenses->where('category_id',4) as $key=>$rent)
                        <tr>
                            <td>{{$rent->location}}</td>
                            <td>{{$rent->space}}</td>
                            <td class="align-center">{{$rent->value}}</td>
                            <td class="align-center"> {{$rent->value*12}}</td>
                        </tr>
                        @endforeach
                        @php
                            $sum_rent_annual=0;
                            foreach ($study->expenses->where('category_id',4) as $key=>$rent)
                            {
                                $sum_rent_annual+=$rent->value*12;
                            }
                        @endphp
                    </table>
                </div>
            </div>
        
        </div>
        <!-- End Page 14 -->

        <!-- Page 15 -->
        <!-- End Page 15 -->

        <!-- Page 16 -->
        <div class="output-page page-2">
            <h3 class="page-title">{{trans('report.salaries_and_wages')}}</h3>
            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td>{{trans('report.salaries_type')}}</td>
                        <td class="align-center">{{trans('report.salaries_count')}}</td>
                        <td class="align-center">{{trans('report.monthly_salary')}}</td>
                        <td class="align-center">{{trans('report.total_monthly_salary')}}</td>
                        <td class="align-center">{{trans('report.total_annual_salary')}}</td>
                    </tr>
                    @foreach($study->expenses->where('category_id',5) as $key=>$salary)
                        @if($salary->item)
                            <tr>
                                <td>{{$salary->item}}</td>
                                <td class="align-center">{{$salary->count}}</td>
                                <td class="align-center">{{$salary->value}}</td>
                                <td class="align-center">{{$salary->value*$salary->count}}</td>
                                <td class="align-center">{{$salary->value*$salary->count*12}}</td>
                            </tr>
                        @endif
                    @endforeach
                    <tr>
                        <td>{{trans('report.salaries_sum')}}</td>
                        <td class="align-center">{{$study->expenses->where('category_id',5)->sum('count')}}</td>
                        <td class="align-center">{{$study->expenses->where('category_id',5)->sum('value')}}</td>
                        @php
                            $total_sum_monthly_salary=0;
                            $total_sum_annual_salary=0;
                            foreach($study->expenses->where('category_id',5) as $key=>$salary)
                            {
                                $total_sum_monthly_salary+=$salary->value*$salary->count;
                                $total_sum_annual_salary+=$salary->value*$salary->count*12;
                            }
                        echo '<td class="align-center">'.$total_sum_monthly_salary.'</td>';
                        echo '<td class="align-center">'.$total_sum_annual_salary.'</td>';
                        @endphp
                    </tr>
                </table>
            </div>
            
        </div>
        <!-- End Page 16 -->

        <!-- Page 17 -->
        {{--<div class="output-page page-2">--}}
        {{--<h3 class="icon-title"><img src="{{ASSETS}}/front/img/icon-24.png" alt=""> راس المال الثابت </h3>--}}
        {{--<canvas id="mony-charts2"></canvas>--}}

        {{--<h3 class="ras-title">مدة رأس المال العامل</h3>--}}
        {{--<h3 class="ras-date">راس المال العامل <span>شهرا </span></h3>--}}
        {{--</div>--}}
        <!-- End Page 17 -->

        <!-- Page 18 -->
        <div class="output-page page-2">
            <h3 class="page-title">{{trans('report.working_capital')}}</h3>

            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td>{{trans('report.wages_and_salaries_of_operating_value')}}</td>
                        <td>{{$total_sum_annual_salary}}</td>
                        <td class="align-center">{{trans('report.working_capital_for_month')}}</td>
                        <td class="align-center">{{($total_sum_annual_salary*$study->working_capital_months)/12}}</td>
                    </tr>
                    <tr>
                        <td>{{trans('report.total_cost_of_operating_materials_value')}}</td>
                        <td>{{$sum_raw_materials_annual}}</td>
                        <td class="align-center">{{trans('report.working_capital_for_month')}}</td>
                        <td class="align-center">{{($sum_raw_materials_annual*$study->working_capital_months)/12}}</td>
                    </tr>
                    <tr>
                        <td>تكاليف المنافع والخدمات القيمه</td>
                        <td>{{$sum_annual_utilities_and_services_expense}}</td>
                        <td class="align-center">{{trans('report.working_capital_for_month')}}</td>
                        <td class="align-center">{{($sum_annual_utilities_and_services_expense*$study->working_capital_months)/12}}</td>
                    </tr>
                    <tr>
                        <td>{{trans('report.general_expenses_value')}}</td>
                        <td>{{$sum_annual_general_expense}}</td>
                        <td class="align-center">{{trans('report.working_capital_for_month')}}</td>
                        <td class="align-center">{{($sum_annual_general_expense*$study->working_capital_months)/12}}</td>
                    </tr>
                    <tr>
                        <td>{{trans('report.marketing_expenses_value')}}</td>
                        <td>{{$sum_annual_marketing_expense}}</td>
                        <td class="align-center">{{trans('report.working_capital_for_month')}}</td>
                        <td class="align-center">{{($sum_annual_marketing_expense*$study->working_capital_months)/12}}</td>
                    </tr>
                    <tr>
                        <td>{{trans('report.rent_expenses_value')}}</td>
                        <td>{{$sum_rent_annual}}</td>
                        <td class="align-center">{{trans('report.working_capital_for_month')}}</td>
                        <td class="align-center">{{($sum_rent_annual*$study->working_capital_months)/12}}</td>
                    </tr>
                    @php
                        $fixed_capital=$constructions_and_buildings_sum+
                                        $lands_sum+
                                        $sum_equipment+
                                        $sum_cars+
                                        $sum_furniture+
                                        $pre_operating_sum;
                        $working_capital=(
                                        $sum_annual_utilities_and_services_expense+
                                        $total_sum_annual_salary+
                                        $sum_annual_general_expense+
                                        $sum_annual_marketing_expense+
                                        $sum_rent_annual+
                                        $sum_raw_materials_annual
                                        );

                        $final_working_capital=$working_capital*($study->working_capital_months/12);
                    @endphp
                    <tr>
                        <td>{{trans('report.total_value')}}</td>
                        <td>{{$working_capital}}</td>
                        <td class="align-center">{{trans('report.working_capital_for_month')}}</td>
                        <td class="align-center">{{$working_capital*($study->working_capital_months/12)}}</td>
                    </tr>
                </table>
            </div>
        
        </div>
        <!-- End Page 18 -->

        <!-- Page 19 -->

        <div class="output-page page-2">
            <h3 class="page-title">اجمالي الاستثمار</h3>
            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td>رأس المال الثابت</td>
                        <td>{{number_format($fixed_capital)}}</td>
                    </tr>
                    <tr>
                        <td>رأس المال العامل</td>
                        <td>{{number_format($working_capital*($study->working_capital_months/12))}}</td>
                    </tr>
                    <tr>
                        <td>رأس المال المستثمر</td>
                        <td>{{number_format($fixed_capital+($working_capital*($study->working_capital_months/12))) }}</td>
                    </tr>
                </table>
            </div>

            @if($study->financeInvestments)
            <h3 class="page-title">{{trans('report.financeInvestments')}}</h3>

            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td>{{trans('report.financeInvestments_personal_investment')}}</td>
                        <td>{{$study->financeInvestments->personal_investment}}%</td>
                    </tr>
                    <tr>
                        <td>{{trans('report.financeInvestments_loan')}}</td>
                        <td>{{$study->financeInvestments->loan}}%</td>
                    </tr>
                    <tr>
                        <td>{{trans('report.financeInvestments_other')}}</td>
                        <td>{{$study->financeInvestments->other}}%</td>
                    </tr>
                </table>
            </div>
            @endif
        </div>
        <!-- End Page 19 -->

        <!-- Page 20 -->
        <div class="output-page page-2">
            <h3 class="icon-title">الجداول والقوائم المالية للمشروع</h3>
            <h3 class="page-title">قائمة الدخل التقديرية للمشروع</h3>
            <div class="responsive-table">
                <table class="table dark-theme output-table">
                    <tr>
                        <td>قائمه الدخل</td>
                        @foreach($study->increases_rate as $increases_rate)
                            <td>{{$increases_rate->years}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>الايرادات السنويه</td>
                        @php
                            for($i=0;$i<count($study->increases_rate);$i++)
                            {
                                 $sum_rates=0;
                                foreach ($study->products as $key=>$product)
                                {
                                    $sum_rates+=$product->production*12*$product->price*($study->increases_rate[$i]->percentage/100);
                                }
                                echo '<td>'.number_format($sum_rates).'</td>';
                                $profits[]=$sum_rates;
                            }
                        @endphp
                    </tr>
                </table>
                <h3 class="table-title">التكاليف المتغيره والثابته للمشروع</h3>
                <table class="table dark-theme output-table">
                    <tr>
                        <td>إجمالي تكلفة مستلزمات التشغيل</td>
                        @if($study->increases_rate)
                        @foreach($study->increases_rate as $key=>$increase)
                            <td class="align-center">{{number_format($sum_raw_materials_annual*($increase->percentage/100))}}</td>
                        @endforeach
                        @endif
                    </tr>
                    @php $all_expenses_sum=0; @endphp
                    @if($expenses_categories)
                    @foreach($expenses_categories as $key=>$category)
                        @php
                            $expense_sum=0;
                            foreach($study->expenses->where('category_id',$category->id) as $key=>$expense)
                            {
                                $expense_sum+=$expense->value*12;
                            }
                            $all_expenses_sum+=$expense_sum;
                        @endphp
                        <tr>
                            <td>{{$category->title}}</td>
                            @foreach($study->increases_rate as $i=>$increase)
                                <td class="align-center">{{number_format($expense_sum*($increase->percentage/100))}}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    @endif

                    <tr>
                        <td>{{trans('report.total_variable_costs')}}</td>
                        @foreach($study->increases_rate as $key=>$increase)
                            <td class="align-center">{{number_format(($all_expenses_sum+$sum_raw_materials_annual)*($increase->percentage/100))}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>{{trans('report.gross_profit')}}</td>
                        @foreach($study->increases_rate as $key=>$increase)
                            <td class="align-center">{{number_format(($profits[$key])-($all_expenses_sum+$sum_raw_materials_annual)*($increase->percentage/100))}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>{{trans('report.annual_depreciation_and_amortization')}}</td>
                        @foreach($study->increases_rate as $key=>$increase)
                            <td class="align-center">{{number_format($sum_assets_deprecation*($increase->percentage/100))}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>{{trans('report.total_expenses')}}</td>
                        @foreach($study->increases_rate as $key=>$increase)
                            <td class="align-center">{{number_format(($all_expenses_sum+$sum_assets_deprecation+$sum_raw_materials_annual)*($increase->percentage/100))}}</td>
                            @php
                                $final_expenses[]=($all_expenses_sum+$sum_assets_deprecation+$sum_raw_materials_annual)*($increase->percentage/100);
                            @endphp
                        @endforeach
                    </tr>
                    <tr>
                        <td>{{trans('report.net_profit')}}</td>
                        @foreach($study->increases_rate as $key=>$increase)
                            <td class="align-center">{{number_format($profits[$key]-$final_expenses[$key])}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>{{trans('report.cumulative_profits_for_the_last_year')}}</td>
                        @foreach($study->increases_rate as $key=>$increase)
                            <td class="align-center">{{number_format($profits[$key]-$final_expenses[$key])}}</td>
                        @endforeach
                    </tr>
                </table>
            </div>
           
        </div>

        <!-- End Page 20 -->

        <!-- Page 21 -->
        @php
            $owner_capital_0=($final_working_capital+$fixed_capital)*($study->financeInvestments->personal_investment/100);
            if($study->financeInvestments->loan){
                $amount_of_loan=($fixed_capital+$final_working_capital)*
                                    ($study->financeInvestments->loan/100);
                $amount_of_profit=(($final_working_capital+$fixed_capital)
                                    *($study->financeInvestments->loan/100))/7;
                $long_commitments_0[0]=(($fixed_capital+$final_working_capital)*
                                     ($study->financeInvestments->loan/100))+($amount_of_profit);
                $long_commitments_0[1]=(($fixed_capital+$final_working_capital)*
                                    ($study->financeInvestments->loan/100))+($amount_of_profit);

                $total_final_value_of_loan_0=$amount_of_loan-$amount_of_profit;

                for($i=2;$i<count($study->increases_rate);$i++)
                {
                    $long_commitments_0[]=$total_final_value_of_loan_0+$amount_of_profit;
                    $total_final_value_of_loan_0-=$amount_of_profit;
                }
            }
        @endphp
        @php $total_deprecation_sums_0=$deprecation_sums_0=0;
    foreach ($study->assets as $key=>$deprecation_asset)
    {
        switch ($deprecation_asset->deprecation_id) {
            case 1:
            $deprecation_sums_0+=$deprecation_asset->space*$deprecation_asset->value;
            break;
            case 2:
            $deprecation_sums_0+=$deprecation_asset->space*$deprecation_asset->value;
            break;
            case 3:
            $deprecation_sums_0+=$deprecation_asset->count*$deprecation_asset->value;
            break;
            case 4:
            $deprecation_sums_0+=$deprecation_asset->count*$deprecation_asset->value;
            break;
            case 5:
            $deprecation_sums_0+=$deprecation_asset->value;
            break;
            case 6:
            $deprecation_sums_0+=$deprecation_asset->count*$deprecation_asset->value;
            break;
            default:
            $deprecation_sums_0=0;
        }
    }
    $total_deprecation_sums_0+=$deprecation_sums_0;
        @endphp
        <div class="output-page page-2">
            <h3 class="icon-title">قائمة المركز المالي للمشروع</h3>
            <div class="responsive-table">
                <h3 class="table-title2">الاصول المتدوله</h3>
                <table class="table dark-theme output-table">
                    <tr>
                        <td>النقد</td>
                        @foreach($study->increases_rate as $key=>$increase)
                            <td class="align-center">{{number_format(
                    (($profits[$key]-$final_expenses[$key])+
                    $owner_capital_0+
                    (isset($long_commitments_0)? $long_commitments_0[$key]:0))
                    -
                    ($total_deprecation_sums_0*($increase->percentage/100))

                    )}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>اجمالى الاصول المتدوله</td>
                        @foreach($study->increases_rate as $key=>$increase)
                            <td class="align-center">{{number_format(
                    (($profits[$key]-$final_expenses[$key])+
                    $owner_capital_0+
                    (isset($long_commitments_0)? $long_commitments_0[$key]:0))
                    -
                    ($total_deprecation_sums_0*($increase->percentage/100))
                    )}}</td>
                        @endforeach
                    </tr>
                </table>
                <h3 class="table-title2">الاصول طويله الاجل</h3>
                <table class="table dark-theme output-table">
                    @php $total_deprecation_sums=0; @endphp
                    @foreach($deprecations as $key=>$deprecation)
                        <tr>
                            <td>{{$deprecation->title}}</td>
                            @php
                                $deprecation_sums=0;
                                foreach ($study->assets->where('deprecation_id',$deprecation->id) as $key=>$deprecation_asset)
                                {
                                    switch ($deprecation->id) {
                                        case 1:
                                        $deprecation_sums+=$deprecation_asset->space*$deprecation_asset->value;
                                        break;
                                        case 2:
                                        $deprecation_sums+=$deprecation_asset->space*$deprecation_asset->value;
                                        break;
                                        case 3:
                                        $deprecation_sums+=$deprecation_asset->count*$deprecation_asset->value;
                                        break;
                                        case 4:
                                        $deprecation_sums+=$deprecation_asset->count*$deprecation_asset->value;
                                        break;
                                        case 5:
                                        $deprecation_sums+=$deprecation_asset->value;
                                        break;
                                        case 6:
                                        $deprecation_sums+=$deprecation_asset->count*$deprecation_asset->value;
                                        break;
                                        default:
                                        $deprecation_sums=0;
                                    }
                                }
                                $total_deprecation_sums+=$deprecation_sums;
                            @endphp
                            @foreach($study->increases_rate as $increase)
                                <td class="align-center">{{number_format($deprecation_sums*($increase->percentage/100))}}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    <tr>
                        <td>اجمالى الاصول الثابته</td>
                        @foreach($study->increases_rate as $increase)
                            <td class="align-center">{{number_format($total_deprecation_sums*($increase->percentage/100))}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>مجموع الموجودات</td>
                        @foreach($study->increases_rate as $key=>$increase)
                            <td class="align-center">{{number_format(
                    (($profits[$key]-$final_expenses[$key])+
                    $owner_capital_0+
                    (isset($long_commitments_0)? $long_commitments_0[$key]:0))
                    )}}</td>
                        @endforeach
                    </tr>
                </table>
                @if($study->financeInvestments->loan)
                    <h3 class="table-title2">الالتزامات قصيره الاجل</h3>
                    <table class="table dark-theme output-table">
                        <tr>
                            <td>اقساط القرض</td>
                            <td> -</td>
                            <td> -</td>
                            @php
                                for($i=2;$i<count($study->increases_rate);$i++)
                                {
                                    echo '<td class="align-center">'
                                        .number_format(
                                        (($final_working_capital+$fixed_capital)
                                        *($study->financeInvestments->loan/100))
                                        /7
                                        ).
                                    '</td>';
                                }
                            @endphp
                        </tr>
                        <tr>
                            <td>مجموع الالتزامات قصيره الاجل</td>
                            <td> -</td>
                            <td> -</td>
                            @php
                                for($i=2;$i<count($study->increases_rate);$i++)
                                {
                                    echo '<td class="align-center">'
                                        .number_format(
                                        (($final_working_capital+$fixed_capital)
                                        *($study->financeInvestments->loan/100))
                                        /7
                                        ).
                                    '</td>';
                                }
                            @endphp
                        </tr>
                    </table>
                    <h3 class="table-title2">الالتزامات طويله الاجل</h3>
                    <table class="table dark-theme output-table">
                        <tr>
                            <td>قروض طويلة الاجل</td>
                            <td>{{number_format(($fixed_capital+$final_working_capital)*
                            ($study->financeInvestments->loan/100))}}</td>
                            <td>{{number_format(($fixed_capital+$final_working_capital)*
                            ($study->financeInvestments->loan/100))}}</td>
                            @php
                                $final_value_of_loan=$amount_of_loan-$amount_of_profit;
                                for($i=2;$i<count($study->increases_rate);$i++)
                                {
                                    echo '<td class="align-center">'.
                                    number_format($final_value_of_loan)
                                    .'</td>';
                                    $final_value_of_loan-=$amount_of_profit;
                                }
                            @endphp
                        </tr>
                        <tr>
                            <td>مجموع الالتزامات طويله الاجل</td>
                            <td>{{number_format((($fixed_capital+$final_working_capital)*
                            ($study->financeInvestments->loan/100))+($amount_of_profit))}}</td>
                            <td>{{number_format((($fixed_capital+$final_working_capital)*
                            ($study->financeInvestments->loan/100))+($amount_of_profit))}}</td>
                            @php

                                $long_commitments[0]=(($fixed_capital+$final_working_capital)*
                                ($study->financeInvestments->loan/100))+($amount_of_profit);
                                $long_commitments[1]=(($fixed_capital+$final_working_capital)*
                                ($study->financeInvestments->loan/100))+($amount_of_profit);

                                    $total_final_value_of_loan=$amount_of_loan-$amount_of_profit;
                                    for($i=2;$i<count($study->increases_rate);$i++)
                                    {
                                        echo '<td class="align-center">'.
                                            number_format($total_final_value_of_loan+$amount_of_profit)
                                            .'</td>';
                                        $long_commitments[]=$total_final_value_of_loan+$amount_of_profit;

                                        $total_final_value_of_loan-=$amount_of_profit;
                                    }
                            @endphp
                        </tr>
                    </table>
                @endif
                <h3 class="table-title2">حقوق الملكية</h3>
                <table class="table dark-theme output-table">
                    <tr>
                        <td>راس مال اصحاب المشروع</td>
                        @foreach($study->increases_rate as $increase)
                            <td class="align-center">{{number_format(($final_working_capital+$fixed_capital)*($study->financeInvestments->personal_investment/100))}}</td>
                            @php $capital_owners[]=($final_working_capital+$fixed_capital)*($study->financeInvestments->personal_investment/100); @endphp
                        @endforeach
                    </tr>
                    <tr>
                        <td>الارباح المجمعه</td>
                        @foreach($study->increases_rate as $key=>$increase)
                            <td class="align-center">{{number_format($profits[$key]-$final_expenses[$key])}}</td>
                            @php $cumulative_profits[]=($profits[$key]-$final_expenses[$key]); @endphp
                        @endforeach
                    </tr>
                    <tr>
                        <td>مجموع حقوق الملكيه</td>
                        @foreach($study->increases_rate as $key=>$increase)
                            <td class="align-center">{{number_format($capital_owners[$key]+$cumulative_profits[$key])}}</td>
                            @php $property_rights[]=$capital_owners[$key]+$cumulative_profits[$key] @endphp
                        @endforeach
                    </tr>
                    <tr>
                        <td>مجموع المطلوبات</td>
                        @foreach($study->increases_rate as $key=>$increase)
                            <td class="align-center">{{number_format($property_rights[$key]+(isset($long_commitments[$key])? $long_commitments[$key]:0))}}</td>
                        @endforeach
                    </tr>
                </table>
            </div>
           
        </div>
        <!-- End Page 21 -->

        <!-- Page 22 -->
        @include('front.pages.page_22')
        <!-- End Page 22 -->

        <!-- Page 23 -->
        @include('front.pages.page_23')
        <!-- End Page 23 -->
    </div>
</div>

<!-- // page content -->
<!-- footer -->
<footer>
 

<!-- Required JS Files -->
@include('front.includes.js')
@yield('js')
<script type="text/javascript" src="{{MAIN}}/js/app.js"></script>
</body>
</html>