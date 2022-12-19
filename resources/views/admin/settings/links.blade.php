@extends('admin.layouts.app')
@section("title", trans("settings.aboutUs"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('menu.settings') => null,
            trans('settings.links') => route('admin.settings', ['key' => 'links']),
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
                <h3 class="fw-bold m-0">@lang('settings.links')</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Form-->
        <form class="form" action="{{route('admin.settings.update', ['key' => 'links'])}}" method="POST">
            @csrf
            @method('PUT')
            <!--begin::Card body-->
            <div class="card-body p-9">
                @foreach(json_decode($setting->value,true) as $key => $link)
                    <!--begin: Datatable -->
                        <div class="card-body p-9 border-dashed mb-6 rounded">
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label fw-bold fs-6"> @lang('fields.title') </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-9">
                                    <input type="text" name="{{'links['.$loop->index.'][title][en]'}}" max="256" min="3" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" style="margin-bottom: 10px !important;" placeholder="@lang('fields.title') @lang('common.inEn')" value="{{($link['title']['en'] ? $link['title']['en']: (old('links[title][en]'))) ?? ''}}" />
                                    @if($errors->first("links.$loop->index.title"))
                                        <small class="text-danger">{{$errors->first("links.$loop->index.title")}}</small>
                                    @endif
                                </div>
                                <label class="col-lg-3 col-form-label fw-bold fs-6"> </label>
                                <div class="col-lg-9">
                                    <input type="text" name="{{'links['.$loop->index.'][title][ar]'}}" max="256" min="3" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" style="margin-bottom: 10px !important;" placeholder="@lang('fields.title') @lang('common.inEn')" value="{{($link['title']['ar'] ? $link['title']['ar']: (old('links[title][en]'))) ?? ''}}" />
                                    @if($errors->first("links.$loop->index.title"))
                                        <small class="text-danger">{{$errors->first("links.$loop->index.title")}}</small>
                                    @endif
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-3 col-form-label fw-bold fs-6"> @lang('fields.link') </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-9">
                                    <input type="text" name="{{'links['.$loop->index.'][link]'}}" max="256" min="3" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" style="margin-bottom: 10px !important;" placeholder="@lang('fields.link')" value="{{($link['link'] ? $link['link']: (old('links[link]'))) ?? ''}}" />
                                    @if($errors->first("links.$loop->index.link"))
                                        <small class="text-danger">{{$errors->first("links.$loop->index.link")}}</small>
                                    @endif
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                    @endforeach

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
