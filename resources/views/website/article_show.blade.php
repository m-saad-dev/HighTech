@extends('website.external_layouts.app')
@section("title", trans("menu.articles"))
@section('content')
    <div class="col-lg-12">
        <div class="col-lg-12 mb-10">
            <div class="rightico">
                <div class="col first">مدونة </div>
                <div class="col second"> هاى تك</div>
            </div>
                <div class="ico">
                	<img class="img-fluid" src="{{asset('assets/website/img/edit-altin.png')}}" alt="setting">
                </div>
                <br><br><br>
        </div>

        <hr />
        <div class="col-lg-12">
            <div class="rightico">
                <div class="col first fisub">{{$article->translate('ar')->title}}</div>
                <div class="col second insub">{{$article->translate('ar')->sub_title}}</div>
            </div>
        </div>
     <hr/>
        <div class="col-lg-12">
                <span>
                    {!! $article->translate('ar')->content !!}
                </span>

            <div class="blocksall carousel2">
                @if(isset($article) && ! $article->getMedia('images')->isEmpty())
                    @foreach($article->getMedia('images') as $image)
                        <div class="">
                            <a class="pop">
                                <img id="myImg" class="img-fluid myImg" src="{{$image->getFullUrl() ? $image->getFullUrl() : asset('assets/website/img/hover3.png')}}" alt="setting">

                            </a>
                        </div>
                    @endforeach
                @endif

            </div>
            <!-----------------model----------------------->
            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" data-dismiss="modal">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class="closeitem">&times;</span><span
                                    class="sr-only">Close</span></button>
                            <img src="" class="imagepreview" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>

           <!-- <div class=" col-lg-12 m-0 allbut"> -->
                <!--<a class="btn serv" href="{{route('website.home').'#se'}}">مدونة هاى تك</a> -->
            <!-- </div> -->
        </div>
    </div>

@endsection

