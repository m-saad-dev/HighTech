<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
    @include('website.layouts.head')
	<!--end::Head-->
	<!--begin::Body-->
    <body id="page-top">

        @include('website.layouts.logo')
        @include('website.layouts.aside')
        @yield('content')
        @include('website.layouts.foot')
    </body>
	<!--end::Body-->
</html>
