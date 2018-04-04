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
                <a href="{{route('getAllExpenses')}}">{{trans('expense.expenses')}}</a>
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
                    <i class="fa fa-gift"></i>{{trans('expense.add_expense')}}</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    <a href="javascript:;" class="reload"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form method="post" action="{{route('postAddExpense')}}">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">{{trans('expense.title')}}</label>
                            <input name="title" value="{{old('title')}}" type="text" class="form-control"
                                   placeholder="{{trans('expense.title')}}">
                            @if($errors->has('title'))
                                <span class="help-block">{{$errors->first('title')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('expense.item')}}</label>
                            <input name="item" value="{{old('item')}}" type="text" class="form-control"
                                   placeholder="{{trans('expense.item')}}">
                            @if($errors->has('item'))
                                <span class="help-block">{{$errors->first('item')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('expense.type')}}</label>
                            <input name="type" value="{{old('type')}}" type="text" class="form-control"
                                   placeholder="{{trans('expense.type')}}">
                            @if($errors->has('type'))
                                <span class="help-block">{{$errors->first('type')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('expense.location')}}</label>
                            <input name="location" value="{{old('location')}}" type="text" class="form-control"
                                   placeholder="{{trans('expense.location')}}">
                            @if($errors->has('location'))
                                <span class="help-block">{{$errors->first('location')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label">{{trans('expense.description')}}</label>
                            {{--<input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="{{trans('studies.email')}}" >--}}
                            <textarea name="description" class="form-control"
                                      placeholder="{{trans('expense.description')}}">{{old('description')}}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('expense.value')}}</label>
                            <input name="value" value="{{old('title')}}" type="text" class="form-control"
                                   placeholder="{{trans('expense.value')}}">
                            @if($errors->has('value'))
                                <span class="help-block">{{$errors->first('value')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('expense.space')}}</label>
                            <input name="space" value="{{old('space')}}" type="text" class="form-control"
                                   placeholder="{{trans('expense.space')}}">
                            @if($errors->has('space'))
                                <span class="help-block">{{$errors->first('space')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('expense.count')}}</label>
                            <input name="count" value="{{old('count')}}" type="text" class="form-control"
                                   placeholder="{{trans('expense.count')}}">
                            @if($errors->has('count'))
                                <span class="help-block">{{$errors->first('count')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('expense.select_category')}}</label>
                            <select name="category_id" id="single" class="form-control select2">
                                @foreach(\App\Repositories\ExpenseCategoriesRepository::getAllExpenseCategoriesView() as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('study_id'))
                                <span class="help-block">{{$errors->first('study_id')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('expense.select_study')}}</label>
                            <select name="study_id" id="single" class="form-control select2">
                                @foreach(\App\Repositories\StudyRepository::getAllStudiesView() as $study)
                                    <option value="{{$study->id}}">{{$study->title}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('study_id'))
                                <span class="help-block">{{$errors->first('study_id')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="btn-set pull-left">
                            <button type="submit" class="btn green">{{trans('backend.save')}}</button>
                            <a class="btn blue" href="{{route('getAllExpenses')}}">{{trans('backend.cancel')}}</a>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
@endsection