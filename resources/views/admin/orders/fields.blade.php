<!--begin::Card body-->
<div class="card-body border-top p-9">
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.name')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.name')" value="{{isset($order) ? $order->name : (old('name') ?? '')}}" />
            @error('name')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.business_type')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="business_type" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.business_type')" value="{{isset($order) ? $order->business_type : (old('business_type') ?? '')}}" />
            @error('business_type')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.phone_number')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="tel" name="phone_number" @if(!auth()->user()->hasPermissionTo('edit-service-of-order')) disabled @endif class="form-control form-control-lg form-control-solid text-start" placeholder="@lang('fields.phone_number')" value="{{isset($order) ? $order->phone_number : (old('phone_number') ?? '')}}" />
            @error('phone_number')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.service')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <select name="service_id" aria-label="{{trans('common.select')}}" data-control="select2" data-placeholder="{{trans('common.select')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                @foreach($services->pluck('title', 'id')->toArray() as $id => $service)
                    <option value="{{$id}}" @if(isset($order) && $order->service_id == $id) selected @endif>{{$service}}</option>
                @endforeach
            </select>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
</div>
<!--end::Card body-->
