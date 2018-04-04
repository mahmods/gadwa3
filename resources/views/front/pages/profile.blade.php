@extends('front.layouts.front_layout')
@section('content')
    <!-- page content -->
    <div class="container page-content">
        <div class="profile">
            <div class="profile-head">
                <h3>الدراسات السابقة</h3>
                <a href="{{route('step_one')}}" class="button">إضافة دراسه جديدة</a>
            </div>
            <div class="row cols-gutter-20">
                <div class="col-s-12 col-m-4 col-l-3">
                    <div class="profile-side">
                        <img src="{{ASSETS}}/front/img/avatar.png" class="avatar" alt="">
                        <h3>{{Auth::user()->name}}</h3>
                        <ul>
                            <li>عدد الدراسات : {!! count($studies) !!}</li>
                            <li>العنوان : مصر , بني سويف</li>
                            <li>الشركة : المها كود للبرمجيات</li>
                            <li>رقم الهاتف : +204789645</li>
                            <li>البريد : {{Auth::user()->email}}</li>
                        </ul>
                        <a href="#" class="button">طرق الدفع</a>
                    </div>
                </div>

                <div class="col-s-12 col-m-8 col-l-9">
                    <div class="row">
                        @foreach($studies as $i=>$study)
                        <!-- Study Block -->
                        <div class="study-block col-s-12 col-m-6">
                            <div class="table-style">
                                <div class="info">
                                    <a href="#"><h3>{{$study->title}}</h3></a>
                                    <p>تاريخ انشاء الدراسة : {{$study->created_at}}</p>
                                </div>
                                <i><a href="#" class="ti-download"></a></i>
                            </div>
                        </div>
                        <!-- // Study Block -->
                        @endforeach
                    </div>
                    {{$studies->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- // page content -->
@endsection