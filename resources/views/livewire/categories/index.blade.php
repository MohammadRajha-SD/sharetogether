<div>
    @php
        $categories = config('categories')['categories'];
    @endphp
    <div class="list-group mt-3">
        @forelse ($categories as $category)
            <div class="list-group-item category-item category_hovered"
                data-category-id="{{ $category['id'] }}">
                <a href="#" class="text-dark sidebar-link">
                    <i class="fas {{ $category['icon'] }} pr-2"></i>
                    {{ ucwords($category['name']) }}
                </a>
            </div>
        @empty
            <p>No Categories..</p>
        @endforelse
    </div>
    <button class="btn btn-info w-100 mt-4  sidebar-link ">
           Post
    </button>

    <!-- Dropdown for small screens -->
    {{--    <div class="d-block d-md-none">--}}
    {{--        <div class="dropdown">--}}
    {{--            <button class="btn btn-primary dropdown-toggle w-100" type="button" id="categoriesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
    {{--                {{ request()->route('post') !== null ? ucwords(request()->route('post')) : 'All Categories'}}--}}
    {{--            </button>--}}
    {{--            <div class="dropdown-menu w-100" aria-labelledby="categoriesDropdown">--}}
    {{--                <a class="dropdown-item {{ request()->routeIs('home') ? 'active' : ''}}" href="{{ route('home') }}"> <i class="fa fa-list"></i> All </a>--}}
    {{--                @forelse ($categories as $category)--}}
    {{--                    <a class="dropdown-item {{ request()->routeIs('posts.show') ? 'active' : '' }}" href="{{ route('posts.show', $category->slug) }}"> <i class="{{ $category->icon }}"></i> {{ ucwords($category->name) }} </a>--}}
    {{--                @empty--}}
    {{--                    <p>No Categories..</p>--}}
    {{--                @endforelse--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JavaScript -->
<script>
    $(document).ready(function () {
        // Event delegation for dynamic elements
        $('body').on('mouseenter', '.category_hovered', function () {
            const categoryId = $(this).data('category-id');
            Livewire.dispatch('loadSubcategories', { categoryId: categoryId });
        });
    });
</script>
