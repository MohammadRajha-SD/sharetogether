@extends('admin.layouts.master')

@section('page-header')
    <x-admin.page-header name1="dashboard" name2="all cities"/>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">All Cities</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.cities.create') }}" class="btn btn-primary">New City</a>
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
