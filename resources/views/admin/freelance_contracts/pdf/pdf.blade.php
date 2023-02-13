<html lang="en">
<!--begin::Head-->
<head>
    <title>HeighTech - services</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="https://hightechsa.net/assets/website/favicon.ico">
    <!-- Bootstrap Icons-->

    <link href="{{asset('assets/admin/css/StyleSheet1.css')}}" rel="stylesheet">
</head>
<!--end::Head-->
<!--begin::Body-->
<body class="newinpage" data-new-gr-c-s-check-loaded="14.1095.0" data-gr-ext-installed="">

<div class="secback in">
    <section class="page-section bg-primary">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="">
                    <div class="">
                        <div>
                            <div class="row">
                                <div class="col-lg-12 newpage">

                                    <div class="col-lg-12 TOTEL">
                                        <div class="RIGHT col-lg-4">
                                            <img class="img-fluid" src="{{$freelanceContract->getFirstMedia('info')
                                            ->getFullUrl()}}" alt="الشعار" style="MAX-HEIGHT: 132PX;">
                                        </div>
                                        <div class="CENTER col-lg-4">
                                            <img class="img-fluid" src="{{$freelanceContract->getFirstMedia('logo')
                                            ->getFullUrl()}}" alt="بيانات الشركة" style="MAX-HEIGHT: 132PX;">
                                        </div>
                                        <div class="LEFT col-lg-4"></div>
                                    </div>
                                    <div class="col-lg-12 ">
                                        <div class="NASM">
                                            أسماء المعلنين المقترحة والمتاحة
                                        </div>
                                    </div>
                                    <div class="col-lg-12 ">
                                        <div class="SADA">
                                            إلى السادة : {{$freelanceContract->company_name}} (
                                            <img class="img-fluid" src="{{$freelanceContract->platform->getFirstMedia('icon')->getFullUrl()}}" alt="الشعار" style="MAX-HEIGHT: 35PX;">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 repat">
                                        <table class="col-lg-12 TOTELn" repeat_header="1">
                                            <tbody>
                                            @foreach($freelanceContract->freelancers as $freelancer)
                                                <tr class="col-lg-12 TOTELn">
                                                    <td class="RIGHT col-lg-4">{{$loop->iteration}}</td>
                                                    <td class="CENTER col-lg-4">{{$freelancer->name}}</td>
                                                    <td class="LEFT col-lg-4">{{$freelancer->pivot->fees}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="whatsapp">
                                        0565137888 - 0507525256
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
</body><!--end::Body-->

</html>