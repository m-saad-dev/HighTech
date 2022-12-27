<head>
        <title>{{env('APP_NAME'). ' - '}}@yield('title')</title>
        @include('admin.layouts.meta')
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('assets/website/favicon.ico')}}" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/slick.css')}}" />

        <link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/slick-theme.css')}}" />
        <link href="{{asset('assets/website/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/website/css/modelstyle.css')}}" rel="stylesheet" />
    @stack('css')
</head>
