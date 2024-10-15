<div class="exchange-market-content">
    @section('title', 'Store Items')
    <div class="card-header border-bottom mb-2" style="padding: 10px 0px 0px 10px;">
        @livewire('exchanges.store-header', key('exchanges.store_header'))

        <div class="card-header border-top d-flex align-items-center p-2">
            <a href="{{route('exchange.stores')}}" class="btn btn-danger"><i class="fa fa-arrow-left"></i></a>
            <img src="{{ asset($store->image->path) }}" alt="" width="50" height="50" style="border-radius: 40px;" />
            <h4 class="text-danger  mx-2 mt-1 border-top-2">{{ ucwords($store->name) }}</h4>
        </div>
    </div>
    @if($store->items()->count())
    <div class="row m-0 overflow-auto" style="height: calc(100vh - 160px);">
        @foreach ($store->items as $item)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-4"
                style="box-shadow: none; height: 200px; display: flex; flex-direction: column; justify-content: space-between;">
                <!-- Card Header -->
                <div class="card-header border-bottom d-flex align-items-center p-2">
                    <h6 class="mx-2 mt-1">{{ ucwords($item->name) }}</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <p>{{ $item->address }}</p>
                    <p class="card-text">{{ $item->description }}</p>
                </div>

                <!-- Card Footer -->
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <p class="card-text">Price: <strong class="text-danger">${{ $item->price }}</strong></p>
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