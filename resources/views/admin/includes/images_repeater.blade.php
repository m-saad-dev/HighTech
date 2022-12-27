<div data-repeater-item="image" class="col-4 row">
    <div class="row">
        <!--begin::Input group-->
        <div class="col-8 mb-6">
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/admin/media/svg/avatars/blank.svg')}}}')">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{isset($image) && $image->getFullUrl() ? $image->getFullUrl() : asset('assets/admin/media/svg/avatars/blank.svg')}})"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="mediafile[{{$index??''}}][images]" accept=".png, .jpg, .jpeg" />
{{--                                    <input type="hidden" name="images_remove" />--}}
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
                        <i class="bi bi-x fs-2"  onclick="appendToRemovedIds({{isset($image) ? $image->id : null}})"></i>
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
        <div class="col-md-4">
            <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8"  onclick="appendToRemovedIds({{isset($image) ? $image->id : null}})">
                <i class="la la-trash-o"></i>
            </a>
        </div>
        <!--begin::Form group-->
    </div>
</div>


