@extends('front.layouts.front_layout')
@section('content')

    <style>
        .table-title2, .table-title {
            width: 919px;
            margin-right: 1px;
        }
    </style>

    <div class="container page-content">
        <!-- page 0  -->
        <div class="output-page cover">
            <a class="btn btn-primary" href="{{route('genreatePdf',['studyId'=>$study->id])}}">تحميل الدراسه</a>
            <div class="icon"><img src="{{ASSETS}}/front/img/icon-cover.png" alt=""></div>
            <h3>{{trans('report.study_report')}} <br> {{trans('report.for_project')}} {{$study->title}} </h3>
            <h4 class="ti-calendar-io"><span><i>Sunday</i> Date : 28/5/2017</span></h4>
            <h5></h5>
        </div>
        <!-- End Page 0 -->

        <!-- Page 1 -->
        <div class="output-page page-1">
            <div class="row">
                <div class="col-s-5">
                    <h3>{{trans('report.report_content')}}</h3>
                    <ul class="index-list">
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
                <div class="col-s-7">
                    <img src="{{ASSETS}}/front/img/n1.png" alt="" class="fluid">
                </div>
            </div>
            <div class="pdf-footer">
                <span>01</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
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
                <h3>{{trans('report.project_description')}}</h3>
                <div class="row row-zCenter">
                    <div class="col-s-9">
                        <p class="project-descrip">{{$study->description}}</p>
                    </div>
                    <div class="col-s-3"><img src="{{ASSETS}}/front/img/icon-6.png" alt=""></div>
                </div>
            </div>

            <div class="list-area row row-zCenter">
                <div class="col-s-7">
                    <h3 class="main-title">{{trans('report.project_services_and_products')}}</h3>
                    <ul class="services-list">
                        @foreach($study->products as $i=>$product)
                            <li>{{$product->title}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-s-5">
                    <img src="{{ASSETS}}/front/img/icon-7.png" alt="" class="fluid">
                </div>
            </div>
            <div class="pdf-footer">
                <span>02</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
            </div>
        </div>
        <!-- End Page 2 -->

        <!-- Page 3 -->
        <div class="output-page page-2">
            <h3 class="page-title">{{trans('report.market_info')}}</h3>

            <div class="info-graphic-1">
                <h3>{{trans('report.sectors_targeted')}}</h3>
                <ul class="market-infographic">
                    @foreach($study->studySector as $i=> $sector)
                        <li>{{$sector->title}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="pdf-footer">
                <span>03</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
            </div>
        </div>
        <!-- End Page 3 -->

        <!-- Page 4 -->
        <div class="output-page page-2">
            <h3 class="page-title">{{trans('report.competitors')}}</h3>

            <img src="{{ASSETS}}/front/img/icon-9.png" alt="" class="table-icon">
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

            <img src="{{ASSETS}}/front/img/icon-10.png" alt="" class="center-icon">
            <h3 class="page-title">{{trans('report.marketing')}}</h3>
            <ul class="ui-tornado seco-list">
                @foreach($study->marketing as $marketing)
                    <li>{{$marketing->title}} </li>
                @endforeach
            </ul>
            <div class="pdf-footer">
                <span>04</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
            </div>
        </div>
        <!-- End Page 4 -->

        <!-- Page 5 -->
        <div class="output-page page-2">
            <div class="SWOT">
                <div class="row">
                    <div class="title">{{trans('report.four_analyze')}}</div>
                    <div class="col-s-12 col-m-6">
                        <div class="content-box">
                            <h3><img src="{{ASSETS}}/front/img/icon-11.png"
                                     alt="">{{trans('report.four_analyze_power')}}</h3>
                            <ul class="ui-tornado seco-list dark">
                                @foreach($study->four_analyze as $four_analyze)
                                    @if($four_analyze->power)
                                        <li>{{$four_analyze->power}}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-s-12 col-m-6">
                        <div class="content-box">
                            <h3><img src="{{ASSETS}}/front/img/icon-12.png"
                                     alt="">{{trans('report.four_analyze_challenge')}} </h3>
                            <ul class="ui-tornado seco-list dark">
                                @foreach($study->four_analyze as $four_analyze)
                                    @if($four_analyze->challenge)
                                        <li>{{$four_analyze->challenge}}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-s-12 col-m-6">
                        <div class="content-box">
                            <h3><img src="{{ASSETS}}/front/img/icon-13.png"
                                     alt="">{{trans('report.four_analyze_chance')}}  </h3>
                            <ul class="ui-tornado seco-list dark">
                                @foreach($study->four_analyze as $four_analyze)
                                    @if($four_analyze->chance)
                                        <li>{{$four_analyze->chance}}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-s-12 col-m-6">
                        <div class="content-box">
                            <h3><img src="{{ASSETS}}/front/img/icon-14.png"
                                     alt=""> {{trans('report.four_analyze_athreat')}}</h3>
                            <ul class="ui-tornado seco-list dark">
                                @foreach($study->four_analyze as $four_analyze)
                                    @if($four_analyze->athreat)
                                        <li>{{$four_analyze->athreat}}</li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="pdf-footer">
                <span>05</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
            </div>
        </div>
        <!-- End Page 5 -->

        <!-- Page 6 -->
        <div class="output-page page-2">
            <div class="production-title">{{trans('report.Production_capacity')}}</div>

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
            <div class="growing-infographic">
                <div class="title"><img src="{{ASSETS}}/front/img/icon-16.png" alt="">
                    {{trans('report.increases_rate')}}
                </div>
                @foreach($study->increases_rate as $increases_rate)
                    <div class="year"> {{$increases_rate->years}} <span>{{$increases_rate->percentage}}%</span></div>
                @endforeach
            </div>

            <div class="pdf-footer">
                <span>06</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
            </div>
        </div>
        <!-- End Page 6 -->

        <!-- Page 7 -->
        <div class="output-page page-2">
            <h2 class="icon-title"><img src="{{ASSETS}}/front/img/icon-17.png" alt=""> {{trans('report.sales_count')}}
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
            <h2 class="icon-title"><img src="{{ASSETS}}/front/img/icon-18.png"
                                        alt="">{{trans('report.revenue_in_five_years')}}</h2>

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
            <div class="pdf-footer">
                <span>07</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
            </div>
        </div>

        <!-- End Page 7 -->

        <!-- Page 8 -->
        <div class="output-page page-2">
            <h2 class="icon-title2">
                <img src="{{ASSETS}}/front/img/icon-19.png" alt="">{{trans('report.constructions_and_buildings')}}
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
                <img src="{{ASSETS}}/front/img/icon-20.png" alt="">
                <h2>{{trans('report.lands')}}</h2>
                <div class="line"></div>
                @php $lands_sum=0; @endphp
                @foreach($study->assets as $asset)
                    @if($asset->deprecation_id==1)
                        <div class="row">
                            <div class="col-s-4">
                                <h3>{{trans('report.lands_space')}}</h3>
                                <h4>{{number_format($asset->space)}} </h4>
                            </div>
                            <div class="col-s-4">
                                <h3>{{trans('report.lands_price')}}</h3>
                                <h4>{{number_format($asset->value)}}  </h4>
                            </div>
                            <div class="col-s-4">
                                <h3> {{trans('report.lands_total')}}</h3>
                                <h4>{{number_format($asset->value*$asset->space)}} </h4>
                            </div>
                        </div>
                        @php $lands_sum+=$asset->value*$asset->space ;@endphp
                    @endif
                @endforeach
            </div>
            <div class="pdf-footer">
                <span>08</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
            </div>
        </div>
        <!-- End Page 8 -->

        <!-- Page 9 -->
        <div class="output-page page-2">
            <h2 class="icon-title2">
                <img src="{{ASSETS}}/front/img/icon-21.png"
                     alt="{{trans('report.machine_and_equipment')}}">{{trans('report.machine_and_equipment')}}
            </h2>
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
                <div class="totaly">
                    <img src="{{ASSETS}}/front/img/icon-22.png" alt="{{trans('report.cars')}}">
                    <h3>{{trans('report.cars')}}</h3>
                    <h5>{{trans('report.total_value')}}</h5>
                    @php
                        $sum_cars=0;
                        foreach ($study->assets->where('deprecation_id',4) as $key=>$car)
                        {
                            $sum_cars+=$car->count*$car->value;
                        }
                        echo '<h3>'.$sum_cars.'</h3>';
                    @endphp
                </div>
                @foreach($study->assets->where('deprecation_id',4) as $key=>$car)
                    @if($key % 2 ==0 )
                        <div class="right-cars">
                            <div class="numbers">
                                <h3>{{trans('report.count')}}</h3>
                                <h4>{{$car->count}}</h4>
                            </div>
                            <div class="value">
                                <h3>{{$car->title}}</h3>
                                <h3>{{trans('report.value')}}</h3>
                                <h3>{{$car->value}}</h3>
                            </div>
                            <div class="total-value">
                                <h3>{{trans('report.total_value')}}</h3>
                                <h4>{{$car->count*$car->value}}</h4>
                            </div>
                        </div>
                    @else
                        <div class="left-cars">
                            <div class="numbers">
                                <h3>{{trans('report.count')}}</h3>
                                <h4>{{$car->count}}</h4>
                            </div>

                            <div class="value">
                                <h3>{{$car->title}}</h3>
                                <h3>{{trans('report.value')}}</h3>
                                <h3>{{$car->value}}</h3>
                            </div>
                            <div class="total-value">
                                <h3>{{trans('report.total_value')}}</h3>
                                <h4>{{$car->count*$car->value}}</h4>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="pdf-footer">
                <span>09</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
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
            <h2 class="icon-title"><img src="{{ASSETS}}/front/img/icon-23.png"
                                        alt="{{trans('report.furniture_and_fittings')}}">{{trans('report.furniture_and_fittings')}}
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
            <div class="pdf-footer">
                <span>10</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
            </div>
        </div>
        <!-- End Page 10 -->

        <!-- Page 11 -->
        <div class="output-page page-2">
            <h3 class="page-title2">{{trans('report.pre_operating_expenses')}}</h3>
            <ul class="infographic3">
                @php $counter=0;$pre_operating_sum=0; @endphp
                @foreach($study->assets->where('deprecation_id',5) as $key=>$pre_operating)
                    <li><i>{{$counter+1}}</i>
                        <p> {{$pre_operating->title}} <span>{{$pre_operating->value}}</span></p>
                    </li>
                    @php $counter++ @endphp
                    @php $pre_operating_sum+=$pre_operating->value; @endphp
                @endforeach
                <li><i>{{count($study->assets->where('deprecation_id',5))+1}}</i>
                    <p> {{trans('report.total_pre_operating_expenses')}}
                        <span>{{ $study->assets->where('deprecation_id',5)->sum('value') }}</span></p>
                </li>
            </ul>
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
            <div class="pdf-footer">
                <span>11</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png"
                     alt="{{trans('report.annual_depreciation_and_amortization')}}">
            </div>
        </div>
        <!-- End Page 11 -->

        <!-- Page 12 -->
        <div class="output-page page-2">
            <h3 class="icon-title"><img src="{{ASSETS}}/front/img/icon-24.png" alt=""> {{trans('report.fixed_capital')}}
            </h3>
            <canvas id="mony-charts"></canvas>
            <h3 class="icon-title"><img src="{{ASSETS}}/front/img/icon-25.png" alt="">{{trans('report.operation_cost')}}
            </h3>
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
            <div class="pdf-footer">
                <span>12</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="{{trans('report.operating_requirements')}}">
            </div>
        </div>
        <!-- End Page 12 -->

        <!-- Page 13 -->
        <div class="output-page page-2">
            <h3 class="icon-title">{{trans('report.costs_of_utilities_and_services')}}</h3>
            <canvas id="services-charts"></canvas>
            @php
                $sum_annual_utilities_and_services_expense=0;
                foreach($study->expenses->where('category_id',1) as $key=>$utilities_and_services_expense)
                {
                    $sum_annual_utilities_and_services_expense+=($utilities_and_services_expense->value*12);
                }
            @endphp
            <h3 class="icon-title"><img src="{{ASSETS}}/front/img/icon-26.png" alt=""> تكاليف التشغيل</h3>
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
            <div class="pdf-footer">
                <span>13</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png"
                     alt="{{trans('report.administrative_and_general_expenses')}}">
            </div>
        </div>
        <!-- End Page 13 -->

        <!-- Page 14 -->
        <div class="output-page page-2">
            <img src="{{ASSETS}}/front/img/icon-27.png" alt="{{trans('report.marketing_costs')}}" class="table-icon">
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
                <div class="line"></div>
                <div class="row">
                    <div class="col-s-3">
                        <h3>{{trans('report.rent_location')}}</h3>
                    </div>
                    <div class="col-s-3">
                        <h3>{{trans('report.rent_space')}}</h3>
                    </div>
                    <div class="col-s-3">
                        <h3>{{trans('report.monthly_rent')}}</h3>
                    </div>
                    <div class="col-s-3">
                        <h3> {{trans('report.annual_rent')}}</h3>
                    </div>
                </div>
                @foreach($study->expenses->where('category_id',4) as $key=>$rent)
                    <div class="row">
                        <div class="col-s-3">
                            <h4>{{$rent->location}}</h4>
                        </div>
                        <div class="col-s-3">
                            <h4>{{$rent->space}}</h4>
                        </div>
                        <div class="col-s-3">
                            <h4>{{$rent->value}}</h4>
                        </div>
                        <div class="col-s-3">
                            <h4>{{$rent->value*12}} </h4>
                        </div>
                    </div>
                @endforeach
                @php
                    $sum_rent_annual=0;
                    foreach ($study->expenses->where('category_id',4) as $key=>$rent)
                    {
                        $sum_rent_annual+=$rent->value*12;
                    }
                @endphp
            </div>

            <div class="pdf-footer">
                <span>14</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
            </div>
        </div>
        <!-- End Page 14 -->

        <!-- Page 15 -->
        <!-- End Page 15 -->

        <!-- Page 16 -->
        <div class="output-page page-2">
            <img src="{{ASSETS}}/front/img/icon-30.png" alt="{{trans('report.salaries_and_wages')}}" class="icon-block">
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
            <div class="pdf-footer">
                <span>16</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="{{trans('report.salaries_and_wages')}}">
            </div>
        </div>
        <!-- End Page 16 -->

            <!-- Page 17 -->
            {{--<div class="output-page page-2">--}}
            {{--<h3 class="icon-title"><img src="{{ASSETS}}/front/img/icon-24.png" alt=""> راس المال الثابت </h3>--}}
            {{--<canvas id="mony-charts2"></canvas>--}}

            {{--<h3 class="ras-title">مدة رأس المال العامل</h3>--}}
            {{--<h3 class="ras-date">راس المال العامل <span>شهرا </span></h3>--}}

            {{--<div class="pdf-footer">--}}
            {{--<span>17</span>--}}
            {{--<i>www.gadwa.com</i>--}}
            {{--<img src="{{ASSETS}}/front/img/logo-new.png" alt="">--}}
            {{--</div>--}}
            {{--</div>--}}
        <!-- End Page 17 -->

        <!-- Page 18 -->
        <div class="output-page page-2">
            <img src="{{ASSETS}}/front/img/icon-31.png" alt="{{trans('report.working_capital')}}" class="icon-block">
            <h3 class="ras-head">{{trans('report.working_capital')}}</h3>
            <ul class="ras-list">
                <li>
                    <i>1</i>
                    {{trans('report.wages_and_salaries_of_operating_value')}}
                    <span>{{$total_sum_annual_salary}} </span>
                    <div class="boxing">
                        {{trans('report.working_capital_for_month')}}
                        {{($total_sum_annual_salary*$study->working_capital_months)/12}}
                    </div>
                </li>
                <li>
                    <i>2</i>
                    {{trans('report.total_cost_of_operating_materials_value')}}
                    <span>{{$sum_raw_materials_annual}}</span>
                    <div class="boxing">
                        {{trans('report.working_capital_for_month')}}
                        {{($sum_raw_materials_annual*$study->working_capital_months)/12}}
                    </div>
                </li>
                <li>
                    <i>3</i>
                                تكاليف المنافع والخدمات القيمه
                    <span>{{$sum_annual_utilities_and_services_expense}}</span>
                    <div class="boxing">
                        {{trans('report.working_capital_for_month')}}
                        {{($sum_annual_utilities_and_services_expense*$study->working_capital_months)/12}}
                    </div>
                </li>
                <li>
                    <i>4</i>
                    {{trans('report.general_expenses_value')}}
                    <span>{{$sum_annual_general_expense}}</span>
                    <div class="boxing">
                        {{trans('report.working_capital_for_month')}}
                        {{($sum_annual_general_expense*$study->working_capital_months)/12}}
                    </div>
                </li>
                <li>
                    <i>5</i>
                    {{trans('report.marketing_expenses_value')}}
                    <span>{{$sum_annual_marketing_expense}}</span>
                    <div class="boxing">
                        {{trans('report.working_capital_for_month')}}
                        {{($sum_annual_marketing_expense*$study->working_capital_months)/12}}
                    </div>
                </li>
                <li>
                    <i>6</i>
                    {{trans('report.rent_expenses_value')}}
                    <span>{{$sum_rent_annual}}</span>
                    <div class="boxing">
                        {{trans('report.working_capital_for_month')}}
                        {{($sum_rent_annual*$study->working_capital_months)/12}}
                    </div>
                </li>
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
                <li>
                    <i>7</i>
                    {{trans('report.total_value')}}
                    <span>
                        {{
                        $working_capital
                        }}
                    </span>
                    <div class="boxing">
                        {{trans('report.working_capital_for_month')}}
                        {{$working_capital*($study->working_capital_months/12)}}
                    </div>
                </li>
            </ul>
            <div class="pdf-footer">
                <span>18</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
            </div>
        </div>
        <!-- End Page 18 -->

        <!-- Page 19 -->

        <div class="output-page page-2">
            <div class="total-inv">
                <h3 class="icon-title"><img src="{{ASSETS}}/front/img/icon-32.png" alt=""> اجمالي الاستثمار</h3>
                <ul class="infographic4">
                    <li><span>{{number_format($fixed_capital)}} </span> رأس المال الثابت
                    </li>
                    <li><span>
                            {{number_format($working_capital*($study->working_capital_months/12))}}
                        </span> رأس المال العامل
                    </li>
                    <li><span>
                            {{number_format($fixed_capital+($working_capital*($study->working_capital_months/12))) }}
                        </span> رأس المال المستثمر
                    </li>
                </ul>
            </div>
            <ul class="infographic5">
                @if($study->financeInvestments)
                    <li>{{trans('report.financeInvestments')}} <img src="{{ASSETS}}/front/img/icon-33.png" alt=""></li>
                    <li>{{trans('report.financeInvestments_personal_investment')}}<span>{{$study->financeInvestments->personal_investment}}
                            %</span></li>
                    <li> {{trans('report.financeInvestments_loan')}}<span>{{$study->financeInvestments->loan}}%</span>
                    </li>
                    <li>{{trans('report.financeInvestments_other')}} <span>{{$study->financeInvestments->other}}%</span>
                    </li>
                @endif
            </ul>
            <div class="pdf-footer">
                <span>19</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
            </div>
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
            <div class="pdf-footer">
                <span>20</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
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
            <div class="pdf-footer">
                <span>21</span>
                <i>www.gadwa.com</i>
                <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
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
@endsection
@section('js')قائمة التدفقات النقدية التقديرية للمشروع
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="{{ASSETS}}/front/js/output-dom.js"></script>
    <!-- Chart Script for fixed capital in page 12-->
    <script>
        var ctx = document.getElementById('mony-charts').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: [

                    "{{$lands_sum}}تكاليف الارض  ",
                    "{{$constructions_and_buildings_sum}}تكاليف المبانى والانشاءات",
                    "{{$sum_equipment}}تكاليف الالات والمعدات",
                    "{{$sum_cars}} تكاليف السيارات ",
                    "{{$sum_furniture}} تكاليف الاثاث والتجهيزات ",
                    "{{$pre_operating_sum}}مصر,فات التاسيس",
                    "{{$lands_sum+$constructions_and_buildings_sum+$sum_equipment
                    +$sum_cars+$sum_furniture+$pre_operating_sum
                    }}مجموع "

                    ],
                datasets: [{
                    label: "My First dataset",
                    backgroundColor: [
                        '#00aeef',
                        '#036cb6',
                        '#00aeef',
                        '#036cb6',
                        '#00aeef',
                        '#036cb6',
                        '#036cb6'
                    ],
                    borderColor: '#036cb6',
                    borderWidth: 0,
                    data: [
                        {{$lands_sum/($lands_sum+$constructions_and_buildings_sum+$sum_equipment
                        +$sum_cars+$sum_furniture+$pre_operating_sum)*100}},
                        {{$constructions_and_buildings_sum/($lands_sum+$constructions_and_buildings_sum+$sum_equipment
                        +$sum_cars+$sum_furniture+$pre_operating_sum)*100}},
                        {{$sum_equipment/($lands_sum+$constructions_and_buildings_sum+$sum_equipment
                        +$sum_cars+$sum_furniture+$pre_operating_sum)*100}},
                        {{$sum_cars/($lands_sum+$constructions_and_buildings_sum+$sum_equipment
                        +$sum_cars+$sum_furniture+$pre_operating_sum)*100}},
                        {{$sum_furniture/($lands_sum+$constructions_and_buildings_sum+$sum_equipment
                        +$sum_cars+$sum_furniture+$pre_operating_sum)*100}},
                        {{$pre_operating_sum/($lands_sum+$constructions_and_buildings_sum+$sum_equipment
                        +$sum_cars+$sum_furniture+$pre_operating_sum)*100}},
                        100
                    ],
                }]
            },
            // Configuration options go here
            options: {}
        });
    </script>
    <!-- End -->
    <!-- Chart Script for costs of utilities and services  in page 13-->
    <script>
        var the_item = '';
        var the_value = '';
        //var convertedString='';
        $.get('http://localhost/gadwa/api/benefits_and_services_expenses', function (data) {
                data.benefits.map(function (value, key) {
                    the_item += '"' + value.item + '",';
                    the_value += value.value + ',';
                });
                var ctx = document.getElementById('services-charts').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'bar',
                    // The data for our dataset
                    data: {
                        labels: the_item.split(','),
                        datasets: [{
                            label: "التكاليف السنويه",
                            backgroundColor: [
                                '#036cb6',
                                '#00aeef',
                                '#03b679',
                                '#e2c836'
                            ],
                            borderColor: '#036cb6',
                            borderWidth: 0,
                            data: the_value.split(','),
                        }]
                    },
                    // Configuration options go here
                    options: {}
                });
            }
        );
    </script>
    <!--End  -->
    <!-- Chart Script for fixed capital in page 17-->
    <script>
        var ctx = document.getElementById('mony-charts2').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: [
                    "تكاليف الارض  1,000,000 ",
                    "3,425,348 تكاليف المبانى والانشاءات",
                    "3,373,997 تكاليف الالات والمعدات",
                    "480,000 تكاليف السيارات ",
                    "278,750 تكاليف الاثاث والتجهيزات ",
                    "427,905 احتياطى طؤارى 5%",
                    "183,000 مصر,فات التاسيس",
                    "9,169,000 مجموع "
                ],
                datasets: [{
                    label: "My First dataset",
                    backgroundColor: [
                        '#00aeef',
                        '#036cb6',
                        '#00aeef',
                        '#036cb6',
                        '#00aeef',
                        '#036cb6',
                        '#00aeef',
                        '#036cb6'
                    ],
                    borderColor: '#036cb6',
                    borderWidth: 0,
                    data: [
                        56.91,
                        37.36,
                        36.80,
                        55.24,
                        36.04,
                        40.67,
                        25.00,
                        100
                    ],
                }]
            },
            // Configuration options go here
            options: {}
        });
    </script>
    <!-- End -->
@endsection