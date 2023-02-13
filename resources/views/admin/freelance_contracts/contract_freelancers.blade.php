<div data-repeater-item>
    <div class="form-group row justify-content-end mb-5 draggable-zone">
		<div class="align-self-center w-45px">
			<span class="svg-icon svg-icon-2x align-left">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor"></path>
	<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor"></path>
	</svg>
	</span>
			
		</div>
        <!--begin::Col-->
        <div class="col-md-6 draggable">
            <select class="form-select form-select-md" data-kt-repeater="select2" name="freelancer_id"
                data-placeholder="Select an option">
                <option value=""></option>
                @foreach($freelancers ?? [] as $freelancer)
                    <option value="{{$freelancer->id}}"
                        {{(isset($contract) && isset($contractFreelancer) && $contractFreelancer->id == 
                        $freelancer->id) ? "selected" : (old('freelancer_id') ?? '')}}
                    >{{$freelancer->name}}</option>
                @endforeach
            </select>
            @error('freelancers.*.freelancer_id')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-3">
            <input type="number" name="fees" class="form-control form-control-md form-control-solid"
                placeholder="@lang('fields.fees')" value="{{isset($contract) && isset($contractFreelancer) && 
					isset($contractFreelancer->pivot) ? $contractFreelancer->pivot->fees : (old('fees') ?? '')}}"/>
            @error('freelancers.*.fees')
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