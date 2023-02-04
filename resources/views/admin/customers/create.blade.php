@extends('admin.layouts.app')
@section("title", trans("menu.customerReviews"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('customers.customers') => route('admin.customers.index'),
            trans('customers.createCustomerReview') => null,
        ],
    ])
@stop
@section('page_title')
    @lang('customers.createCustomerReview')
@stop
@section('content')
    <div class="card mb-5 mb-xl-10">
        @if (session()->has('issue_message'))
            <div class="alert alert-danger">{{ session()->get('issue_message') }}</div>
        @endif
        <!--begin::Form-->
        <form class="form" action="{{route('admin.customers.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.customers.fields')
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">@lang('common.cancel')</button>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">@lang('common.save')</button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
@endsection
