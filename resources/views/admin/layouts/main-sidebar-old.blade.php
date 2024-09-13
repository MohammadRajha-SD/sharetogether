<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header ">
        <a class="desktop-logo logo-light active" style="margin:0 auto 55px auto;" href="{{ url('/' . $page='index') }}">
            <img src="{{URL::asset('images/logo.png')}}" class="main-logo" alt="logo" style="width:100px;height:auto;"/>
        </a>
    </div>

    <div class="main-sidemenu mt-3">
        <ul class="side-menu">
            {{-- Managing Categories --}}
            <li class="side-item side-item-category">Manage Category</li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                        <path
                            d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>
                    </svg>
                    <span class="side-menu__label">Manange Category</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <x-admin.li name="categories" route="admin.categories.index"/>
                    <x-admin.li name="sub categories" route="admin.sub-categories.index"/>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . $page='icons') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path
                            d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z"
                            opacity=".3"/>
                        <circle cx="15.5" cy="9.5" r="1.5"/>
                        <circle cx="8.5" cy="9.5" r="1.5"/>
                        <path
                            d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/>
                    </svg>
                    <span class="side-menu__label">Icons</span></a>
            </li>

            <li class="side-item side-item-category">Manage Category</li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                        <path
                            d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>
                    </svg>
                    <span class="side-menu__label">Manange Category</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <x-admin.li name="categories" route="admin.categories.index"/>
                    <x-admin.li name="sub categories" route="admin.sub-categories.index"/>
                </ul>
            </li>
        </ul>
    </div>
</aside>
