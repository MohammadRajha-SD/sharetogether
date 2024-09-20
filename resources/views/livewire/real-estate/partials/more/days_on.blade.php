<div class="col-12 border-bottom mt-3">
    <div class="form-group">
        <label>Days on</label>
        <div class="btn-group d-flex my-3" role="group" aria-label="Days on button group">
            <button type="button" class="btn {{$daysOn == null ? 'btn-secondary' : 'btn-outline-secondary'}} p-1" wire:click="daysOnChanged(null)">Any</button>
            <button type="button" class="btn {{$daysOn == 1 ? 'btn-secondary' : 'btn-outline-secondary'}} p-1" wire:click="daysOnChanged(1)">Today</button>
            <button type="button" class="btn {{$daysOn == 7 ? 'btn-secondary' : 'btn-outline-secondary'}} p-1" wire:click="daysOnChanged(7)">7</button>
            <button type="button" class="btn {{$daysOn == 14 ? 'btn-secondary' : 'btn-outline-secondary'}} p-1" wire:click="daysOnChanged(14)">14</button>
            <button type="button" class="btn {{$daysOn == 21 ? 'btn-secondary' : 'btn-outline-secondary'}} p-1" wire:click="daysOnChanged(21)">21</button>
            <button type="button" class="btn {{$daysOn == 30 ? 'btn-secondary' : 'btn-outline-secondary'}} p-1" wire:click="daysOnChanged(30)">30</button>
        </div>
    </div>
</div>
