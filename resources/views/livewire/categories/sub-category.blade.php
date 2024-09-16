<div class="category-content">
    <div class="scroll-subcategories subcategories_hovered" style="box-shadow: none">
        @if(isset($category) && is_array($category) && array_key_exists('subcategories', $category) && !empty($category['subcategories']))
            @if($category['slug']==='garage-sale')
                @include('livewire.categories.category-fields-garage-sale')
            @else
                @include('livewire.categories.subcategory-container')
            @endif
        @else
            <h1 class="text-center">Advertisement</h1>
        @endif
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JavaScript -->
    <script>
        $(document).ready(function () {
            $('body').on('mouseleave', '.subcategories_hovered', function () {
                Livewire.dispatch('loadSubcategories', {categoryId: 'mouseleft'});
            });
        });
    </script>
</div>
