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
                <a href="{{route('getAllDeprecations')}}">{{trans('constants.deprecations')}}</a>
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
        <div class="portlet box gadwa">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>{{trans('constants.add_deprecation')}}</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    <a href="javascript:;" class="reload"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                {!! Form::open(['class'=>'form-horizontal','name'=>'form','novalidate','method'=>'put','url'=>route('updateDeprecationById',['deprecationId'=>$deprecation->id])]) !!}
                {{--                    <form method="post" action="{{route('updateDeprecationById',['deprecationId'=>$deprecation->id])}}">--}}
                {{ csrf_field() }}
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label">{{trans('backend.name')}}</label>
                        <input name="title" value="{{$deprecation->title}}" type="text" class="form-control"
                               placeholder="{{trans('backend.name')}}">
                        @if($errors->has('title'))
                            <span class="help-block">{{$errors->first('title')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">{{trans('constants.percentage')}}</label>
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                            <input name="percentage" value="{{$deprecation->percentage}}" type="text"
                                   class="form-control" placeholder="{{trans('constants.percentage')}}" required></div>
                        @if($errors->has('percentage'))
                            <span class="help-block">{{$errors->first('percentage')}}</span>
                        @endif
                    </div>

                </div>
                <div class="form-actions">
                    <div class="btn-set pull-left">
                        <button type="submit" class="btn green">{{trans('backend.save')}}</button>
                        <a class="btn blue" href="{{route('getAllDeprecations')}}">{{trans('backend.cancel')}}</a>
                    </div>
                </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
@endsection