<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 12/09/17
 * Time: 10:16 ص
 */
?>
@extends('front/layouts/front_layout')
@section('content')
    <!-- Home Slider -->
    <div class="home-slider tornado-ui">
        @foreach($sliders as $i=>$slider)
            <div class="item" data-src="{{ASSETS}}/images/{{$slider->image}}">
                <div class="row row-zCenter">
                    <div class="col-s-12 col-m-6">
                        <h3>{{$slider->title}}</h3>
                        <p>{{$slider->description}}</p>
                        <a href="#" class="btn primary large rounded">أبدأ الدراسه الان</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- // Home Slider -->
    <!-- How To -->
    <div class="howto">
        <div class="container">
            <h2> كيف يعمل جدوي  </h2>
            <div class="row overflow">
                @foreach($steps as $i=>$step)
                    <div class="col-s-12 col-m-6 col-l-4 howto-block wow fadeInRight">
                        <div class="table-style">
                            <div class="step">
                                <i>0{{$i+1}}</i>
                                <span>{{$step->step_name}}</span>
                            </div>
                            <div class="info">
                                <h3>{{$step->title}}</h3>
                                <p>{{$step->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- // How To -->
    <!-- About Gadwa -->
    <div class="about-up overflow">
        @php $about=\App\Repositories\ContentRepository::getAllContentsView()->where('content_type','page')->where('id',6)->first(); @endphp
        @if($about)
        <img src="{{ASSETS}}/images/{{$about->image}}" alt="" class="wow fadeInUp">
        @endif
    </div>
    @if($about)

        <div class="about">
            <div class="container">
            <div class="content-box">
                <div class="row row-zCenter overflow">
                    <div class="col-s-12 col-m-6 col-l-7">
                        <h2 class="wow fadeInUp">{{$about->title}}</h2>
                        <p class="wow slideExpandUp">{{$about->description}}</p>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-5">
                        <iframe class="video wow fadeInLeft" width="560" height="315" src="{{$about->video}}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            </div>
         </div>
    @endif
    <!-- // About Gadwa -->
    <!-- Start Your Project -->
    <div class="syp-section overflow">
        <div class="container">
            <div class="row row-zCenter row-reverse">
                @php $start=\App\Repositories\ContentRepository::getAllContentsView()->where('content_type','page')->where('id',7)->first(); @endphp
                @if($start)
                <div class="col-s-12 col-m-6">
                    <img src="{{ASSETS}}/images/{{$start->image}}" alt="" class="wow fadeInLeft">
                </div>
                <div class="col-s-12 col-m-6">
                    <h3 class="wow fadeInUp">{{$start->title}}</h3>
                    <p class="wow fadeInUp">{{$start->description}}</p>
                    <a href="{{route('step_one')}}" class="btn secondary large rounded wow fadeInRight">ابدأ دراسة مشروعك الان</a>
                    @if(!Auth::check())
                        <a href="{{route('customRegister')}}" class="btn primary large rounded wow fadeInLeft">تسجيل حساب جديد</a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- // Start Your Project -->
    <!-- Download Your Project -->
    <div class="dyp-section overflow">
        <div class="container">
            <div class="row row-zCenter">
                @php $page3=\App\Repositories\ContentRepository::getAllContentsView()->where('content_type','page')->where('id',8)->first(); @endphp
                @if($page3)
                <div class="col-s-12 col-m-6">
                    <img src="{{ASSETS}}/images/{{$page3->image}}" alt="" class="wow fadeInLeft">
                </div>
                <div class="col-s-12 col-m-6">
                    <h3 class="wow fadeInUp">{{$page3->title}}</h3>
                    <p class="wow fadeInUp">{{$page3->description}}</p>
                    <a href="{{route('step_one')}}" class="btn secondary large rounded wow fadeInRight">ابدأ دراسة مشروعك الان</a>
                    @if(!Auth::check())
                        <a href="{{route('customRegister')}}" class="btn primary large rounded wow fadeInLeft">تسجيل حساب جديد</a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- // Download Your Project -->
@endsection
