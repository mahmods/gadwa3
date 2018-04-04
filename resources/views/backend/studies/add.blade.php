@extends('backend.layouts.main_layout')
@section('content')
    @php $locale=LaravelLocalization::getCurrentLocale() @endphp

@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{url('/home')}}">{{trans('main.header_bar_home')}}</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{route('getAllStudies')}}">{{trans('studies.head')}}</a>
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
                    <i class="fa fa-gift"></i>{{trans('studies.add_study')}}</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    <a href="javascript:;" class="reload"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->

                <form method="post" action="{{route('postAddStudy')}}">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">{{trans('studies.title')}}</label>
                            <input name="name" value="{{old('name')}}" type="text" class="form-control"
                                   placeholder="{{trans('studies.title')}}">
                            @if($errors->has('name'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('studies.phone')}}</label>
                            <input name="phone" value="{{old('phone')}}" type="number" class="form-control"
                                   placeholder="{{trans('studies.phone')}}">
                            @if($errors->has('phone'))
                                <span class="help-block">{{$errors->first('phone')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('studies.space')}}</label>
                            <input name="space" value="{{old('space')}}" type="number" class="form-control"
                                   placeholder="{{trans('studies.space')}}">
                            @if($errors->has('space'))
                                <span class="help-block">{{$errors->first('space')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('studies.email')}}</label>
                            <input name="email" value="{{old('email')}}" type="text" class="form-control"
                                   placeholder="{{trans('studies.email')}}">
                            @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('studies.location')}}</label>
                            {{--<input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="{{trans('studies.email')}}" >--}}
                            <textarea name="location" class="form-control"
                                      placeholder="{{trans('studies.location')}}"></textarea>
                            @if($errors->has('location'))
                                <span class="help-block">{{$errors->first('location')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('studies.description')}}</label>
                            {{--<input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="{{trans('studies.email')}}" >--}}
                            <textarea name="description" class="form-control"
                                      placeholder="{{trans('studies.description')}}"></textarea>
                            @if($errors->has('description'))
                                <span class="help-block">{{$errors->first('description')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label">{{trans('studies.customer')}}</label>
                            {{--<input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="{{trans('studies.email')}}" >--}}
                            <select name="user_id" id="single" class="form-control select2">
                                <option value="">{{trans('backend.choose')}}</option>
                                @foreach(\App\Repositories\UserRepository::getAllUsersView() as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach

                            </select>
                            @if($errors->has('user_id'))
                                <span class="help-block">{{$errors->first('user_id')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label">{{trans('studies.sector')}}</label>
                            {{--<input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="{{trans('studies.email')}}" >--}}
                            <select name="sector_id" id="single" class="form-control select2">
                                <option value="">{{trans('backend.choose')}}</option>
                                @foreach(\App\Repositories\SectorRepository::getAllSectorsView() as $sector)
                                    <option value="{{$sector->id}}">{{$sector->title}}</option>
                                @endforeach

                            </select>
                            @if($errors->has('sector_id'))
                                <span class="help-block">{{$errors->first('sector_id')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label">{{trans('studies.currency')}}</label>
                            {{--<input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="{{trans('studies.email')}}" >--}}
                            <select name="currency_id" id="single" class="form-control select2">
                                <option value="">{{trans('backend.choose')}}</option>
                                @foreach(\App\Repositories\CurrencyRepository::getAllCurrenciesView() as $currency)
                                    <option value="{{$currency->id}}">{{$currency->code}}</option>
                                @endforeach

                            </select>
                            @if($errors->has('currency_id'))
                                <span class="help-block">{{$errors->first('currency_id')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label">{{trans('studies.country')}}</label>
                            {{--<input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="{{trans('studies.email')}}" >--}}
                            <select id="country_id" name="country_id" id="single" class="form-control select2">
                                <option value="">{{trans('backend.choose')}}</option>
                                @foreach(\App\Repositories\CountryRepository::getAllCountriesView() as $country)
                                    <option value="{{$country->id}}">{{$country->title}}</option>
                                @endforeach

                            </select>
                            @if($errors->has('country_id'))
                                <span class="help-block">{{$errors->first('country_id')}}</span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label class="control-label">{{trans('studies.city')}}</label>
                            {{--<input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="{{trans('studies.email')}}" >--}}
                            <select id="city_id" name="city_id" id="single" class="form-control select2">
                                <option value="">{{trans('backend.choose')}}</option>


                            </select>
                            @if($errors->has('city_id'))
                                <span class="help-block">{{$errors->first('city_id')}}</span>
                            @endif
                        </div>


                    </div>
                    <div class="form-actions">
                        <div class="btn-set pull-left">
                            <button type="submit" class="btn green">{{trans('backend.save')}}</button>
                            <a class="btn blue" href="{{route('getAllStudies')}}">{{trans('backend.cancel')}}</a>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#country_id").change(function () {
            var id = $('#country_id option:selected').val();
            $.post({
                url: "<?php echo route('getCities')?>",
                data: {id: id},
                success: function (res) {
                    //console.log(res);
                    $("#city_id").html(res);
                }
            });
        });
    </script>
@endsection


