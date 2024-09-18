<div>
    <style>
        
        .favorite-icon {
            position: absolute;
            bottom: 15px;
            right: 15px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            transition: .3s;
            color: white;
        }

        .favorite-icon.active,
        .favorite-icon:hover {
            color: red;
        }
        </style>


    <span class="favorite-icon" wire:click="save" wire:loading.attr="disabled" {{ $saved ? 'hidden' : '' }}
        style="cursor: pointer;">
        <i class="fas fa-heart"></i>
    </span>

    <span class="favorite-icon active" wire:click="unsave" wire:loading.attr="disabled" {{ !$saved ? 'hidden' : '' }}
        style="cursor: pointer;">
        <i class="fas fa-heart "></i>
    </span>
</div>
