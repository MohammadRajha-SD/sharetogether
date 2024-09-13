@extends('frontend.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/siderbar.css')}}" />
@endsection

@section('content')
    <div class="row my-3">
        <div class="col-3 category-sidebar" >
            @livewire('categories.index')
        </div>

        <div class="col-8 category-sidebar">
            @livewire('categories.sub-category')
        </div>
    </div>
        {{--   @livewire('posts.index')--}}
@endsection

@section('js')
@endsection
