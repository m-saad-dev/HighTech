@extends('website.external_layouts.app')
@section("title", trans("menu.staff"))
@section('content')
<div class="col-lg-12">
    <div class="col-lg-12">
        <div class="rightico">
            <div class="col first">مدونة هاي تِك</div>
        </div>
        <hr />
        <div class="details col-lg-12 innerall">
            @foreach($blog as $article)
            <div class="row mdwna inneermad">
                <div class="col-lg-6 imgtop"><img class="img-fluid" src="{{$article->getFirstMedia('icon') ? $article->getFirstMedia('icon')->getFullUrl() : asset('assets/website/img/hover3.png')}}" alt="المدونة"></div>

                <div class="col-lg-6">
                    <div class="col  proj">
                        {!! $article->translate('ar')->content !!}
                    </div>
                </div>
            </div>
            @endforeach
            <div class=" col-lg-12 m-0 allbut">
                <button class="serv ةيصى">المزيد</button>
            </div>
        </div>
    </div>
@endsection
