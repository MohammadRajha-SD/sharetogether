<div>
    <style>
        .custom-dropdown {
            width: 125px;
        }

        .custom-dropdown .dropdown-item {
            white-space: normal;
            word-wrap: break-word;
        }
    </style>

    @foreach ($communities as $community)
        <button class="dropdown-item" wire:click.prevent="joinCommunity('{{$community->id}}')">{{ $community->name }}</button>
    @endforeach
</div>
