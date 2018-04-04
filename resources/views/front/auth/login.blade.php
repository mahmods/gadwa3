@extends('front.layouts.front_layout')
@section('content')
    <!-- page content -->
    <div class="container page-content">
        <div class="row row-zCenter">
            <div class="col-s-12 col-m-6">
                <div class="content-box">
                    <h2 class="head">تسجيل الدخول</h2>
                    <form class="form-ui" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <label class="icon-field ti-person-io">
                            <input name="email" type="email" placeholder="البريد الالكترونى">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </label>

                        <label class="icon-field ti-lock">
                            <input name="password" type="password" placeholder="كلمة المرور">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </label>
                        <input class="right btn primary round-corner" value="تسجيل الدخول" type="submit">
                        <a href="{{route('customRegister')}}" class="right btn secondary round-corner">انشاء حساب جديد</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- // page content -->
@endsection