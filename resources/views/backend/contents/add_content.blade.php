@extends('backend.layouts.main_layout')

@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{url('/home')}}">{{trans('main.header_bar_home')}}</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{route('getAllContents')}}">{{trans('content.contents')}}</a>
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
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box gadwa">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>{{trans('content.add_content')}}</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    <a href="javascript:;" class="reload"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form method="post" action="{{route('postAddContent')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="control-label">{{trans('content.content_type')}}</label>
                            {{--<input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="{{trans('product.email')}}" >--}}
                            <select onchange="yesnoCheck(this);"  name="content_type" id="single" class="form-control select2">
                                <option value="page">{{trans('content.select_content_type')}}</option>
                                <option value="slider">{{trans('content.slider')}}</option>
                                <option value="page">{{trans('content.page')}}</option>
                                <option value="steps">{{trans('content.steps')}}</option>
                                <option value="hint">{{trans('content.hint')}}</option>
                            </select>
                            @if($errors->has('content_type'))
                                <span class="help-block">{{$errors->first('content_type')}}</span>
                            @endif
                        </div>
                        <div id="hint_type" class="form-group">
                            <label class="control-label">{{trans('content.hint_step')}}</label>
                            {{--<input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="{{trans('product.email')}}" >--}}
                            <select  name="hint_step" id="single" class="form-control select2">
                                <option value="{{$content->hint_step}}">{{trans('content.step_one')}}</option>
                                <option value="step_one">{{trans('content.step_one')}}</option>
                                <option value="step_two">{{trans('content.step_two')}}</option>
                                <option value="step_three">{{trans('content.step_three')}}</option>
                                <option value="step_four">{{trans('content.step_four')}}</option>
                                <option value="step_five">{{trans('content.step_five')}}</option>
                                <option value="step_six">{{trans('content.step_six')}}</option>
                                <option value="step_seven">{{trans('content.step_seven')}}</option>
                                <option value="step_eight">{{trans('content.step_eight')}}</option>
                            </select>
                            @if($errors->has('hint_step'))
                                <span class="help-block">{{$errors->first('hint_step')}}</span>
                            @endif
                        </div>
                        <div id="hint_order" class="form-group">
                            <label class="control-label">{{trans('content.hint_order')}}</label>
                            <input name="hint_order" value="{{old('hint_order')}}" type="text" class="form-control"
                                   placeholder="{{trans('content.hint_placeholder')}}">
                            @if($errors->has('hint_order'))
                                <span class="help-block">{{$errors->first('hint_order')}}</span>
                            @endif
                        </div>
                        <div id="step_name" class="form-group">
                            <label class="control-label">{{trans('content.step_name')}}</label>
                            <input name="step_name" value="{{old('step_name')}}" type="text" class="form-control"
                                   placeholder="{{trans('content.step_name')}}">
                            @if($errors->has('step_name'))
                                <span class="help-block">{{$errors->first('step_name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('content.title')}}</label>
                            <input name="title" value="{{old('title')}}" type="text" class="form-control"
                                   placeholder="{{trans('content.title')}}">
                            @if($errors->has('title'))
                                <span class="help-block">{{$errors->first('title')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{trans('content.description')}}</label>
                            {{--<input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="{{trans('product.email')}}" >--}}
                            <textarea name="description" class="form-control"
                                      placeholder="{{trans('content.description')}}">{{old('description')}}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                        <div id="content_image" class="form-group">
                            <label class="control-label">{{trans('content.image')}}</label>
                            <input type="file"  name="image"  class="form-control">
                            @if($errors->has('image'))
                                <span class="help-block">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                        <div id="video_link" class="form-group">
                            <label class="control-label">{{trans('content.video_link')}}</label>
                            <input type="text"  name="video"  class="form-control"
                                   placeholder="{{trans('content.video_placeholder')}}">
                            @if($errors->has('video'))
                                <span class="help-block">{{$errors->first('video')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="btn-set pull-left">
                            <button type="submit" class="btn green">{{trans('backend.save')}}</button>
                            <a class="btn blue" href="{{route('getAllContents')}}">{{trans('backend.cancel')}}</a>
                        </div>
                    </div>
                </form>

                <script>
                    function yesnoCheck(that) {
                        if (that.value == "slider") {
                            document.getElementById("step_name").style.display = "none";
                            document.getElementById("hint_type").style.display = "none";
                            document.getElementById("hint_order").style.display = "none";
                            document.getElementById("video_link").style.display = "none";
                            document.getElementById("content_image").style.display = "block";
                        }
                        if (that.value == "hint")
                        {
                            document.getElementById("step_name").style.display = "none";
                            document.getElementById("step_name").style.display = "none";
                            document.getElementById("content_image").style.display = "none";
                            document.getElementById("video_link").style.display = "none";
                            document.getElementById("hint_type").style.display = "block";
                            document.getElementById("hint_order").style.display = "block";
                        }
                        if (that.value == "steps")
                        {
                            document.getElementById("hint_type").style.display = "none";
                            document.getElementById("hint_order").style.display = "none";
                            document.getElementById("video_link").style.display = "none";
                            document.getElementById("step_name").style.display = "block";
                            document.getElementById("content_image").style.display = "block";
                        }
                        if (that.value == "page")
                        {
                            document.getElementById("step_name").style.display = "none";
                            document.getElementById("hint_type").style.display = "none";
                            document.getElementById("hint_order").style.display = "none";
                            document.getElementById("content_image").style.display = "block";
                            document.getElementById("video_link").style.display = "block";
                        }
                    }
                </script>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
@endsection