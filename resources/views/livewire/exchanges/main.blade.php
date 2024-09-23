<div>
    @section('title', 'Exchange Market')

    @section('css')
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <style>
        .exchange-market-siderbar {
            width: 100%;
            height: calc(100% - 60px);
            overflow-y: auto;
            background: white;
            margin-top: 60px;
            border-right: 2px solid #f8f9fa;
        }

        .exchange-market-content {
            background: white;
            width: 100%;
            margin-top: 60px;
            height: calc(100vh - 60px);
        }

        .nav-link-category {
            border-radius: 40px;
            width: 80%;
            color: #606060ff;
            font-size: 16px !important;
            transition: 0.3s;
        }

        .nav-link-category.active,
        .nav-link-category:hover {
            background-color: #fec7bdff;
            color: #eb1700ff;
        }

        .modal-backdrop {
            position: static !important;
        }
    </style>

    @endsection
    <div class="row p-0 m-0" style="margin-top:65px;">
        <!-- Sidebar -->
        <div class="col-md-4 col-lg-3 col-sm-12 p-0">
            @livewire('exchanges.sidebar')
        </div>

        <!-- Content -->
        <div class="col-md-8 col-lg-9 col-sm-12 p-0">
            @if(request()->routeIs('exchange.index'))
            @livewire('exchanges.index', key('exchanges_market_main'))
            @elseif(request()->routeIs('exchange.request'))
            @livewire('exchanges.requests', key('exchanges_requests'))
            @endif
        </div>
    </div>

    @section('js')
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
    @endsection
</div>