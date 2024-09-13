@extends('admin.layouts.master')

@section('page-header')
    <x-admin.page-header name1="dashboard" name2="all towns"/>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">All Towns</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.towns.create') }}" class="btn btn-primary">New Town</a>
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
