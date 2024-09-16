@foreach($category['subcategories'] as $sub)
    <div class="category-container" id="{{$sub['slug']}}">
        <div class="main-category">
            <div class="main-category-header">{{$sub['name']}}</div>
        </div>

        <div class="subcategory-list">
            @if(isset($sub) && is_array($sub) && array_key_exists('subcategories', $sub) && !empty($sub['subcategories']))
                @foreach($sub['subcategories'] as $child)
                    <div class="subcategory-item">
                        <div class="subcategory-title">{{$child['name']}}</div>
                        @if(isset($child) && is_array($child) && array_key_exists('subcategories', $child) && !empty($child['subcategories']))
                            @foreach($child['subcategories'] as $subchild)
                                @if(isset($subchild) && is_array($subchild) && array_key_exists('subcategories', $subchild) && !empty($subchild['subcategories']))
                                    <br/>
                                    <strong> {{$subchild['name']}} : </strong>
                                    @foreach($subchild['subcategories'] as $minichild)
                                        {{$minichild['name']}} @if(!$loop->last)
                                            <b>|</b>
                                        @endif
                                    @endforeach
                                    <br/>
                                @else
                                    {{$subchild['name']}} @if(!$loop->last)
                                        <b>|</b>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endforeach