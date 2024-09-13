@if(isset($selected_category) && count($selected_category) > 0)
    <div class="col-12 mx-1 my-3 gap-2">
        @foreach ($selected_category as $category)
            <a href="?{{http_build_query(request()->except('sub_category'))}}&sub_category={{$category->slug}}" class="badge bg-danger py-2 text-white" style="margin:2px 0;">{{ $category->name }}</a>
        @endforeach
    </div>
@endif
