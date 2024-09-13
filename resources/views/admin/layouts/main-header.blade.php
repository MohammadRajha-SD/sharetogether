
@php
    $locales = LaravelLocalization::getSupportedLocales();
    $currentLocale = LaravelLocalization::getCurrentLocale();
    unset($locales[$currentLocale]);
@endphp
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
        </div>

        <div class="main-header-right">
            <ul class="nav">
                <li class="">
                    <div class="dropdown  nav-itemd-none d-md-flex">
                        <a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown" aria-expanded="false">
                            <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/'.strtolower(LaravelLocalization::getCurrentLocaleName()).'.jpg')}}" alt="img"></span>
                            <div class="my-auto"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                            @foreach($locales as $localeCode => $properties)
                                <a class="dropdown-item d-flex" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <span class="avatar mr-3 align-self-center bg-transparent"><img src="{{URL::asset('assets/img/flags/'.strtolower($properties['name']).'.jpg')}}" alt="img"></span>
                                    <span class="mt-2">{{ $properties['native'] }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
            <div class="nav nav-item  navbar-nav-right ml-auto custom-gap ">
                @if (auth()->user())
                    <div class="dropdown main-profile-menu nav nav-item nav-link">
                        <a class="profile-user d-flex" href="">
                            <img alt="" src="{{asset(check_image(auth()->user()))}}">
                        </a>
                        <div class="dropdown-menu">
                            <div class="main-header-profile bg-primary p-2">
                                <div class="d-flex wd-100p">
                                    <div class="image-user"><img alt="" src="{{asset(check_image(auth()->user()))}}" class=""></div>
                                    <div class="ml-2 my-auto"><h6>{{auth()->user()->username}}</h6><span>{{auth()->user()->email}}</span></div>
                                </div>
                            </div>

                            @if(auth()->user()->is_admin === 1)
                                <a class="dropdown-item" href="{{ route('admin.dashboard')}}"><i class="bx bx-user-circle"></i>{{trans('header.dashboard')}}</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('profile.index') }}"><i class="bx bx-user-circle"></i>{{trans('header.profile')}}</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="bx bx-log-out"></i>
                                    {{trans('header.logout')}}
                                </a>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{route('login')}}" class="nav-link border-right link-login pr-2"{{trans('main-header.login')}}</a>
                    <a href="{{route('register')}}" class="nav-link"{{trans('main-header.register')}}</a>
                @endif
                {{-- <div class="dropdown main-header-message right-toggle">
                    <a class="nav-link pr-0" data-toggle="sidebar-right" data-target=".sidebar-right">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
