<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <span wire:click="save" wire:loading.attr="disabled" {{ $saved ? 'hidden' : '' }} style="cursor: pointer;">
        <i class="fa fa-bookmark "></i>
    </span>
    <span wire:click="unsave" wire:loading.attr="disabled" {{ !$saved ? 'hidden' : '' }} style="cursor: pointer;">
        <i class="fa fa-bookmark text-warning"></i>
    </span>
    <span class="count">{{ $saveCount }}</span>
</div>
