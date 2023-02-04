@push('css')
    <link href="{{asset('assets/admin/plugins/summernote-0.8.18-dist/summernote-lite.min.css')}}" rel="stylesheet">
@endpush

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
            <div class="image-input image-input-outline" data-kt-image-input="true"
                 style="background-image: url('{{asset('assets/admin/media/svg/avatars/blank.svg')}}}')">
                <!--begin::Preview existing avatar-->
                <div class="image-input-wrapper w-125px h-125px"
                     style="background-image: url({{isset($article) && $article->getFirstMedia('icon') ? $article->getFirstMedia('icon')->getFullUrl() : asset('assets/admin/media/svg/avatars/blank.svg')}})"></div>
                <!--end::Preview existing avatar-->
                <!--begin::Label-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                       data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="icon" accept=".jpg, .png, .gif, .webp, .jpeg, .svg"/>
                    <input type="hidden" name="icon_remove"/>
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
            <div class="form-text">Allowed file types: jpg, png, gif, webp, jpeg, svg.</div>
            <div class="form-text">Allowed file size: 2(MB).</div>
            <!--end::Hint-->
            @error('icon')
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
        <label
            class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.title') @lang('common.inEn')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="translations[en][title]" class="form-control form-control-lg form-control-solid"
                   placeholder="@lang('fields.name') @lang('common.inEn')"
                   value="{{isset($article) ? $article->translate('en')->title : (old('translations.en.title') ?? '')}}"/>
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
        <label
            class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.sub_title') @lang('common.inEn')</label>
        <!--end::Label-->
        <div class="col-lg-8">
            <input type="text" name="translations[en][sub_title]"
                   class="form-control form-control-lg form-control-solid"
                   placeholder="@lang('fields.sub_title') @lang('common.inEn')"
                   value="{{isset($article) ? $article->translate('en')->sub_title : (old('translations.en.sub_title') ?? '')}}"/>
            @error('translations.en.sub_title')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-20">
        <!--begin::Label-->
        <label
            class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.content') @lang('common.inEn')</label>
        <!--end::Label-->
        <div class="col-lg-8 editor-container">
            <textarea id="first_editor" name="translations[en][content]"
                      class="form-control form-control-lg form-control-solid kt_docs_quill_basic summernote"
                      kt-data="{{ isset($article) ? $article->translate('en')->content : (old('translations.ar.sub_title') ?? '') }}">
            </textarea>
            @error('translations.en.content')
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
        <label
            class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.title') @lang('common.inAr')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="translations[ar][title]" class="form-control form-control-lg form-control-solid"
                   placeholder="@lang('fields.title') @lang('common.inAr')"
                   value="{{isset($article) ? $article->translate('ar')->title : (old('translations.ar.title') ?? '')}}"/>
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
        <label
            class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.sub_title') @lang('common.inAr')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="translations[ar][sub_title]"
                   class="form-control form-control-lg form-control-solid"
                   placeholder="@lang('fields.sub_title') @lang('common.inAr')"
                   value="{{isset($article) ? $article->translate('ar')->sub_title : (old('translations.ar.sub_title') ?? '')}}"/>
            @error('translations.ar.sub_title')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-20">
        <!--begin::Label-->
        <label
            class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.content') @lang('common.inAr')</label>
        <!--end::Label-->
        <div class="col-lg-8 editor-container">
            <textarea id="second_editor" name="translations[ar][content]"
                      class="form-control form-control-lg form-control-solid kt_docs_quill_basic summernote"
                      kt-data="{{ isset($article) ? $article->translate('ar')->content : (old('translations.ar.content') ?? '') }}">
            </textarea>
            @error('translations.ar.content')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->


    <!--begin::Repeater-->
    <div id="kt_docs_repeater_basic">
        <!--begin::Form group-->
        <div class="row">
            <div class="col-4 mt-5">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">@lang('fields.image')</label>
                <a href="javascript:;" data-repeater-create class="btn btn-sm btn-primary me-2">
                    <i class="la la-plus"></i>@lang('common.add')
                </a>

            </div>
            <!--end::Form group-->

            <div data-repeater-list="mediafile" class="row col-8">
                @if(isset($article) && ! $article->getMedia('images')->isEmpty())
                    @foreach($article->getMedia('images') as $image)
                        @include('admin.includes.images_repeater', [
                             'image' => $image,
                         ])
                    @endforeach
                @elseif(isset($article) && $article->getMedia('images')->isEmpty())
                    @include('admin.includes.images_repeater')
                @else
                    @include('admin.includes.images_repeater')
                @endif
            </div>
        </div>
        <!--end::Form group-->

    </div>
    <!--end::Repeater-->
    <input type="hidden" name="removedIds" id="removedIds" value="">
</div>


@push('js')
    <script>
        let removedIds = [];
        let removedIdsInput = $('#removedIds');
        let appendToRemovedIds = function (id) {
            removedIds.push(id);
            removedIdsInput.attr('value', removedIds);
        }
    </script>

    <script src="{{asset('assets/admin/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
    <script src="{{asset('assets/admin/repeater.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/summernote-0.8.18-dist/summernote-lite.min.js')}}"></script>
    <script src="{{asset('assets/admin/summernote-editor.js')}}"></script>
    {{--    <script src="{{asset('assets/admin/dropzone.js')}}"></script>--}}
@endpush
