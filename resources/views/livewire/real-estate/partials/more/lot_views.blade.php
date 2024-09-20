<div class="col-12 border-bottom mt-3">
    <div class="form-group">
        <label>Lot / Views</label>
        @foreach($lot_views as $key => $value)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="{{ $key }}" wire:model="{{ 'lot_views.' . $key }}"
                value="{{ $key }}">
            <label class="form-check-label" for="{{ $key }}">{{ ucwords(str_replace('_', ' ', $key)) }}</label>
        </div>
        @endforeach
    </div>
</div>