@extends('backend.layouts.main_layout')
@section('content')

@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{url('/home')}}">{{trans('main.header_bar_home')}}</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">{{trans('studies.head')}}</a>
            </li>

        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown"
                        data-hover="dropdown" data-delay="1000" data-close-others="true"> Actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-bell"></i> Action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-shield"></i> Another action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-user"></i> Something else here</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <i class="icon-bag"></i> Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn green" href="{{route('getAddStudy')}}"><i class="fa fa-level-down"></i> {{trans('studies.add_study')}}
            </a>
        </div>
        <br clear="all">
        <br clear="all">

        <!-- BEGIN EXAMPLE TABLE PORTLET-->

        <div class="portlet box gadwa">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>{{trans('studies.all')}}</div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_2">
                    <thead>
                    <tr>
                        <th>{{trans('studies.number')}}</th>
                        <th>{{trans('studies.title')}}</th>
                        <th >{{trans('studies.customer')}}</th>
                        <th>{{trans('studies.phone')}}</th>
                        <th>{{trans('studies.space')}}</th>
                        <th>{{trans('studies.email')}}</th>
                        {{--<th>{{trans('studies.location')}}</th>--}}
                        <th style="width:35%">{{trans('studies.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($studies as $i=>$study)
                        <tr class="odd gradeX">
                            <td>{{$i+1}}</td>
                            <td>{{$study->title}}</td>
                            <td>{{$study->customer->name}}</td>
                            <td>{{$study->phone}}</td>
                            <td>{{$study->space}}</td>
                            <td>{{$study->email}}</td>
                            {{--<td>{{$study->location}}</td>--}}
                            <td style="width:35%">
                                <a class="btn btn-outline btn-circle btn-sm purple"
                                   href="{{route('getStudyById',['studyId'=>$study->id])}}">
                                    <i class="fa fa-pencil-square-o"></i>{{trans('studies.Edit')}}
                                </a>

                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown"
                                            data-hover="dropdown" data-delay="1000" data-close-others="true"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">

                                        <li><a href="{{route('getAllProductsByStudy',['study_id'=>$study->id])}}"><i class="icon-shield"></i>{{trans('studies.products')}}</a></li>
                                        <li><a href="{{route('getAllRawMaterialsByStudy',['study_id'=>$study->id])}}"><i class="icon-shield"></i>{{trans('studies.raw_materials')}}</a></li>
                                        <li><a href="{{route('getAllStudiesSectorsByStudy',['study_id'=>$study->id])}}"><i class="icon-shield"></i>{{trans('studies.sectors')}}</a></li>
                                        <li><a href="{{route('getAllMarketingsByStudy',['study_id'=>$study->id])}}"><i class="icon-shield"></i>{{trans('studies.marketing')}}</a></li>
                                        <li><a href="{{route('getAllCompetitorsByStudy',['study_id'=>$study->id])}}"><i class="icon-shield"></i>{{trans('studies.competitors')}}</a></li>
                                        <li><a href="{{route('getAllAssetsByStudy',['study_id'=>$study->id])}}"><i class="icon-shield"></i>{{trans('studies.assets')}}</a></li>
                                        <li><a href="{{route('getAllIncreaseRatesByStudy',['study_id'=>$study->id])}}"><i class="icon-shield"></i>{{trans('studies.increase_rate')}}</a></li>
                                        <li><a href="{{route('getAllExpensesByStudy',['study_id'=>$study->id])}}"><i class="icon-shield"></i>{{trans('studies.expenses')}}</a></li>
                                        <li><a href="{{route('getAllFinanceInvestmentsByStudy',['study_id'=>$study->id])}}"><i class="icon-shield"></i>{{trans('studies.finance_investments')}}</a></li>

                                        {{--<li class="divider"></li>--}}
                                        {{--<li>--}}
                                            {{--<a href="#">--}}
                                                {{--<i class="icon-bag"></i> Separated link</a>--}}
                                        {{--</li>--}}
                                    </ul>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
@endsection
@section('js')
    <script src="{{ASSETS}}/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="{{ASSETS}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>
    <script src="{{ASSETS}}/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>
@endsection
@section('css')
    <link href="{{ASSETS}}/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ASSETS}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet"
          type="text/css"/>
@endsection