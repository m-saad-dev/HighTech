<div class="row" id="kt_docs_repeater_basic">


	<div class="row" data-repeater-list="freelancers">
		<div data-repeater-item>
			<div class="form-group row justify-content-end mb-5">
				<!--begin::Col-->
				<div class="col-md-6">
					<select class="form-select form-select-md" data-kt-repeater="select2" name="freelancer_id"
						data-placeholder="Select an option" >
						@foreach($freelancers ?? [] as $freelancer)
							<option value="{{$freelancer->id}}" @if(isset($contract) && isset			
									($contractFreelancer) && $contractFreelancer->id == $freelancer->id)
								selected @endif>{{$freelancer->name}}</option>
						@endforeach
					</select>
				</div>
				<!--end::Col-->
				<!--begin::Col-->
				<div class="col-md-3">
					<input type="text" name="fees" class="form-control form-control-md form-control-solid"
						placeholder="@lang('fields.fees')" value="{{isset($contract) && isset($contractFreelancer) && 
					isset($contractFreelancer->pivot) ? $contractFreelancer->pivot->fees : (old('fees') ?? '')}}" />
					@error('fees')
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
		<!-- /.row -->
		<!--end::Form group-->
	</div>
	<div class="form-group">
		<div class="row justify-content-center m-5">
			<a href="javascript:;" data-repeater-create class="col-4 btn btn-light-primary">
				<i class="la la-plus fs-3"></i>Add
			</a>
		</div>
	</div>
</div>
