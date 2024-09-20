<div class="col-12 border-bottom mt-3">

<h5 class="card-title">Home Age</h5>
<div class="row my-3">
    <div class="col-12 mt-2">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text text-sm">Year/s</span>
            </div>
            <input type="number" class="form-control" min="0" placeholder="No min" wire:model.live="min_home_age"  wire:change.debounce="validateHomeAge"/>
        </div>

    </div>
    <div class="col-12 mt-2">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Year/s</span>
            </div>  
            <input type="number" class="form-control {{ $is_valid_home_age === false ? 'border-danger' : '' }}" placeholder="No max" wire:model.defer="max_home_age" wire:change.debounce="validateHomeAge" />
        </div>
    </div>
</div>
</div>