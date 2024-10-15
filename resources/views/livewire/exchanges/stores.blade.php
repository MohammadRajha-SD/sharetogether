<div class="exchange-market-content">
    @section('title', 'Shop Essentials')
    <div class="card-header border-bottom mb-2" style="padding: 10px 0px 0px 10px;">
        @livewire('exchanges.store-header', key('exchanges.store_header'))

        <h2 class="text-danger pt-2 border-top-2">Shop Essentials</h2>
    </div>

    @if($stores->count())
    <div class="row m-0 overflow-auto" style="height: calc(100vh - 160px);">
        @foreach ($stores as $store)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-4" style="box-shadow: none; height: 200px; display: flex; flex-direction: column; justify-content: space-between;">
                <!-- Card Header -->
                <div class="card-header border-bottom d-flex align-items-center p-2">
                    <img src="{{ asset($store->image->path) }}" alt="" width="30" height="30"
                        style="border-radius: 40px;" />
                    <h6 class="mx-2 mt-1">{{ ucwords($store->name) }}</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <p>{{ $store->address }}</p>
                </div>

                <!-- Card Footer -->
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <small class="text-muted">Last updated: {{ $store->updated_at->diffForHumans() }}</small>

                    <!-- Button to Show Store Items -->
                    <a href="{{ route('exchange.store.items', $store->id) }}" class="btn btn-primary btn-sm">
                        View Items
                    </a>
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