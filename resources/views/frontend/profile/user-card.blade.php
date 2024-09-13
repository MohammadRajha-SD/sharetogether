<div class="card mg-b-20">
    <div class="card-body">
        <div class="pl-0">
            <div class="main-profile-overview">
                <div class="main-img-user profile-user">
                    <img alt="" src="{{asset(check_image($user))}}" />
                    <!-- Button to trigger modal -->
                    <a class="fas fa-camera profile-edit" href="JavaScript:void(0);" data-toggle="modal" data-target="#imageModal"></a>

                    <!-- Modal -->
                    @include('frontend.profile.modal')
                </div>

                <div class="d-flex justify-content-between mg-b-20">
                    <div>
                        <h5 class="main-profile-name">{{$user->name}}</h5>
                        <p class="main-profile-name-text">{{ucwords($user->details->occupation->name)}}</p>
                    </div>
                </div>

                <h6>Bio</h6>

                <div class="main-profile-bio"> {{$user->details->bio}} </div>
                <!-- main-profile-bio -->
                <div class="row">
                    <div class="col-md-4 col mb20">
                        <h5>947</h5>
                        <h6 class="text-small text-muted mb-0">Followers</h6>
                    </div>
                    <div class="col-md-4 col mb20">
                        <h5>583</h5>
                        <h6 class="text-small text-muted mb-0">Following</h6>
                    </div>
                    <div class="col-md-4 col mb20">
                        <h5>{{$user->postsCounted()}}</h5>
                        <h6 class="text-small text-muted mb-0">Posts</h6>
                    </div>
                </div>
            </div>
            <!-- main-profile-overview -->
        </div>
    </div>
</div>

<script>
    document.getElementById('profileImage').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var previewImage = document.getElementById('previewImage');
            previewImage.src = reader.result;
            previewImage.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    });

    document.getElementById('saveImage').addEventListener('click', function() {
        $('#imageModal').modal('hide');
    });
</script>

