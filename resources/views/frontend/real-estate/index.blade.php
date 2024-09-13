@extends('frontend.layouts.master')
@section('css')
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" >
    <link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <style>
        .btn-email-agent {
            cursor: pointer;
            transition: background-color 100ms cubic-bezier(0.5, 0, 0.2, 1), color 100ms cubic-bezier(0.5, 0, 0.2, 1), border-color 100ms cubic-bezier(0.5, 0, 0.2, 1);
            user-select: none;
            white-space: nowrap;
            vertical-align: middle;
            border: 1px solid rgb(26, 24, 22);
            padding: 5px 24px;
            font-weight: 500;
            border-radius: 20px;
            color: rgb(26, 24, 22);
            background-color: rgb(255, 255, 255);
        }

        .btn-email-agent:hover {
            opacity: .8;
            background: #eee;
        }

        .card-property {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .badge-new {
            background-color: #007bff;
            position: absolute;
            top: 15px;
            left: 15px;
        }

        .favorite-icon {
            position: absolute;
            bottom: 15px;
            right: 15px;
            font-size: 1.5rem;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            color: #fff;
            /*background-color: white;*/
            text-align: center;
        }
    </style>

    @livewire('real-estate.index')

@endsection
@section('js')
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
@endsection
