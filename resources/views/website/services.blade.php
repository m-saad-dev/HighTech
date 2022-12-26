@extends('website.layouts.app')
@section("title", trans("menu.dashboard"))
@section('content')
    <div class="secback in">
        <section class="page-section bg-primary">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="">
                            <div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div class="rightico">
                                                <div class="col first"> {{$service->translate('ar')->title}}  </div>

                                                <div class="col second"> {{$service->translate('ar')->sub_title}} </div>
                                            </div>
                                            <div class="ico">
                                                <img class="img-fluid" src="{{$service->getFirstMedia('avatars') ? $service->getFirstMedia('avatars')->getFullUrl() : asset('assets/website/img/edit-altin.png')}}" alt="setting">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="details col-lg-12">
                                            <span>

                                                {!! $service->translate('ar')->description !!}

                                            </span>

                                            <div class="blocksall carousel2">
                                                @if(! $service->getMedia('images')->isEmpty())
                                                    @foreach($service->getMedia('images') as $image)
                                                        <div class="">
                                                            <a class="pop">
                                                                <img id="myImg" class="img-fluid myImg" src="{{$image->getFullUrl()}}" alt="setting">
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                @endif


                                            </div>
                                            <!-----------------model----------------------->
                                            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" data-dismiss="modal">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class="closeitem">&times;</span><span class="sr-only">Close</span></button>
                                                            <img src="" class="imagepreview" style="width: 100%;">
                                                        </div>
                                                        <!--<div class="modal-footer">
                                                            <div class="col-xs-12">
                                                                <p class="text-left">1. line of description<br>2. line of description <br>3. line of description</p>

                                                            </div>

                                                        </div>-->


                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" col-lg-12 m-0 allbut">


                                                <button class="serv">طلب الخدمة</button>
                                                <a class="back" href="{{url()->previous()}}">الرجوع للخدمات</a>


                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

@endsection
