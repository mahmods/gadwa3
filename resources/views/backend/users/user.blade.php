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
                <a href="{{route('getAllUsers')}}">{{trans('backend.users')}}</a>
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
                    <i class="fa fa-gift"></i>{{trans('backend.updateUser')}}</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    <a href="javascript:;" class="reload"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
            <!-- BEGIN FORM-->
                <form method="post" action="{{route('updateUserById',['userId'=>$user->id])}}">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">{{trans('backend.userRole')}}</label>
                            @php $roles=\App\Repositories\RolesRepository::getAllRolesToUsers() @endphp
                            <select name="role_id" id="single" class="form-control select2">
                                <option value="{{$user->role_id}}">{!! $roles->where('role_id',$user->role_id)->first()['role_name'] !!}</option>
                                @foreach($roles as $i=>$role)
                                    <option value="{{$role->role_id}}">{{trans('backend.'.$role->role_name)}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('role_id'))
                                <span class="help-block">{{$errors->first('role_id')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('backend.name')}}</label>
                            <input name="name" value="{{$user->name}}" type="text" class="form-control"
                                   placeholder="{{trans('backend.name')}}">
                            @if($errors->has('name'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('backend.email')}}</label>
                            <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                <input name="email" value="{{$user->email}}" type="email" class="form-control"
                                       placeholder="{{trans('backend.email')}}" required></div>
                            @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="btn-set pull-left">
                            <button type="submit" class="btn green">{{trans('backend.update')}}</button>
                            <a class="btn blue" href="{{route('getAllUsers')}}">{{trans('backend.cancel')}}</a>
                        </div>
                        <input type="hidden" name="_method" value="PUT">
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
@endsection