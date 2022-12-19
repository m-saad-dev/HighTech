@extends('admin.layouts.app')
@section("title", trans("settings.aboutUs"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('menu.settings') => null,
            trans('settings.logo') => route('admin.settings', ['key' => 'logo']),
        ],
    ])
@stop
@section('content')
    <!--begin::details View-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">@lang('settings.logo')</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Form-->
        <form class="form" action="{{route('admin.settings.update', ['key' => 'logo'])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!--begin::Card body-->
            <div class="card-body p-9">
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">@lang('fields.avatar')</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/admin/media/svg/avatars/blank.svg')}}}')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{isset($setting) && $setting->getFirstMedia('image') ? $setting->getFirstMedia('image')->getFullUrl() : asset('assets/admin/media/svg/avatars/blank.svg')}})"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="image_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                  data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                  data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                  title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-3 col-form-label fw-bold fs-6"> @lang('settings.title') </label>
                    <!--end::Label-->
                    @if($errors->first('logo[title][ar]'))
                        <small class="text-danger">{{$errors->first('logo[title][ar]')}}</small>
                    @endif
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="logo[title][ar]" max="256" min="3" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" style="margin-bottom: 10px !important;" placeholder="@lang('fields.title') @lang('common.inAr')" value="{{($setting->getTitleTranslations('ar') ? $setting->getTitleTranslations('ar'): (old('logo[title][ar]'))) ?? ''}}" />
                        <input type="text" name="logo[title][en]" max="256" min="3" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="@lang('fields.title') @lang('common.inEn')" value="{{($setting->getTitleTranslations('en') ? $setting->getTitleTranslations('en'): (old('logo[title]'))) ?? ''}}" />
                    </div>
                    <!--end::Col-->
                </div>

            </div>
            <!--end::Card body-->
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">@lang('common.cancel')</button>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">@lang('common.save')</button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::details View-->
@endsection
