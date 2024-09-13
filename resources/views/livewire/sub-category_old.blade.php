<div>
    <style>
        .scroll-subcategories {
            height: 500px;
            overflow-y: auto;
        }
    </style>

    <div class="scroll-subcategories">
        @if(isset($category) && is_array($category) && array_key_exists('subcategories', $category) && !empty($category['subcategories']))
            @foreach($category['subcategories'] as $sub)
                <div class="category-content card" style="margin-bottom:1px; box-shadow:none;">
                    <div class="card-header">
                        <h4 class="text-danger">
                            {{--                            <i class="fas fa-arrow-right text-sm"></i>--}}
                            {{$sub['name']}}
                        </h4>
                    </div>

                    @if(isset($sub) && is_array($sub) && array_key_exists('subcategories', $sub) && !empty($sub['subcategories']))
                        <div class="divider"></div>

                        <div class="card-body">
                            @foreach(array_chunk($sub['subcategories'], 2) as $chunk)
                                <div class="submenu-section">
                                    <div class="category-section">
                                        @foreach($chunk as $child)
                                            <div class="{{ $loop->last && count($chunk) % 2 != 0 ? 'w-100' : '' }}">

                                                <h6>{{ $child['name'] }}</h6>
                                                <p>
                                                    @if(isset($child['subcategories']) && !empty($child['subcategories']))
                                                        @foreach($child['subcategories'] as $subchild)
                                                            {{ $subchild['name'] }} @if(!$loop->last) <b>|</b> @endif
                                                        @endforeach
                                                    @endif
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        @endif


    </div>
</div>
