<!--begin::Card body-->
<div class="card-body border-top p-9">
    <!--begin::Repeater-->
    <div class="row" id="kt_docs_repeater_basic">
        <!--begin::Form group-->
        <div class="form-group">
            <div class="row" data-repeater-list="freelancers">
                <div data-repeater-item>
                    <div class="form-group row mb-5">
                        <!--begin::Label-->
                        <label class="col-md-3 col-form-label required fw-semibold fs-6">@lang('fields.name')</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-md-7">
                            <input type="text" name="name" class="form-control form-control-md form-control-solid" 
                                placeholder="@lang('fields.name')" value="{{isset($freelancer) ? $freelancer->name : (old('name') ?? '')}}" />
                            @error('name')
                            <span class="alert-danger" role="alert"> {{ $message }} </span>
                            @enderror
                        </div>
                        <!--end::Col-->
                        <!--begin::Form group-->
                        <div class="col-md-2 pe-0">
                            <a href="javascript:;" data-repeater-delete class="m-t btn btn-sm btn-light-danger">
                                <i class="la la-trash-o fs-3"></i>Delete
                            </a>
                        </div>
                        <!--end::Form group-->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                
                <a href="javascript:;" data-repeater-create class="col-4 btn btn-light-primary">
                    <i class="la la-plus fs-3"></i>Add
                </a>
            </div>
            <!-- /.row -->
            <!--end::Form group-->
        </div>

    </div>
    <!--end::Repeater-->
</div>
<!--end::Card body-->

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script src="{{asset('assets/admin/repeater.js')}}"></script>
@endpush