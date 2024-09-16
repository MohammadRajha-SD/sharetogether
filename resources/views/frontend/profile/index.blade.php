@extends('frontend.layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect.css') }}">
@endsection

@section('content')
    <div class="row mx-0 mt-5 " >
        <div class="col-lg-3 col-md-4 p-0" >
            @include('frontend.profile.user-card')
        </div>

        <div class="col-lg-9 col-md-8  p-0">
            @include('frontend.profile.tabs.index')
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
@endsection
