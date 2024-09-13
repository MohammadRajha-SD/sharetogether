@extends('admin.layouts.master')

@section('css')
    <link href="{{URL::asset('backend/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="row row-sm mt-4">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">All Categories</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-info">New Category</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
@endsection
@section('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <!--Internal  Notify js -->
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
