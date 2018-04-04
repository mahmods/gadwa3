<header>
    <div class="container">
        <a href="#" class="logo"><img src="{{ASSETS}}/front/img/logo.png" alt=""></a>
        <div class="user-panel">
            @if(\Auth::check())
                <span class="btn-success"></span><a href="{{route('getUserStudies',['userId'=>Auth::user()->id])}}" class="ti-person-io"></a>
            <a href="#" class="ti-android-settings"></a>
            <a class="ti-power-io" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endif
            @if(LaravelLocalization::getCurrentLocale()=='ar')
            <a href="{{url('/en')}}" class="lang">EN</a>
            @else
            <a href="{{url('/ar')}}" class="lang">AR</a>
            @endif
        </div>
        <div class="navigation-menu">
            <ul>
                <li><a href="{{route('getHome')}}">الرئيسية</a></li>
                @if(Auth::check())
                <li><a href="{{route('step_one')}}">إضافة دراسة جديدة</a></li>
                @endif
                @if(Auth::guest())
                <li><a href="{{route('customRegister')}}">التسجيل</a></li>
                @endif
                <li><a href="#">من نحن</a></li>
                <li><a href="#">اتصل بنا</a></li>
            </ul>
        </div>
    </div>
</header>