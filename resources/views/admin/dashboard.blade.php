@extends('admin.layouts.app')
@section("title", trans("menu.dashboard"))
@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">Dashboards</li>
        <!--end::Item-->
    </ul>
@stop
@section('content')
    <div class="card mb-5 mb-xl-10" id="notifications">
        <div class="card-body p-9">
            <h3 class="m-6"> @lang('orders.recentOrders') </h3>
            <div class="card-body border-top p-9" id="notifications">
                <notifications-component name-translation="@lang('fields.name')" phone-number-translation="@lang('fields.phone_number')" business-type-translation="@lang('fields.business_type')" service-translation="@lang('orders.service')">

                </notifications-component>
            </div>
        </div>
    </div>
    <div class="card mb-5 mb-xl-10" id="notifications">
        <div class="card-body p-9">
            <h3 class="m-6"> @lang('orders.oldOrders') </h3>

            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9" style="max-width: inherit !important;">
                    <!--begin::Thead-->
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                    <tr>
                        <th class="min-w-75px max-w-100%">#</th>
                        <th class="min-w-150px">@lang('fields.name')</th>
                        <th class="min-w-150px">@lang('fields.phone_number')</th>
                        <th class="min-w-150px">@lang('fields.business_type')</th>
                        <th class="min-w-150px">@lang('common.creator')</th>
                        <th class="min-w-150px">@lang('common.updater')</th>
                    </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-semibold text-gray-600" style="max-width: inherit !important;">
                    @foreach($oldOrders as $order)
                        <tr>
                            <td class="min-w-75px max-w-100%">
                                <span class="text-gray-600">{{$loop->iteration}}</span>
                            </td>
                            <td>
                                <a href="{{route('admin.orders.show', $order->id)}}" class="text-gray-600 fs-7 fw-bold text-decoration-none">{{$order->name}}</a>
                            </td>
                            <td>
                                <a href="javascript::void(0);" class="text-hover-primary text-gray-600 fs-7">{{$order->phone_number}}</a>
                            </td>
                            <td>
                                <a href="javascript::void(0);" class="text-hover-primary text-gray-600 fs-7">{{$order->business_type}}</a>
                            </td>
                            <td>
                                <a href="javascript::void(0);" class="text-hover-primary text-gray-600 fs-7">{{$order->creator?->name}}</a>
                            </td>
                            <td>
                                <a href="javascript::void(0);" class="text-hover-primary text-gray-600 fs-7">{{$order->updater?->name}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <!--end::Tbody-->
                </table>
                <!--end::Table-->

            </div>
            {{$oldOrders->links('pagination.paginator', ['paginator' => $oldOrders, 'filter' => ''])}}
        </div>
    </div>
@endsection
