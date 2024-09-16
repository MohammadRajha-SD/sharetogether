<div class="category-content">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .category-list {
            background-color: #f8f9fa;
            height: 100vh;
            padding: 0;
            overflow-y: auto;
            /* Enables scrolling */
        }

        .category-list .list-group-item {
            cursor: pointer;
        }

        .category-list .list-group-item.active {
            background-color: #dc3545;
            color: white;
        }

        .content {
            padding: 20px;
            background-color: #ffffff;
            border-left: 1px solid #dee2e6;
            overflow-y: auto;
            /* Enables scrolling */
            max-height: 100vh;
        }

        .content h5 {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .content ul {
            padding-left: 20px;
        }

        .content ul li {
            line-height: 1.8;
        }
    </style>

    <div class="scroll-subcategories subcategories_hovered" style="box-shadow: none">
        @if (isset($category) &&
                is_array($category) &&
                array_key_exists('subcategories', $category) &&
                !empty($category['subcategories']))
            @if ($category['slug'] === 'garage-sale')
                @include('livewire.categories.category-fields-garage-sale')
            @else
                <div class="content">
                    <div class="row">
                        @foreach ($category['subcategories'] as $subcategory)
                            <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                                <h5 class="text-danger">{{ $subcategory['name'] }}</h5>
                                @if (isset($subcategory) && is_array($subcategory) && array_key_exists('subcategories', $subcategory) && !empty($subcategory['subcategories']))
                                    <ul class="list-unstyled">
                                        @foreach ($subcategory['subcategories'] as $sub)
                                            <li class="text-info"><strong>{{ $sub['name'] }}</strong></li>
                                            @if (isset($sub) && is_array($sub) && array_key_exists('subcategories', $sub) && !empty($sub['subcategories']))
                                                @foreach ($sub['subcategories'] as $minichild)
                                                    {{ $minichild['name'] }} 
                                                    @if (!$loop->last) <b>|</b> @endif
                                                @endforeach
                                                @else
                                                    {{ $sub['name'] }} @if (!$loop->last)
                                                        <b>|</b>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @else
            <h1 class="text-center">Advertisement</h1>
        @endif
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JavaScript -->
    <script>
        $(document).ready(function() {
            $('body').on('mouseleave', '.subcategories_hovered', function() {
                Livewire.dispatch('loadSubcategories', {
                    categoryId: 'mouseleft'
                });
            });
        });
    </script>
</div>
