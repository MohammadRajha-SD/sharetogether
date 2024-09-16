<div class="card " style="box-shadow:none; ">
    <div class="card-body">
        <div class="tabs-menu">
            <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                <li class="">
                    <a href="#profile-info" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i
                                class="las la-user-circle tx-16 mr-1"></i></span> <span
                            class="hidden-xs">Profile Info</span> </a>
                </li>
                <li class="">
                    <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                class="las la-cog tx-16 mr-1"></i></span> <span
                            class="hidden-xs">SETTINGS</span> </a>
                </li>
                <li class="">
                    <a href="#location" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                class="las la-map-marker-alt tx-16 mr-1"></i></span> <span
                            class="hidden-xs">Location</span> </a>
                </li>
                <li class="">
                    <a href="#real-estate" data-toggle="tab" aria-expanded="false"> 
                        <span class="visible-xs"><i class="fas fa-home tx-16 mr-1"></i></span> 
                        <span class="hidden-xs">Real Estate</span> </a>
                </li>
            </ul>
        </div>

        <div class="tab-content border-left border-bottom border-right border-top-0 p-4"
            style="overflow-y: scroll;">
            <div class="tab-pane " id="profile-info">
                @include('frontend.profile.tabs.profile-info')
            </div>

            <div class="tab-pane " id="settings">
                @include('frontend.profile.tabs.update-password-form')
            </div>

            <div class="tab-pane active" id="location">
                @include('frontend.profile.tabs.update-location-form')
            </div>

            <div class="tab-pane " id="real-estate">
                @include('frontend.profile.tabs.real-estate')
            </div>
        </div>
    </div>
</div>