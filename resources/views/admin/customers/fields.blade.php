{{--@dd(session()->all())--}}
<!--begin::Card body-->
<div class="card-body border-top p-9">
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label fw-semibold fs-6">@lang('fields.avatar')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Image input-->
            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/admin/media/svg/avatars/blank.svg')}}}')">
                <!--begin::Preview existing avatar-->
                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{isset($customer) && $customer->getFirstMedia('avatars') ? $customer->getFirstMedia('avatars')->getFullUrl() : asset('assets/admin/media/svg/avatars/blank.svg')}})"></div>
                <!--end::Preview existing avatar-->
                <!--begin::Label-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="avatar_remove" />
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
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.name') @lang('common.inEn')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="translations[en][name]" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.name') @lang('common.inEn')" value="{{isset($customer) ? $customer->name : (old('en.name') ?? '')}}" />
            @error('translations.en.name')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.name') @lang('common.inAr')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="translations[ar][name]" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.name') @lang('common.inAr')" value="{{isset($customer) ? $customer->name : (old('ar.name') ?? '')}}" />
            @error('translations.ar.name')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.companyName') @lang('common.inEn')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="translations[en][company_name]" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.companyName') @lang('common.inEn')" value="{{isset($customer) ? $customer->company_name : (old('translations.en.company_name') ?? '')}}" />
            @error('translations.en.company_name')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.companyName') @lang('common.inAr')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="translations[ar][company_name]" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.companyName') @lang('common.inAr')" value="{{isset($customer) ? $customer->company_name : (old('translations.ar.company_name') ?? '')}}" />
            @error('translations.ar.company_name')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.review') @lang('common.inEn')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <textarea type="text" name="translations[en][review]" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.review') @lang('common.inEn')">{{isset($customer) ? $customer->review : (old('translations.en.review') ?? '')}}</textarea>
            @error('translations.en.review')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.review') @lang('common.inAr')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <textarea type="text" name="translations[ar][review]" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.review') @lang('common.inAr')">{{isset($customer) ? $customer->review : (old('translations.ar.review') ?? '')}}</textarea>
            @error('translations.ar.review')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
</div>
<!--end::Card body-->
