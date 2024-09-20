<div class="col-12 border-bottom mt-3">
    <h5 class="card-title">Garage</h5>
    <div class="d-flex my-3">
        <div class="btn-group" role="group" aria-label="Garage">
            <button type="button"  class="btn {{$garage == 0 ? 'btn-secondary' : 'btn-outline-secondary'}}" wire:click="garageChanged(0)">Any</button>
            <button type="button"  class="btn {{$garage == 1 ? 'btn-secondary' : 'btn-outline-secondary'}}" wire:click="garageChanged(1)">1+</button>
            <button type="button"  class="btn {{$garage == 2 ? 'btn-secondary' : 'btn-outline-secondary'}}" wire:click="garageChanged(2)">2+</button>
            <button type="button"  class="btn {{$garage == 3 ? 'btn-secondary' : 'btn-outline-secondary'}}" wire:click="garageChanged(3)">3+</button>
        </div>
    </div>
</div>