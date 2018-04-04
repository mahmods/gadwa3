@extends('front.layouts.front_layout')
@section('content')
    <!-- page content -->
    <div class="container page-content">
        <div class="row row-hCenter">
            <div class="col-s-12 col-m-6">
                <div class="content-box">
                    <h2 class="head">تسجيل حساب جديد</h2>
                    <form method="POST" action="{{ route('register') }}" class="form-ui">
                        {{ csrf_field() }}
                        <label class="icon-field ti-person-io">
                            <input type="text" name="name" value="{{ old('name') }}" required autofocus
                                   placeholder="اسم المستخدم">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </label>
                        <label class="icon-field ti-ios-email">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="البريد الالكتروني">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </label>
                        <label class="icon-field ti-lock">
                            <input type="password" name="password" placeholder="كلمة المرور">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </label>
                        <label class="icon-field ti-lock">
                            <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور">
                        </label>
                        <input class="right btn primary round-corner" value="التسجيل" type="submit">
                        <a href="{{url('/login')}}" class="right btn secondary round-corner">تسجيل الدخول</a
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- // page content -->
@endsection