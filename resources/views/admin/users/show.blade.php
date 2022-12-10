@extends('admin.layouts.app')
@section("title", trans("menu.usersList"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('users.allUsers') => route('admin.users.index'),
            trans('users.createUser') => null,
        ],
    ])
@stop
@section('page_title')
    @lang('users.createUser')
@stop
@section('actions')
    <a href="{{url()->previous()}}" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">@lang('common.back')</a>
@stop
@section('content')
<div class="card mb-5 mb-xl-10">

</div>
@endsection
