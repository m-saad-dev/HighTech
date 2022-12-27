<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->
@include('website.external_layouts.head')
<!--end::Head-->

<!--begin::Body-->
<body class="inpage">

@include('website.external_layouts.logo')

@include('website.external_layouts.aside')

<div class="secback in">
    <section class="page-section bg-primary">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="">
                        <div>
                            <div class="row">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('website.external_layouts.foot')

</body>
<!--end::Body-->
</html>
