<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
		<title> @yield('title', 'Home')  </title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
		@include('frontend.layouts.head')
		@livewireStyles
	</head>

	<body class="main-body" >
		<!-- Loader -->
		<div id="global-loader">
            <img src="{{asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		@include('frontend.layouts.main-header')

		@if (!view()->yieldContent('is_community_page'))
			@if(request()->is('real-estate*'))
				@include('frontend.real-estate.header')
			@else
				@include('frontend.categories.header')
			@endif
		@endif

		<!-- main-content opened -->
		<div class=" {{!view()->yieldContent('is_community_page') ? 'main-content horizontal-content ' : 'pt-5 mt-4'}}" style="">
			<!-- container opened -->
			<div class="{{request()->is('real-estate.index') ? '' : 'container'}}">
				@yield('page-header')
				@yield('content')

				{{-- @include('frontend.layouts.sidebar-right') --}}
				{{-- @include('frontend.layouts.models') --}}
				@include('frontend.layouts.footer-scripts')

			    <x-frontend.flash />
				
				@livewireScripts
            </div>
        </div>
	</body>
</html>
