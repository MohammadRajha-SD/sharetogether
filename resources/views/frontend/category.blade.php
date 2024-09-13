<li>
    @if ($category->icon)
        <i class="fas {{$icon}} a-icon"></i>
    @endif
    <div class="category-item">{{ $category->name }}</div>
    @if ($category->subcategories->isNotEmpty())
        <ul class="subcategory-list">
            @foreach ($category->subcategories as $subcategory)
                @include('frontend.category', ['category' => $subcategory])
            @endforeach
        </ul>
    @endif
</li>
