<div class="card">
    <div class="container"  style="margin-top: 60px">
        <h1 class="mt-2">Exchange Market</h1>

        @if($stores->count())
        <div class="row">
            @foreach($stores as $store)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center">
                        <img src="{{ asset($store->image->path) }}" class="card-img-top mr-2" alt="{{ $store->name }}"
                            style="width: 40px; height: 40px; object-fit: cover; border-radius:40px">
                        <strong>{{ $store->name }}</strong>
                    </div>
                    <div class="card-body">
                        <p>{{ $store->address }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated: {{ $store->updated_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-warning" role="alert">
            No nearby stores found.
        </div>
        @endif
    </div>
</div>