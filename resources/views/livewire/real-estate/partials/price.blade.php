<div>
    <style>
        .dropdown-menu-custom-price {
            padding: 20px;
            width: 300px;
        }

        .btn-filter {
            align-items: center;
            background-image: none;
            cursor: pointer;
            display: inline-flex;
            gap: 8px;
            -webkit-box-pack: center;
            justify-content: center;
            line-height: 1;
            touch-action: manipulation;
            transition: background-color 100ms cubic-bezier(0.5, 0, 0.2, 1), color 100ms cubic-bezier(0.5, 0, 0.2, 1), border-color 100ms cubic-bezier(0.5, 0, 0.2, 1);
            user-select: none;
            white-space: nowrap;
            vertical-align: middle;
            font-size: 16px;
            border-radius: 40px;
            border: 1px solid rgb(26, 24, 22);
            text-decoration: none;
            height: 48px;
            padding: 0px 24px;
            font-weight: 500;
            color: rgb(26, 24, 22);
            background-color: rgb(255, 255, 255);
            width: 150px;
        }
    </style>

    <div class="dropdown">
        <button class="btn-filter dropdown-toggle" type="button" id="dropdownMenuButtonPrice" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" wire:click="toggleShow">
            {{ $price > 0 ? $price : 'Price' }}
            
        </button>

        <div class="dropdown-menu dropdown-menu-custom-price {{ $is_show ? 'show' : '' }}" aria-labelledby="dropdownMenuButtonPrice">
            <div class="d-flex justify-content-between mb-3">
                <span>Price</span>
                <a href="#" wire:click.prevent="submit" class="text-primary">Done</a>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" class="form-control" min="0" wire:model.live="min_price"
                            placeholder="No min" />
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" class="form-control {{ $is_valid === false ? 'border-danger' : '' }}"
                            min="{{ $min_price }}" wire:model.defer="max_price" placeholder="No max"
                            wire:change.debounce="validateMaxPrice" />

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
