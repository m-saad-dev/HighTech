@extends('website.external_layouts.app')
@section("title", trans("menu.staff"))
@section('content')
<div class="col-lg-12">
    <div class="col-lg-12">
        <div class="rightico">
            <div class="col first"> طاقم</div>

            <div class="col second"> العمل</div>
        </div>
        <div class="ico">
        <img class="img-fluid" src="assets/img/edit-altin.png" alt="setting">
        </div>
       </div>
        <hr />
        <div class="details col-lg-12 innerall">
            @foreach($staff as $member)
                <div class="buttomimg ">
                    <img src="{{$member->getFirstMedia('avatars') ? $member->getFirstMedia('avatars')->getFullUrl() : asset('assets/website/img/boy.png')}}" alt="">
                    <span class="tiname">{{$member->translate('ar')->name}}</span>
                    <span class="titeln">{{$member->translate('ar')->position}}</span>
                </div>
            @endforeach
        </div>
        <DIV class="col-lg-12 copyright">جميع الحقوق محفوظة لمؤسسة التقنية العالية للتسويق الرقمى</div>

    </div>
@endsection
