<ul class="category-sidebar nav flex-column " >
    @php
        $categories = config('categories')['categories'];
        $menuItems = [
            ['name' => trans('header.home'), 'icon' => 'bi-house', 'route' => '#'],
            ['name' => trans('header.home_business'), 'icon' => 'bi-briefcase', 'route' => 'login'],
            ['name' => trans('header.notifications'), 'icon' => 'bi-bell', 'route' => 'login'],
            ['name' => trans('header.help_hands'), 'icon' => 'bi-heart', 'route' => 'login'],
            ['name' => trans('header.chats'), 'icon' => 'bi-chat', 'route' => 'login'],
        ];
    @endphp

    @foreach ($menuItems as $item)
        <li class="nav-item nav-item-category mb-1 d-flex align-items-center justify-content-center">
            <a class="nav-link nav-link-category d-flex align-items-center" href="{{ $item['route']!== '#' ? route($item['route']) : '#'}} ">
                <i class="fa {{ $item['icon'] }} pr-2 icon"></i>
                <span class="fw-bold">{{ $item['name'] }}</span>
            </a>
        </li>
    @endforeach
    <li class="seprator"></li>

    @forelse ($categories as $category)
        <li class="nav-item nav-item-category mb-1 d-flex align-items-center justify-content-center category_hovered"
            data-category-id="{{ $category['id'] }}">
            <a class="nav-link nav-link-category d-flex align-items-center " href="#">
                <i class="bi {{ $category['icon'] }} pr-2 icon"></i>
                <span class="fw-bold ">{{ ucwords($category['name']) }}</span>
            </a>
        </li>
    @empty
        <p>No Categories..</p>
    @endforelse

    <li class="nav-item nav-item-category mb-1 d-flex align-items-center justify-content-center">
        <a class="nav-link nav-link-category d-flex align-items-center btn btn-danger" href="#">
            <i class="bi bi-plus pr-2"></i>
            <span class="fw-bold ">Post</span>
        </a>
    </li>
</ul>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('body').on('mouseenter', '.category_hovered', function() {
            const categoryId = $(this).data('category-id');
            Livewire.dispatch('loadSubcategories', {
                categoryId: categoryId
            });
        });
    });
</script>
