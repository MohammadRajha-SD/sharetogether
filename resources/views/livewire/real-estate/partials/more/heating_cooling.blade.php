<div class="col-12 border-bottom mt-3">
    <div class="form-group">
        <label>Healthing / cooling</label>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="central_air" wire:model="central_air" value="{{$central_air}}">
            <label class="form-check-label" for="central_air">Central air</label>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="central_heat" wire:model="central_heat" value="{{$central_heat}}">
            <label class="form-check-label" for="central_heat">Central heat</label>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="forced_air" wire:model="forced_air" value="{{$forced_air}}">
            <label class="form-check-label" for="forced_air">Forced air</label>
        </div>
    </div>
</div>