@extends('website.external_layouts.app')
@section("title", trans("menu.services"))
@section('content')
    <div class="col-lg-12">
        <div class="col-lg-12">
            <div class="rightico">
                <div class="col first">{{$service->translate('ar')->title}}</div>

                <div class="col second">{{$service->translate('ar')->sub_title}}</div>
            </div>
            <div class="ico">
                <img class="img-fluid" src="{{$service->getFirstMedia('icon') ? $service->getFirstMedia('icon')->getFullUrl() : asset('assets/website/img/edit-altin.png')}}" alt="setting">
            </div>
        </div>
        <hr/>
        <div class="col-lg-12">
                <span>
                    {!! $service->translate('ar')->description !!}
                </span>

            <div class="blocksall carousel2">
                @if(isset($service) && ! $service->getMedia('images')->isEmpty())
                    @foreach($service->getMedia('images') as $image)
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

            <div class=" col-lg-12 m-0 allbut">
                <a class="btn serv" href="{{route('website.home', ['service_id' => $service->id]).'#fu'}}">طلب الخدمة</a>
                <a class="back" href="{{url()->previous()}}">الرجوع للخدمات</a>
            </div>
        </div>
    </div>

@endsection
