@php
$locales = LaravelLocalization::getSupportedLocales();
$currentLocale = LaravelLocalization::getCurrentLocale();
unset($locales[$currentLocale]);

$main_categories = config('categories')['main-categories'];
@endphp

<style>
    @media(max-width:1024px) {

        #navbar-categories a,
        #navbar-categories button {
            padding: 15px;
        }
    }

    @media (max-width: 769px) {

        #navbar-categories a,
        #navbar-categories button {
            padding: 5px;
            font-weight: normal !important;
        }

        .logo {
            margin-left: 20px;
            width: 50px;
            height: 50px;
            user-select: none;
        }

        .custom-gap {
            gap: 10px;
        }
    }

    @media (max-width: 426px) {

        #navbar-categories {
            display: none !important;
        }

        .logo {
            margin-left: 36px;
            width: 50px;
            height: 50px;
            user-select: none;
        }

        .custom-gap {
            gap: 10px;
        }
    }
</style>

<div class="main-header nav nav-item hor-header">
    <div class="container">
        <div class="main-header-left">
            <!-- sidebar-toggle-->
            <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>
            <a class="header-brand" href="{{ route('home') }}">
                <img src="{{ URL::asset('images/logo.png') }}" class="logo" width="60" height="60" />
            </a>
        </div>

        @if (request()->is('real-estate*'))
            @livewire('real-estate.header', key('real_estate_header_'))
        @elseif (request()->is('exchange*'))
            @livewire('exchanges.header', key('exchnages_header'))
        @else
        <ul class="d-flex align-items-center mt-2" id="navbar-categories">
            @foreach ($main_categories as $main_category)
            @if ($main_category['slug'] === 'homeless')
            <div class="dropdown">
                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary" data-toggle="dropdown"
                    id="dropdownMenuButton" type="button">
                    {{ $main_category['name'] }}<i class="fas fa-caret-down ml-1"></i>
                </button>
                <div class="dropdown-menu tx-13 custom-dropdown">
                    @livewire('chats.communities.join')
                </div>
            </div>
            @else
            <a href="#{{ $main_category['slide_to'] }}" data-category-id="{{ $main_category['category_id'] ?? null }}"
                class="main-category-clicked btn btn-danger mr-1 rounded text-black font-weight-bold">
                {{ $main_category['name'] }}</a>
            @endif
            @endforeach
        </ul>
        @endif

        <div class="main-header-right">
            {{-- languages start --}}
            <ul class="nav">
                <li class="">
                    <div class="dropdown  nav-itemd-none d-md-flex">
                        <a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown"
                            aria-expanded="false">
                            <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img
                                    src="{{ URL::asset('assets/img/flags/' . strtolower(LaravelLocalization::getCurrentLocaleName()) . '.jpg') }}"
                                    alt="img"></span>
                            <div class="my-auto"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                            @foreach ($locales as $localeCode => $properties)
                            <a class="dropdown-item d-flex" rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <span class="avatar mr-3 align-self-center bg-transparent"><img
                                        src="{{ URL::asset('assets/img/flags/' . strtolower($properties['name']) . '.jpg') }}"
                                        alt="img"></span>
                                <span class="mt-2">{{ $properties['native'] }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
            {{-- languages end --}}

            <div class="nav nav-item  navbar-nav-right ml-auto custom-gap ">
                @if (auth()->user())
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href="">
                        <img alt="" src="{{ asset(check_image(auth()->user())) }}">
                    </a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-2">
                            <div class="d-flex wd-100p">
                                <div class="image-user"><img alt="" src="{{ asset(check_image(auth()->user())) }}"
                                        class=""></div>
                                <div class="ml-2 my-auto">
                                    <h6>{{ auth()->user()->username }}</h6>
                                    <span>{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>

                        @if (auth()->user()->is_admin === 1)
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-user-circle"></i>{{ trans('header.dashboard') }}</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('profile.index') }}"><i class="bx bx-user-circle"></i>{{
                            trans('header.profile') }}</a>
                        <a class="dropdown-item" href="{{ route('settings.index') }}"><i class="bx bx-cog"></i>{{
                            trans('header.settings') }}</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="bx bx-log-out"></i>
                                {{ trans('header.logout') }}
                            </a>
                        </form>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="nav-link border-right link-login pr-2" {{
                    trans('main-header.login') }}</a>
                    <a href="{{ route('register') }}" class="nav-link" {{ trans('main-header.register') }}</a>
                        @endif
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JavaScript -->
<script>
    $(document).ready(function() {
        $('body').on('click', '.main-category-clicked', function() {
            const categoryId = $(this).data('category-id');
            Livewire.dispatch('loadSubcategories', {
                categoryId: categoryId
            });
        });
    });
</script>