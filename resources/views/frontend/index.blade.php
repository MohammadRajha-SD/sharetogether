@extends('frontend.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/siderbar.css') }}" />
@endsection

@section('content')
    <div class="row p-0 m-0" style="margin-top:65px;">
        <!-- Sidebar -->
        <div class="col-md-4  col-lg-3 col-sm-12 p-0">
            @livewire('categories.index')
        </div>

        <!-- Content -->
        <div class="col-md-8 col-lg-9 col-sm-12 p-0">
            @livewire('categories.sub-category')
        </div>
    </div>
@endsection