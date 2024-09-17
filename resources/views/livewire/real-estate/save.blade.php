<div>
    <span class="favorite-icon" wire:click="save" wire:loading.attr="disabled" {{ $saved ? 'hidden' : '' }}
        style="cursor: pointer;">
        <i class="fas fa-heart"></i>
    </span>

    <span class="favorite-icon active" wire:click="unsave" wire:loading.attr="disabled" {{ !$saved ? 'hidden' : '' }}
        style="cursor: pointer;">
        <i class="fas fa-heart "></i>
    </span>
</div>
