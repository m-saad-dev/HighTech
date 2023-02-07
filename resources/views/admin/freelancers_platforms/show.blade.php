@extends('admin.layouts.app')
@section("title", trans("menu.freelancersPlatforms"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('menu.freelancersPlatforms') => route('admin.freelancers.index'),
            trans('freelancers_platforms.showFreelancersPlatform') => null,
        ],
    ])
@stop
@section('page_title')
    @lang('freelancers_platforms.showFreelancersPlatform')
@stop
@section('actions')
    <a href="{{url()->previous()}}" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">@lang('common.back')</a>
@stop
@section('content')
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <div class="card-body p-9">
{{--            <!--begin::Input group-->--}}
{{--            <div class="row mb-6">--}}
{{--                <!--begin::Label-->--}}
{{--                <label class="col-lg-4 col-form-label fw-semibold fs-6 text-muted">@lang('common.avatar')</label>--}}
{{--                <!--end::Label-->--}}
{{--                <!--begin::Col-->--}}
{{--                <div class="col-lg-8">--}}
{{--                    <!--begin::Image input-->--}}
{{--                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: --}}
{{--                    url('{{isset($freelancer) && $freelancer->getFirstMedia('avatars') ? $freelancer->getFirstMedia--}}
{{--                    ('avatars')--}}
{{--                    ->getFullUrl--}}
{{--                    () : asset('assets/admin/media/avatars/300-1.jpg')}}')">--}}
{{--                        <!--begin::Preview existing avatar-->--}}
{{--                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{isset--}}
{{--                        ($freelancer)--}}
{{--                         && --}}
{{--                        $freelancer->getFirstMedia('avatars') ? $freelancer->getFirstMedia('avatars')->getFullUrl() : --}}
{{--                        asset--}}
{{--                        ('assets/admin/media/avatars/300-1.jpg')}})"></div>--}}
{{--                        <!--end::Preview existing avatar-->--}}
{{--                    </div>--}}
{{--                    <!--end::Image input-->--}}
{{--                </div>--}}
{{--                <!--end::Col-->--}}
{{--            </div>--}}
{{--            <!--end::Input group-->--}}
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">@lang('fields.name')</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">{{$platform->name}}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Card body-->
    </div>
@endsection
