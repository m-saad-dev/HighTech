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
            <div class="image-input image-input-circle" data-kt-image-input="true"
                 style="background-image: url('{{asset('assets/admin/media/svg/avatars/blank.svg')}}}')">
                <!--begin::Preview existing avatar-->
                <div class="image-input-wrapper w-125px h-125px"
                     style="background-image: url({{isset($platform) && $platform->getFirstMedia('icon') ? $platform->getFirstMedia('icon')->getFullUrl() : asset('assets/admin/media/svg/avatars/blank.svg')}})"></div>
                <!--end::Preview existing avatar-->
                <!--begin::Label-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                       data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="icon" accept=".jpg, .png, .gif, .webp, .jpeg, .svg" />
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
            <div class="form-text">Allowed file size: 2048(MB).</div>
            <!--end::Hint-->
            @error('icon')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.name')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.name')" value="{{isset($platform) ? $platform->name : (old('name') ?? '')}}" />
            @error('name')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
</div>
<!--end::Card body-->
