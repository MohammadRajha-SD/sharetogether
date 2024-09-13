@extends('frontend.layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
        <!-- row -->
        <div class="row row-sm mt-2">
            <div class="col-lg-4">
              @include('frontend.profile.user-card')
            </div>

            <div class="col-lg-8">
                 <div class="card">
                    <div class="card-body">
                        <div class="tabs-menu">
                            <!-- Tabs -->
                            <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                                <li class="">
                                    <a href="#profile-info" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">Profile Info</span> </a>
                                </li>
                                <li class="">
                                    <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">SETTINGS</span> </a>
                                </li>
                                <li class="">
                                    <a href="#location" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-map-marker-alt tx-16 mr-1"></i></span> <span class="hidden-xs">Location</span> </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content border-left border-bottom border-right border-top-0 p-4" style="overflow-y: scroll;">
                            <div class="tab-pane " id="profile-info">
                                @include('frontend.profile.profile-info')
                            </div>

                            <div class="tab-pane " id="settings">
                                @include('frontend.profile.update-password-form')
                            </div>

                            <div class="tab-pane active" id="location">
                                @include('frontend.profile.update-location-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    </div>
    <!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection

@section('js')
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
@endsection
