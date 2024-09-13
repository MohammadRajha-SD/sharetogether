@php
    $main_categories = config('categories')['main-categories'];
@endphp
<div class="horizontal-main hor-menu clearfix side-header">
    <div class="d-flex align-items-center justify-content-center my-3">
        @foreach($main_categories as $main_category)
            <a href="#{{$main_category['slide_to']}}" data-category-id="{{$main_category['category_id']?? null}}" class="main-category-clicked box border-right-1 px-2 mx-1 btn btn-danger rounded text-black font-weight-bold" style="cursor:pointer;width:110px;">{{$main_category['name']}}</a>
        @endforeach
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JavaScript -->
<script>
    $(document).ready(function () {
        // Event delegation for dynamic elements

        $('body').on('click', '.main-category-clicked', function () {
            const categoryId = $(this).data('category-id');
            Livewire.dispatch('loadSubcategories', { categoryId: categoryId });
        });
    });
</script>
