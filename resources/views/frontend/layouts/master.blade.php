<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />
    <title> @yield('title', 'Home') </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('frontend.layouts.head')
    @livewireStyles
</head>

<body>
    @include('frontend.layouts.main-header')

    @if (!view()->yieldContent('is_community_page'))
        @if (request()->is('real-estate*'))
            @include('frontend.real-estate.header')
        @endif
    @endif

    @yield('content')

	@include('frontend.layouts.footer-scripts')
    @livewireScripts
    <x-frontend.flash />
</body>

</html>
