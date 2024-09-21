<div>
    <style>
        .dropdown-menu-custom {
            padding: 20px;
            width: 300px;
            max-height: 450px;
            overflow-y: auto;
            z-index: 19090;
            transform: translateX(-50px);
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-filter {
            align-items: center;
            background-image: none;
            cursor: pointer;
            display: inline-flex;
            gap: 8px;
            justify-content: center;
            line-height: 1;
            transition: background-color 100ms cubic-bezier(0.5, 0, 0.2, 1), color 100ms cubic-bezier(0.5, 0, 0.2, 1), border-color 100ms cubic-bezier(0.5, 0, 0.2, 1);
            user-select: none;
            white-space: nowrap;
            vertical-align: middle;
            font-size: 16px;
            border-radius: 40px;
            border: 1px solid rgb(26, 24, 22);
            text-decoration: none;
            height: 48px;
            padding: 0px 24px;
            font-weight: 500;
            color: rgb(26, 24, 22);
            background-color: rgb(255, 255, 255);
            width: 150px;
        }

        .footer-buttons {
            padding-top: 10px;
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #ddd;
            margin-top: 20px;
            padding-top: 10px;
        }
    </style>

    <div class="dropdown">
        <button class="btn-filter dropdown-toggle" type="button" id="dropdownMenuButtonMore" aria-haspopup="true"
            aria-expanded="false" wire:click="toggleShowMore">More</button>

        <div class="dropdown-menu dropdown-menu-custom {{ $is_show_more ? 'show' : '' }}" aria-labelledby="dropdownMenuButtonMore">
            <div class="row">
                @include('livewire.real-estate.partials.more.keywords')
                {{-- @include('livewire.real-estate.partials.more.HOA') --}}
                @include('livewire.real-estate.partials.more.days_on')
                @include('livewire.real-estate.partials.more.square_feet')
                {{-- @include('livewire.real-estate.partials.more.lot_size') --}}
                
                @include('livewire.real-estate.partials.more.home_age')
                @include('livewire.real-estate.partials.more.stories')
                @include('livewire.real-estate.partials.more.garage')
                

                @include('livewire.real-estate.partials.more.parking')
                @include('livewire.real-estate.partials.more.heating_cooling')
                {{-- inside_room --}}
                {{-- outsize_feature --}}
                @include('livewire.real-estate.partials.more.lot_views')
               
            </div>

            <!-- Footer with Reset and Submit buttons -->
            <div class="footer-buttons">
                {{-- <button class="btn btn-light" type="button" wire:click="reset">Reset</button> --}}
                <button class="btn btn-dark" type="button" wire:click='submit'>Submit</button>
            </div>
        </div>
    </div>
</div>
