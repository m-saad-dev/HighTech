@extends('website.external_layouts.app')
@section("title", trans("menu.blog"))
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
                            <a href="{{route('website.articles.show', ['article' => $article->id])}}">
                                <div class="col  proj allblo">
                                    <div class="col first bl1">{{$article->translate('ar')->title}}</div>
                                    <div class="col first bl2">{{$article->translate('ar')->sub_title}}</div>
                                </div>
                            </a>
                        </div>

                        <div class="col secondr"><a href="{{route('website.articles.show', ['article' => $article])}}">أكمل القراءة</a></div>
                    </div>
                @endforeach
                <div class=" col-lg-12 m-0 allbut">
                    <button onclick="location.href='https://www.blog.hightech.com/';" class="serv mdwna">أنقر للمزيد من المقالات</button>
                </div>
            </div>
        </div>
@endsection
