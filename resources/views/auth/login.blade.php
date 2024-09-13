@extends('frontend.layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The content half -->
				<div class="col-12  bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>Welcome back!</h2>
												<h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5>
												<form action="{{route('login')}}" method="POST">
													@csrf
													<div class="form-group">
														<label>Email or Phone</label> 
														<input class="form-control" name="login" placeholder="Enter your email or phone" type="text">
													</div>
													<div class="form-group">
														<label>Password</label> 
														<input class="form-control" placeholder="Enter your password" type="password" name="password">
													</div><button class="btn btn-main-primary btn-block">Sign In</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<a href="{{route('auth.facebook.redirect')}}" class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</a>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<a href="{{route('auth.google.redirect')}}" class="btn btn-secondary btn-block"><i class="fab fa-google"></i> Signup with Google</a>
														</div>
													</div>
												</form>
												<div class="main-signin-footer mt-5">
													{{-- todo: --}}
													{{-- <p><a href="">Forgot password?</a></p> --}}
													<p>Don't have an account? <a href="{{ route('register') }}">Create an Account</a></p>
												</div>
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
@endsection
@section('js')
@endsection