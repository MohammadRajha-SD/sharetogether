<ul class="list-group">
    @foreach($subcategories as $subcategory)
        <li class="list-group-item">
            <h6>{{ $subcategory['name'] }}</h6>
            @if(isset($subcategory['subcategories']) && count($subcategory['subcategories']) > 0)
                <ul class="list-group ml-3">
                    @foreach($subcategory['subcategories'] as $subsubcategory)
                        <li class="list-group-item">
                            <p>{{ $subsubcategory['name'] }}</p>
                            @if(isset($subsubcategory['subcategories']) && count($subsubcategory['subcategories']) > 0)
                                @include('frontend.subcategories', ['subcategories' => $subsubcategory['subcategories']])
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
