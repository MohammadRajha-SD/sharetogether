<div class="exchange-market-content">
    @section('title', 'Exchange Market Requests')

    <div class="card-header border-bottom mb-3" style="padding: 10px 0px 0px 10px;">
        <h2 class="text-danger">Your Requested Products</h2>
    </div>

    <div class="row m-0">
        @if($requested_products->isEmpty())
        <p>You have no requested products.</p>
        @else
        @foreach($requested_products as $exchange)
        <div class="col-md-6">
            <div class="card mb-4" style="box-shadow: none;">
                <div class="card-header border-bottom">
                    <h4>Requested by: {{ ucwords($exchange->user->name) }}</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $exchange->productRequested->name }}</h5>
                    <p class="card-text">{{ $exchange->productRequested->description }}</p>
                    <p class="card-text">Offered Product: 
                        <strong class="text-primary" wire:click='ShowProduct({{$exchange->productOffered->id}})' style="cursor: pointer">{{$exchange->productOffered->name }}</strong></p>
                    <p class="card-text">Status: <span  class="px-2 py-1 badge badge-{{setStatus($exchange->status)}}">{{
                            ucfirst($exchange->status) }}</span></p>

                    <!-- Chat Button -->
                    <button type="button" class="btn btn-primary "
                        wire:click="openChat({{ $exchange->id }})">Chat</button>

                    <!-- Accept Button -->
                    @if ($exchange->status != 'accepted')
                    <button type="button" class="btn btn-success "
                        wire:click="acceptExchange({{ $exchange->id }})">Accept</button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        <!-- Modal Structure -->
        <div class="modal fade" id="simpleModal" tabindex="-1" aria-labelledby="simpleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="simpleModalLabel">Simple Modal Title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        This is a simple modal example. You can place any content here.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>