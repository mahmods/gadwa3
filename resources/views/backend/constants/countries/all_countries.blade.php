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
                <a href="#">{{trans('country.countries')}}</a>
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
            <a class="btn green" href="{{route('getAddCountry')}}"><i class="fa fa-level-down"></i> {{trans('country.add_country')}}
            </a>
        </div>
        <br clear="all">
        <br clear="all">

        <!-- BEGIN EXAMPLE TABLE PORTLET-->

        <div class="portlet box gadwa">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>{{trans('country.all_countries')}}</div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_2">
                    <thead>
                    <tr>
                        <th>{{trans('backend.number')}}</th>
                        <th>{{trans('country.code')}}</th>
                        <th>{{trans('country.title')}}</th>
                        <th>{{trans('backend.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($countries as $i=>$country)
                        <tr class="odd gradeX">
                            <td>{{$i+1}}</td>
                            <td>{{$country->code}}</td>
                            <td>{{$country->title}}</td>
                            <td>
                                <a class="btn btn-outline btn-circle btn-sm purple"
                                   href="{{route('getCountryById',['countryId'=>$country->id])}}">
                                    <i class="fa fa-pencil-square-o"></i>{{trans('backend.Edit')}}
                                </a>
                                <button type="submit" form="form_delete"
                                        class="btn btn-outline btn-circle dark btn-sm black" type="submit">
                                    <i style="color: #3c8dbc" class="fa fa-trash"></i>{{trans('backend.Delete')}}
                                </button>
                                <a class="btn btn-circle btn-info"
                                   href="{{route('getAllCities',['countryId'=>$country->id])}}">
                                    <i class="fa fa-pencil-square-o"></i>{{trans('country.cities')}}
                                </a>

                                <form id="form_delete" class="form-delete-c" method="post"
                                      onsubmit="return confirm('<?php echo trans('backend.confirmDelete')?>')"
                                      action="{{route('deleteCountryById',['countryId'=>$country->id])}}">
                                    {{ csrf_field() }}
                                </form>
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