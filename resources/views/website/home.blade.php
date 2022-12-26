@extends('website.layouts.app')
@section("title", trans("menu.dashboard"))
@section('content')
<div class="secback">
    <section class="page-section bg-primary" id="first">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center vcenter">
                    <span class="col-lg-12 str" id="in">{{$aboutUs['title']['ar']}}</span>
                    <span class="col-lg-12 new">{{$aboutUs['content']['ar']}}</span>
                    <div class="col-lg-12 align-self-baseline">
                        <a class="btn nav-link nextlink" href="#sec"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section bg-primary" id="sec">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    @foreach($services as $service)
                        <div class="col-lg-12"><div class=" {{$loop->iteration % 2 != 0 ? "blocksevleft hover1" : "blocksev hover2" }}">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="col first"> {{$service->translate('ar')->title}} </div>
                                        <div class="col second">{{$service->translate('ar')->sub_title}}</div>
                                    </div>
                                    <div class="col-lg-3 icon">
                                        <a href="#" class="{{"grap".$loop->iteration}}"></a>
                                    </div>
                                    <div class="moredata"><a href="tat.html">المزيد عن الخدمة</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="page-section bg-primary" id="th">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="slidall text-center">
                    <div class="titel amala">عملائنا</div>
                    <div class="carousel1">
                        @foreach($clients as $client)
                        <div class="in"><img src="{{$client->getFirstMedia('avatars') ? $client->getFirstMedia('avatars')->getFullUrl() : asset("assets/website/img/logoside.png")}}" alt="{{$client->name}}"></div>
                        @endforeach
                    </div>
                    <div class="titel titelara">آراء العملاء</div>
                    <div class="single-item2 md">
                        @foreach($customers as $customer)
                            <div>
                                <div class=" ara">
                                    <div  class="imgblog"><img class="img-fluid" src="{{$customer->getFirstMedia('avatars') ? $customer->getFirstMedia('avatars')->getFullUrl() : asset("assets/website/img/Ellipse 19.png")}}" alt="logo"></div>
                                    <div class="marknam"><span class="nameblog"> {{$customer->translate('ar')->name}} </span>
                                        <span class="work"> {{$customer->translate('ar')->company_name}} </span> </div>
                                    <div class="col  proj"> {{$customer->translate('ar')->review}} </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section bg-primary" id="fu">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="titel tlb">طلب خدمة</div>
                    <form id="contactForm"  action="{{route('website.orders.store')}}" method="POST">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input name="name" class="form-control " id="name" type="text" placeholder="اسم العميل" data-sb-validations="required" data-sb-can-submit="no">
                            <label for="name">اسم العميل</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">*</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input name="business_type" class="form-control" id="nshat" type="text" placeholder="نشاط العمل" data-sb-validations="required,email" data-sb-can-submit="no">
                            <label for="nshat">نشاط العمل</label>

                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input name="phone_number" class="form-control" id="phone" type="tel" placeholder="رقم الجوال" data-sb-validations="required" data-sb-can-submit="no">
                            <label for="phone">رقم الجوال</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">*</div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <select name="service_id" aria-label="{{trans('common.select')}}" data-control="select2" data-placeholder="{{trans('common.select')}}" class="form-control">
                                @foreach($services as $id => $service)
                                    <option value="{{$id}}" @if(isset($order) && $order->service_id == $id) selected @endif>{{$service->translate('ar')->title}}</option>
                                @endforeach
                            </select>
                            <label for="message">نوع الخدمة</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">*</div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br>
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-xl " id="submitButton" type="submit">إرسال</button></div>
                    </form>
                    <!--<div class="col-lg-12 align-self-baseline">
                        <a class="btn nav-link nextlink" href="#fi"></a>
                    </div>-->
                </div>
            </div>
        </div>
    </section>
    <section class="page-section bg-primary" id="fi">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">

                    <div class="titel taqam">طاقم العمل</div>
                    <div class="member carousel">
                        @foreach($staff as $member)
                            <div class="buttomimg">
                                <img src="{{$member->getFirstMedia('avatars') ? $member->getFirstMedia('avatars')->getFullUrl() : asset('assets/website/img/boy.png')}}" alt="">
                                <span class="tiname">{{$member->translate('ar')->name}}</span>
                                <span class="titeln">{{$member->translate('ar')->position}}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-12 align-self-baseline">
                        <a class="btn nav-link nextserv " href="#se">المزيد</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="page-section bg-primary" id="se">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="titel madw">مدونة هاي تك</div>
                    <div class="single-item md">
                        @foreach($articles as $article)
                            <div>
                                <div class="row mdwna">
                                    <div class="col-lg-6 imgtop"><img class="img-fluid" src="{{$article->getFirstMedia('avatars') ? $article->getFirstMedia('avatars')->getFullUrl() : asset('assets/website/img/Rectangle.png')}}" alt="المدونة"></div>
                                    <div class="col-lg-6">
                                        <div class="col  proj">{{ $article->translate('ar')->content }} </div>
                                        <div class="col secondr"><a href="inner.html">المزيد</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section bg-primary" id="sev">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="titel contt">تواصل معنا</div>
                    <div class="social disk">
                        <ul>
                            @foreach($links as $link)
                                <li><a href="{{$link['link']}}" target="_blank" class="w"><img class="img-fluid" src="{{asset('assets/website/img/'.$loop->iteration.'.png')}}" alt="{{$link['title']['ar']}}"></a></li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="social mob">
                        <ul>
                            @foreach($links as $link)
                                <li><a href="{{$link['link']}}" target="_blank" class="w"><img class="img-fluid" src="{{asset('assets/website/img/'.$loop->iteration.'.png')}}" alt="{{$link['title']['ar']}}"></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
