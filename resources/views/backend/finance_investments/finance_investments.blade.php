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
                <a href="{{route('getAllFinanceInvestments')}}">{{trans('finance_investments.finance_investments')}}</a>
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
                    <i class="fa fa-gift"></i>{{trans('finance_investments.update_finance_investments')}}</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    <a href="javascript:;" class="reload"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form method="post"
                      action="{{route('updateFinanceInvestmentById',['finance_investmentsId'=>$financeInvestments->id])}}">
                    {{ csrf_field() }}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="control-label">{{trans('finance_investments.study')}}</label>
                            {{--<input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="{{trans('studies.email')}}" >--}}
                            <select id="study_id" name="study_id" id="single" class="form-control select2">
                                <option value="">{{trans('backend.choose')}}</option>
                                @foreach(\App\Repositories\StudyRepository::getAllStudiesView() as $study)
                                    <option value="{{$study->id}}"
                                            @if($financeInvestments->study_id==$study->id) selected @endif>{{$study->title}}</option>
                                @endforeach

                            </select>
                            @if($errors->has('study_id'))
                                <span class="help-block">{{$errors->first('study_id')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label">{{trans('finance_investments.personal_investment')}}</label>
                            <input name="personal_investment" value="{{$financeInvestments->personal_investment}}"
                                   type="text" class="form-control"
                                   placeholder="{{trans('finance_investments.personal_investment')}}">
                            @if($errors->has('personal_investment'))
                                <span class="help-block">{{$errors->first('personal_investment')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('finance_investments.loan')}}</label>
                            <input name="loan" value="{{$financeInvestments->loan}}" type="text" class="form-control"
                                   placeholder="{{trans('finance_investments.loan')}}">
                            @if($errors->has('loan'))
                                <span class="help-block">{{$errors->first('loan')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('finance_investments.other')}}</label>
                            <input name="other" value="{{$financeInvestments->other}}" type="text" class="form-control"
                                   placeholder="{{trans('finance_investments.other')}}">
                            @if($errors->has('other'))
                                <span class="help-block">{{$errors->first('other')}}</span>
                            @endif
                        </div>


                    </div>
                    <div class="form-actions">
                        <div class="btn-set pull-left">
                            <button type="submit" class="btn green">{{trans('backend.save')}}</button>
                            <a class="btn blue"
                               href="{{route('getAllFinanceInvestments')}}">{{trans('backend.cancel')}}</a>
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