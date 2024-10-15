<div class="d-flex align-center gap-3 overflow-x-auto mx-2">
    @foreach ($categories as $category)
    <div>
        <p>{{$category}}</p>
    </div>
    @endforeach
</div>