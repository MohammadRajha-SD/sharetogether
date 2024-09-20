<div>
    @section('title', 'Real Estate')

    @section('css')
        <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" >
        <link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    @endsection

    @livewire('real-estate.index', key('real_estate_main'))

    @section('js')
        <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/modal.js')}}"></script>
    @endsection
</div>