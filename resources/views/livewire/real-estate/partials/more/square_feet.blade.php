<div class="col-12 border-bottom mt-3">
    <h5 class="card-title">Square Feet</h5>
    <div class="row my-3">
        <div class="col-12  mt-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text text-sm">sqft</span>
                </div>
                
                <input type="number" class="form-control" min="0" placeholder="No min" wire:model.live="min_sqft"  wire:change.debounce="validateSquareFeet"/>
            </div>
        </div>

        <div class="col-12  mt-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">sqft</span>
                </div>  

                <input type="number" class="form-control {{ $is_valid_sqft === false ? 'border-danger' : '' }}" placeholder="No max" wire:model.defer="max_sqft" wire:change.debounce="validateSquareFeet" />
            </div>
        </div>
    </div>
    </div>