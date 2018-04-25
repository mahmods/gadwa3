<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="A Description Of The Project">
    <meta name="keywords" content="The keywords">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>Gadwa</title>
    <!-- Required CSS Files -->
    @include('front.includes.css')
</head>
<body>
<!-- loading -->
<div class='tornado-loader loading7'> <span class='loader22'><span class='loader22-inner'></span></span> </div>

<!-- header -->
@include('front.includes.header')
<!-- // header -->

<!-- page content -->
@yield('content')
<!-- // page content -->

<!-- footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-s-12 col-m-4 col-l-5">
                <h3>عن جدوي</h3>
                <p> إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد</p>
                <div class="social">
                    <a href="#" class="ti-facebook"></a>
                    <a href="#" class="ti-twitter"></a>
                    <a href="#" class="ti-googleplus"></a>
                    <a href="#" class="ti-youtube-play"></a>
                    <a href="#" class="ti-instagram"></a>
                </div>
            </div>
            <div class="col-s-12 col-m-3 col-l-2">
                <h3>روابط هامه</h3>
                <ul>
                    <li><a href="#">مثال على رابط</a></li>
                    <li><a href="#">شركة مشروعك</a></li>
                    <li><a href="#">شركة انجاز للترجمة</a></li>
                </ul>
            </div>
            <div class="col-s-12 col-m-3 col-l-2">
                <h3>روابط هامه</h3>
                <ul>
                    <li><a href="#">مثال على رابط</a></li>
                    <li><a href="#">شركة مشروعك</a></li>
                    <li><a href="#">شركة انجاز للترجمة</a></li>
                </ul>
            </div>
            <div class="col-s-12 col-m-4 col-l-3">
                <a href="#" class="logo"><img src="{{ASSETS}}/front/img/logo-b.png" alt=""></a>
            </div>
        </div>
    </div>
</footer>
<div class="copyrights">
    <div class="container">
        <span>جميع الحقوق محفوظة</span>
        <a href="#" class="mahacode"><img src="{{ASSETS}}/front/img/mahacode.png" alt=""></a>
    </div>
</div>

<!-- Required JS Files -->
@include('front.includes.js')
@yield('js')
<script type="text/javascript" src="{{MAIN}}/js/app.js"></script>
</body>
</html>