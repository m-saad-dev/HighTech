@extends('admin.layouts.app')
@section("title", trans("menu.article"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('articles.allArticles') => route('admin.articles.index'),
            trans('articles.showArticle') => null,
        ],
    ])
@stop
@section('page_title')
    @lang('articles.showArticle')
@stop
@section('actions')
    <a href="{{url()->previous()}}" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">@lang('common.back')</a>
@stop
@section('content')
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <div class="card-body p-9">
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-semibold fs-6">@lang('fields.icon')</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Image input-->
                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{isset($article) && $article->getFirstMedia('avatars') ? $article->getFirstMedia('avatars')->getFullUrl() : asset('assets/admin/media/avatars/300-1.jpg')}}')">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{isset($article) && $article->getFirstMedia('avatars') ? $article->getFirstMedia('avatars')->getFullUrl() : asset('assets/admin/media/avatars/300-1.jpg')}})"></div>
                        <!--end::Preview existing avatar-->
                    </div>
                    <!--end::Image input-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <span class="separator"></span>
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.title') @lang('common.inEn')</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <input type="text" name="translations[en][title]" class="form-control form-control-lg form-control-solid" disabled placeholder="@lang('fields.name') @lang('common.inEn')" value="{{isset($article) ? $article->translate('en')->title : (old('translations.en.title') ?? '')}}" />
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.sub_title') @lang('common.inEn')</label>
                <!--end::Label-->
                <div class="col-lg-8">
                    <input type="text" name="translations[en][sub_title]" class="form-control form-control-lg form-control-solid" disabled placeholder="@lang('fields.sub_title') @lang('common.inEn')" value="{{isset($article) ? $article->translate('en')->sub_title : (old('translations.en.sub_title') ?? '')}}" />
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-20" >
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.content') @lang('common.inEn')</label>
                <!--end::Label-->
                <div class="col-lg-8 editor-container">
                    <div id="first_editor" name="translations[en][content]" class="form-control form-control-lg form-control-solid summernote" kt-data="{{ isset($article) ? $article->translate('en')->content : (old('translations.ar.sub_title') ?? '') }}">
                        {{--               {!! isset($article) ? $article->translate('en')->content : (old('translations.ar.sub_title') ?? '') !!}--}}
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <span class="separator"></span>
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.title') @lang('common.inAr')</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <input type="text" name="translations[ar][title]" class="form-control form-control-lg form-control-solid" disabled placeholder="@lang('fields.title') @lang('common.inAr')" value="{{isset($article) ? $article->translate('ar')->title : (old('translations.ar.title') ?? '')}}" />
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.sub_title') @lang('common.inAr')</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <input type="text" name="translations[ar][sub_title]" class="form-control form-control-lg form-control-solid" disabled placeholder="@lang('fields.sub_title') @lang('common.inAr')" value="{{isset($article) ? $article->translate('ar')->sub_title : (old('translations.ar.sub_title') ?? '')}}" />
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-20 mt-20" >
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.content') @lang('common.inAr')</label>
                <!--end::Label-->
                <div class="col-lg-8 editor-container">
                    <div id="second_editor" name="translations[ar][content]" class="form-control form-control-lg form-control-solid summernote" kt-data="{{ isset($article) ? $article->translate('ar')->content : (old('translations.ar.sub_title') ?? '') }}">
                        {{--                {!! isset($article) ? $article->translate('ar')->content : (old('translations.ar.sub_title') ?? '') !!}--}}
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            @if(isset($article) && ! $article->getMedia('images')->isEmpty())
                <div class="row mb-20 mt-20" >
                    <label class="col-2 col-lg-4 d-block col-form-label fw-semibold fs-6">@lang('fields.images')</label>
                    <div class="col-10 col-lg-8">
                        @foreach($article->getMedia('images') as $image)
                            <!--begin::Image input-->
                            <div class="col-lg-2 m-lg-15 image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/admin/media/svg/avatars/blank.svg')}}}')">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-200px h-200px" style="background-image: url({{isset($image) && $image->getFullUrl() ? $image->getFullUrl() : asset('assets/admin/media/svg/avatars/blank.svg')}})"></div>
                                <!--end::Preview existing avatar-->
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <!--end::Card body-->
    </div>
@endsection
@push('js')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        editors = $('.summernote');
        for (editor of editors){
            let summerNote = $('#'+editor.id).summernote({
                placeholder: '',
                lang: 'en-US',
                tabsize: 2,
                toolbar: 'false',
                airMode: true
            });
            summerNote.summernote('pasteHTML', editor.getAttribute('kt-data'));
            summerNote.summernote('disable');
        }
        // });
    </script>
@endpush
