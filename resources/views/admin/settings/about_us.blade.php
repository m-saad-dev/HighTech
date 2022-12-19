@extends('admin.layouts.app')
@section("title", trans("settings.aboutUs"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('menu.settings') => null,
            trans('settings.aboutUs') => route('admin.settings', ['key' => 'about_us']),
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
                <h3 class="fw-bold m-0">@lang('settings.aboutUs')</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Form-->
        <form class="form" action="{{route('admin.settings.update', ['key' => 'about_us'])}}" method="POST">
            @csrf
            @method('PUT')
            <!--begin::Card body-->
            <div class="card-body p-9">
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-3 col-form-label fw-bold fs-6"> @lang('settings.title') </label>
                    <!--end::Label-->
                    @if($errors->first('about_us[title][ar]'))
                        <small class="text-danger">{{$errors->first('content')}}</small>
                    @endif
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="about_us[title][ar]" max="256" min="3" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" style="margin-bottom: 10px !important;" placeholder="@lang('fields.title') @lang('common.inAr')" value="{{($setting->getTitleTranslations('ar') ? $setting->getTitleTranslations('ar'): (old('about_us[title][ar]'))) ?? ''}}" />
                        <input type="text" name="about_us[title][en]" max="256" min="3" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="@lang('fields.title') @lang('common.inEn')" value="{{($setting->getTitleTranslations('en') ? $setting->getTitleTranslations('en'): (old('about_us[title]'))) ?? ''}}" />
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-3 col-form-label fw-bold fs-6"> @lang('settings.content') </label>
                    <!--end::Label-->
                    @if($errors->first('content'))
                        <small class="text-danger">{{$errors->first('content')}}</small>
                    @endif
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="textArea" name="about_us[content][ar]"  min="3" aria-placeholder="trans('settings.content')" class="form-control form-control-lg form-control-solid  mb-3 mb-lg-0" style="margin-bottom: 10px !important;" placeholder="@lang('fields.content') @lang('common.inAr')" value="{{($setting->getContentTranslations('ar') ? $setting->getContentTranslations('ar'): (old('about_us[content][ar]'))) ?? ''}}" />
                        <input type="textArea" name="about_us[content][en]"  min="3" enia-placeholder="{{trans('fields.content')}}" class="form-control form-control-lg form-control-solid  mb-3 mb-lg-0" placeholder="@lang('fields.content') @lang('common.inEn')" value="{{($setting->getContentTranslations('en') ? $setting->getContentTranslations('en'): (old('about_us[title][en]'))) ?? ''}}" />
                    </div>
                    <div class="col-lg-8 fv-row">
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
