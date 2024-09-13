@extends('admin.layouts.master')

@section('css')
    <link href="{{URL::asset('backend/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection

@section('page-header')
    <x-admin.page-header name1="dashboard" name2="all countries"/>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">All Countries</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.countries.create') }}" class="btn btn-primary">New Country</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection
