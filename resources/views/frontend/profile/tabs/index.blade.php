<div class="card " style="box-shadow:none;" >
    <div class="card-body">
        <div class="tabs-menu">
            <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                <li class="nav-item">
                    <a href="#profile-info" data-toggle="tab" class="nav-link" aria-expanded="true">
                        <span>Profile Info</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings" data-toggle="tab" class="nav-link" aria-expanded="false">
                        <span>Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#location" data-toggle="tab" class="nav-link" aria-expanded="false">
                        <span>Location</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#real-estate" data-toggle="tab" class="nav-link" aria-expanded="false">
                        <span>Real Estate</span>
                    </a>
                </li>
            </ul>
        </div>
        

        <div class="tab-content border-left border-bottom border-right border-top-0 p-4" >
            <div class="tab-pane " id="profile-info">
                @include('frontend.profile.tabs.profile-info')
            </div>

            <div class="tab-pane " id="settings">
                @include('frontend.profile.tabs.update-password-form')
            </div>

            <div class="tab-pane " id="location">
                @include('frontend.profile.tabs.update-location-form')
            </div>

            <div class="tab-pane active" id="real-estate" >
                @livewire('real-estate.my-real-estate-posts')
            </div>
        </div>
    </div>
</div>