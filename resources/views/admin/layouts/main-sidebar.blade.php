<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header ">
        <a class="desktop-logo logo-light active" style="margin:0 auto 55px auto;"
           href="{{ url('/' . $page='index') }}">
            <img src="{{URL::asset('images/logo.png')}}" class="main-logo" alt="logo" style="width:100px;height:auto;"/>
        </a>
    </div>

    <div class="main-sidemenu">
        <ul class="side-menu mt-3">
            {{-- Managing Categories --}}
            <li class="side-item side-item-category">Dashboard</li>

            <x-admin.sidebar-dropdown name="locations">
                <x-admin.li name="countries" route="admin.countries.index"/>
                <x-admin.li name="states" route="admin.states.index"/>
                <x-admin.li name="cities" route="admin.cities.index"/>
                <x-admin.li name="towns" route="admin.towns.index"/>
            </x-admin.sidebar-dropdown>




{{--            <li class="slide">--}}
{{--                <a class="side-menu__item" href="{{ url('/' . $page='icons') }}">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">--}}
{{--                        <path d="M0 0h24v24H0V0z" fill="none"/>--}}
{{--                        <path--}}
{{--                            d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z"--}}
{{--                            opacity=".3"/>--}}
{{--                        <circle cx="15.5" cy="9.5" r="1.5"/>--}}
{{--                        <circle cx="8.5" cy="9.5" r="1.5"/>--}}
{{--                        <path--}}
{{--                            d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/>--}}
{{--                    </svg>--}}
{{--                    <span class="side-menu__label">Icons</span></a>--}}
{{--            </li>--}}
        </ul>
    </div>
</aside>
