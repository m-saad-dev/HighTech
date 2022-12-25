<head><base href="../"/>
    <title>{{env('APP_NAME'). ' - '}}@yield('title')</title>
    @include('admin.layouts.meta')
    <link rel="shortcut icon" href="{{asset('assets/admin/media/logos/favicon.ico')}}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="{{asset('assets/admin/css/familyInterGoogleFont.css')}}" />
    <!--end::Fonts-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{asset('assets/admin/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/plugins/custom/vis-timeline/vis-timeline.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('/js/app.js')}}" defer></script>
    <!--end::Vendor Stylesheets-->
    @if(checkLocale('en'))
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Page Vendor Stylesheets-->
        <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
        <link href="{{asset('assets/admin/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    @elseif(checkLocale('ar'))
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Page Vendor Stylesheets-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{asset('assets/admin/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->

    @endif
    @stack('css')
</head>
