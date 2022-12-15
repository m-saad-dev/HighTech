@extends('admin.layouts.app')
@section("title", trans("menu.usersList"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('menu.users') => null,
            trans('users.allUsers') => route('admin.users.index'),
        ],
    ])
@stop
@section('actions_routes')
    <!--begin::Actions-->
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <!--begin::Secondary button-->
        <!--end::Secondary button-->
        <!--begin::Primary button-->
        <a href="{{route('admin.users.edit', auth()->id())}}" class="btn btn-sm fw-bold btn-primary" > @lang('users.editMyProfile')</a>
        <!--end::Primary button-->
    </div>
    <!--end::Actions-->
@stop
@section('content')
    <!--begin::details View-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <div class="card-body p-9">
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-semibold fs-6 text-muted">@lang('common.avatar')</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Image input-->
                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{isset($data) && $data->getFirstMedia('avatars') ? $data->getFirstMedia('avatars')->getFullUrl() : asset('assets/admin/media/avatars/300-1.jpg')}}')">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{isset($data) && $data->getFirstMedia('avatars') ? $data->getFirstMedia('avatars')->getFullUrl() : asset('assets/admin/media/avatars/300-1.jpg')}}')"></div>
                        <!--end::Preview existing avatar-->
                    </div>
                    <!--end::Image input-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">@lang('fields.role')</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 badge badge-light-primary">{{$data->roles->first()->name}}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">@lang('fields.name')</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">{{$data->name}}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">@lang('fields.phone_number')</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 d-flex align-items-center">
                    <span class="fw-bold fs-6 text-gray-800 me-2">{{$data->phone_number}}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">@lang('fields.address')</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-semibold text-gray-800 fs-6">{{$data->address}}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">@lang('fields.email')</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <a href="{{$data->email}}" class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{$data->email}}</a>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::details View-->
@endsection
