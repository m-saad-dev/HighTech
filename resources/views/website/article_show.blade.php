@extends('website.external_layouts.app')
@section("title", trans("menu.staff"))
@section('content')
<div class="col-lg-12">
    <div class="col-lg-12">
        <div class="rightico">
            <div class="col first">{{$article->translate('ar')->title}}</div>
            <div class="col second">{{$article->translate('ar')->sub_title}}</div>
        </div>
        <div class="ico">
        <img class="img-fluid" src="{{asset('assets/website/img/edit-altin.png')}}" alt="setting">
        </div>
       </div>
        <hr />
        <div class="details col-lg-12 innerall">
            <div class="row mdwna inneermad">
                <div class="col-lg-6 imgtop"><img class="img-fluid" src="{{$article->getFirstMedia('icon') ? $article->getFirstMedia('icon')->getFullUrl() : asset('assets/website/img/hover3.png')}}" alt="المدونة"></div>

                <div class="col-lg-6">
                    <div class="col  proj">
                        {!! $article->translate('ar')->content !!}
                    </div>

                    <!--<div class="col secondr"><a href="inner.html" tabindex="0">المزيد</a></div>-->

                </div>
            </div>
            <div class=" col-lg-12 m-0 allbut">
                <button class="serv ةيصى">المزيد</button>
            </div>
        </div>
    </div>
@endsection
