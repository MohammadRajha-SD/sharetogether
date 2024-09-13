 <!-- main-sidebar -->
 <div class="profile-usermenu sidebar-sticky d-none d-md-block">
    <ul class="nav flex-column bg-white rounded">
        <h3 class="mb-3 px-2">Categories</h3>
        <li class="nav-item {{ request()->routeIs('home') && !request()->get('category') ? 'active' : ''}}">
            <a href="{{ route('home') }}" class="nav-link"> <i class="fa fa-list"></i> All </a>
        </li>

        @forelse ($categories as $category)
            <li class="nav-item {{ request()->get('category') == $category->slug ? 'active' : '' }}">
                <a href="/?category={{ $category->slug }}" class="nav-link">
                    <i class="{{ $category->icon }}"></i> {{ ucwords($category->name) }}
                </a>
            </li>
        @empty
            <p>No Categories..</p>
        @endforelse
    </ul>
</div>
<!-- main-sidebar -->

<!-- Dropdown for small screens -->
<div class="d-block d-md-none">
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle w-100" type="button" id="categoriesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ request()->route('post') !== null ? ucwords(request()->route('post')) : 'All Categories'}}
        </button>
        <div class="dropdown-menu w-100" aria-labelledby="categoriesDropdown">
            <a class="dropdown-item {{ request()->routeIs('home') ? 'active' : ''}}" href="{{ route('home') }}"> <i class="fa fa-list"></i> All </a>
            <a class="dropdown-item" href="{{ route('home') }}"> <i class="fa fa-list"></i> Daycare </a>
            @forelse ($categories as $category)
                <a class="dropdown-item {{ request()->routeIs('posts.show') ? 'active' : '' }}" href="{{ route('posts.show', $category->slug) }}"> <i class="{{ $category->icon }}"></i> {{ ucwords($category->name) }} </a>
            @empty
                <p>No Categories..</p>
            @endforelse
        </div>
    </div>
</div>
