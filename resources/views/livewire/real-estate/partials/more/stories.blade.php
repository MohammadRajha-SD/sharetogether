<div class="col-12 border-bottom mt-3">
    <h5 class="card-title">Stories</h5>
    <div class="btn-group my-3" role="group" aria-label="Stories">
        <button class="btn {{$story === '' ? 'btn-secondary' : 'btn-outline-secondary'}}" wire:click="storyChanged('')">Any</button>
        <button class="btn {{$story === 'single' ? 'btn-secondary' : 'btn-outline-secondary'}}" wire:click="storyChanged('single')">Single</button>
        <button class="btn {{$story === 'multi' ? 'btn-secondary' : 'btn-outline-secondary'}}" wire:click="storyChanged('multi')">Multi</button>
    </div>
</div>
