<div >
    <span wire:click="like" wire:loading.attr="disabled" {{ $liked ? 'hidden' : '' }} style="cursor: pointer;">
        <i class="fa fa-heart "></i>
    </span>
    <span wire:click="unlike" wire:loading.attr="disabled" {{ !$liked ? 'hidden' : '' }} style="cursor: pointer;">
        <i class="fa fa-heart text-danger"></i>
    </span>
    <span class="count">{{ $likeCount }}</span>
</div>
