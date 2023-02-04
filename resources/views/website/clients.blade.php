@extends('website.external_layouts.app')
@section("title", trans("menu.staff"))
@section('content')
<div class="col-lg-12">
    <div class="col-lg-12">
        <div class="rightico">
            <div class="col first">جميع  </div>
            <div class="col second"> عملاءنا</div>
        </div>
        <hr />
        <div class="details col-lg-12 innerall">
            @foreach($clients as $client)
                <div class="buttomimg ">
                        <div class="in"><img src="{{$client->getFirstMedia('avatars') ? $client->getFirstMedia('avatars')->getFullUrl() : asset("assets/website/img/logoside.png")}}" alt="{{$client->name}}"></div>
                    <span class="tiname">{{$client->name}}</span>
                </div>
            @endforeach
        </div>
    </div>
@endsection
