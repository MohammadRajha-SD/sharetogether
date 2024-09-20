<div class="col-12 border-bottom mt-3">
    <div class="form-group">
        <label>Parking</label>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="carport" wire:model="carport" value="{{$carport}}">
            <label class="form-check-label" for="carport">Carport</label>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="rv_boat_parking" wire:model="rv_boat_parking" value="{{$rv_boat_parking}}" />
            <label class="form-check-label" for="rv_boat_parking">RV Boat Parking</label>
        </div>
    </div>
</div>