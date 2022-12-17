@extends('admin.layouts.app')
@section("title", trans("menu.clients"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('menu.clients') => null,
            trans('clients.allClients') => route('admin.clients.index'),
        ],
    ])
@stop
@section('actions_routes')
    <!--begin::Actions-->
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <!--begin::Secondary button-->
        <!--end::Secondary button-->
        <!--begin::Primary button-->
        <a href="{{route('admin.clients.create')}}" class="btn btn-sm fw-bold btn-primary" > @lang('clients.createClient')</a>
        <!--end::Primary button-->
    </div>
    <!--end::Actions-->
@stop
@section('content')
    <!--begin::details View-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">@lang('clients.allClients')</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">
            @include('admin.clients.table')
            {{$clients->links('pagination.paginator', ['paginator' => $clients, 'filter' => ''])}}
        </div>
        <!--end::Card body-->
    </div>
    <!--end::details View-->
@endsection
