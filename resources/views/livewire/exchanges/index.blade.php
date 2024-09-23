<div class="exchange-market-content">
    <div class="card-header border-bottom mb-3" style="padding: 10px 0px 0px 10px;">
        <h2 class="text-danger">Available Products for Exchange</h2>
    </div>
    <div class="row m-0">
        @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-4" style="box-shadow: none">
                <div class="card-header border-bottom d-flex align-items-center p-2">
                    <img src="{{check_image($product->user)}}" alt="" width="30" height="30"
                        style="border-radius: 40px;" />
                    <h6 class="mx-1 mt-1">{{ ucwords($product->user->name) }}</h6>
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">Price: ${{ $product->price }}</p>

                    <!-- Button to trigger showing the card footer -->
                    <button type="button" class="btn btn-primary"
                        wire:click="setProductIdRequested({{ $product->id }})">Request Exchange</button>
                </div>

                <!-- Conditionally show the footer -->
                @if($visible_product_id == $product->id)
                <div class="card-footer">
                    <div class="form-group">
                        <label for="product_id_offered_{{ $product->id }}">Select the product you want
                            to offer in exchange:</label>
                        <select class="form-control" wire:model="product_id_offered">
                            <option value="" selected>Select</option>
                            @foreach(auth()->user()->products as $userProduct)
                            <option value="{{ $userProduct->id }}">{{ $userProduct->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary" wire:click='submit'>Exchange request</button>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>