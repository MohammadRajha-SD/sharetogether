<ul class="category-sidebar nav flex-column">
    @php
        $categories = config('categories')['categories'];
    @endphp

    @forelse ($categories as $category)
        <li class="nav-item nav-item-category mb-2 d-flex align-items-center justify-content-center category_hovered"  data-category-id="{{ $category['id'] }}">
            <a class="nav-link nav-link-category d-flex align-items-center " href="#" >
                <i class="bi {{$category['icon']}} pr-2 icon"></i>
                <span class="fw-bold ">{{ucwords($category['name'])}}</span>
            </a>
        </li>
    @empty
        <p>No Categories..</p>
    @endforelse

    <li class="nav-item nav-item-category mb-2 d-flex align-items-center justify-content-center">
        <a class="nav-link nav-link-category d-flex align-items-center btn btn-dange" href="#">
            <i class="bi bi-plus pr-2"></i>
            <span class="fw-bold ">Post</span>
        </a>
    </li>
</ul>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('body').on('mouseenter', '.category_hovered', function () {
            const categoryId = $(this).data('category-id');
            Livewire.dispatch('loadSubcategories', { categoryId: categoryId });
        });
    });
</script>