@extends('frontend.layouts.master2')
@section('css')
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect.css')}}">
{{-- <link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.css')}}"> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The content half -->
				<div class="col-md-12 col-lg-12 col-xl-12 bg-white">
					<div class="login d-flex align-items-center py-2 ">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row ">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
											<div class="main-signup-header">
											<h2 class="text-primary">Get Started</h2>
											<h5 class="font-weight-normal mb-4">It's free to signup and only takes a minute.</h5>
											<form action="{{route('register')}}" method="POST">
												@csrf
												<div class="row">
													<x-frontend.form.input name="latitude" type="hidden" />
													<x-frontend.form.input name="longitude" type="hidden" />

													<x-frontend.form.input name="name"  />
													<x-frontend.form.input name="username" />
													<x-frontend.form.input name="email" type="email" />
													<x-frontend.form.input name="password" type="password" />
													{{-- <x-frontend.form.phone name="phone" /> --}}
													<x-frontend.form.input name="phone" />


													<x-frontend.form.select name="occupation" :data="$occupations"/>
													<x-frontend.form.multi-select name="interests" :data="$categories" />

                                                    <div class="form-group col-md-6 col-sm-12 col-lg-6">
                                                        <p class="mg-b-10">Country</p>
                                                        <select class="form-control" name="country" id="country" required>
                                                            <option value="" selected >Select</option>
                                                            @foreach ($countries as $d)
                                                                <option value="{{$d['id']}}">{{ucwords($d['name'])}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6 col-sm-12 col-lg-6">
                                                        <p class="mg-b-10">State</p>
                                                        <select class="form-control" name="state" id="state" required>
                                                            <option value="" selected >Select</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6 col-sm-12 col-lg-6">
                                                        <p class="mg-b-10">City</p>
                                                        <select class="form-control" name="city" id="city" required>
                                                            <option value="" selected >Select</option>
                                                        </select>
                                                    </div>

                                                </div>

												<button class="btn btn-main-primary btn-block">Create Account</button>
												{{-- <div class="row row-xs">
													<div class="col-sm-6">
														<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
													</div>
													<div class="col-sm-6 mg-t-10 mg-sm-t-0">
														<button class="btn btn-secondary btn-block"><i class="fab fa-google"></i> Signup with Google</button>
													</div>
												</div> --}}
											</form>

											<div class="main-signup-footer mt-5">
												<p>Already have an account? <a href="{{route('login')}}">Login</a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
        <script>
            $(document).ready(function() {
                $('#country').on('change', function() {
                    let countryId = $(this).val();
                    $('#state').html('<option value="">Select State</option>');
                    $('#city').html('<option value="">Select City</option>');

                    if (countryId) {
                        $.ajax({
                            url: '/get-states/' + countryId,
                            type: 'GET',
                            success: function(states) {
                                $.each(states, function(index, state) {
                                    $('#state').append('<option value="' + state.id + '">' + state.name + '</option>');
                                });
                            }
                        });
                    }
                });

                $('#state').on('change', function() {
                    let stateId = $(this).val();
                    $('#city').html('<option value="">Select City</option>');

                    if (stateId) {
                        $.ajax({
                            url: '/get-cities/' + stateId,
                            type: 'GET',
                            success: function(cities) {
                                $.each(cities, function(index, city) {
                                    $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                                });
                            }
                        });
                    }
                });
            });
        </script>

@endsection
@section('js')
{{-- <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script> --}}
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>

<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
{{-- <script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script> --}}
<script>
	document.addEventListener('DOMContentLoaded', (event) => {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				document.getElementById('latitude').value = position.coords.latitude;
				document.getElementById('longitude').value = position.coords.longitude;
			});
		}
	});
</script>


@endsection
