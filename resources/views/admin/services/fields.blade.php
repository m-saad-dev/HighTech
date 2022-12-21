{{--@dd(session()->all())--}}
<!--begin::Card body-->
<div class="card-body border-top p-9">
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label fw-semibold fs-6">@lang('fields.icon')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Image input-->
            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/admin/media/svg/avatars/blank.svg')}}}')">
                <!--begin::Preview existing avatar-->
                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{isset($service) && $service->getFirstMedia('icon') ? $service->getFirstMedia('icon')->getFullUrl() : asset('assets/admin/media/svg/avatars/blank.svg')}})"></div>
                <!--end::Preview existing avatar-->
                <!--begin::Label-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="icon" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="icon_remove" />
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
    <!--end::Input group-->
    <span class="separator mb-6"></span>
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.title') @lang('common.inEn')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="translations[en][title]" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.name') @lang('common.inEn')" value="{{isset($service) ? $service->translate('en')->title : (old('translations.en.title') ?? '')}}" />
            @error('translations.en.title')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
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
            <input type="text" name="translations[en][sub_title]" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.sub_title') @lang('common.inEn')" value="{{isset($service) ? $service->translate('en')->sub_title : (old('translations.en.sub_title') ?? '')}}" />
            @error('translations.en.sub_title')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-20" >
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.description') @lang('common.inEn')</label>
        <!--end::Label-->
        <div class="col-lg-8 editor-container">
            <textarea id="first_editor" name="translations[en][description]" class="form-control form-control-lg form-control-solid kt_docs_quill_basic summernote" kt-data="{{ isset($service) ? $service->translate('en')->description : (old('translations.ar.sub_title') ?? '') }}">
{{--               {!! isset($service) ? $service->translate('en')->description : (old('translations.ar.sub_title') ?? '') !!}--}}
            </textarea>
            @error('translations.en.description')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <span class="separator mb-6"></span>
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.title') @lang('common.inAr')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="translations[ar][title]" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.title') @lang('common.inAr')" value="{{isset($service) ? $service->translate('ar')->title : (old('translations.ar.title') ?? '')}}" />
            @error('translations.ar.title')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
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
            <input type="text" name="translations[ar][sub_title]" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.sub_title') @lang('common.inAr')" value="{{isset($service) ? $service->translate('ar')->sub_title : (old('translations.ar.sub_title') ?? '')}}" />
            @error('translations.ar.sub_title')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-20" >
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.description') @lang('common.inAr')</label>
        <!--end::Label-->
        <div class="col-lg-8 editor-container">
            <textarea id="second_editor" name="translations[ar][description]" class="form-control form-control-lg form-control-solid kt_docs_quill_basic summernote" kt-data="{{ isset($service) ? $service->translate('ar')->description : (old('translations.ar.sub_title') ?? '') }}">
{{--                {!! isset($service) ? $service->translate('ar')->description : (old('translations.ar.sub_title') ?? '') !!}--}}
            </textarea>
            @error('translations.ar.description')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
</div>
@push('js')
{{--    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        editors = $('.summernote');
        for (editor of editors){
            console.log(editor.value)

       let summerNote = $('#'+editor.id).summernote({
            placeholder: '',
            lang: 'en-US',
            tabsize: 2,
            // height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        summerNote.summernote('code', editor.getAttribute('kt-data'));
        }
      // });
    </script>
@endpush
