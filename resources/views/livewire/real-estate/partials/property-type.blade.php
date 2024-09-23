<div>
    <div class="dropdown">
        <button class="btn-filter dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            {{ $selectedProperty === null ? 'Property Type' : $selectedProperty}}
        </button>

        <div class="dropdown-menu dropdown-menu-custom {{$is_show ? 'show' : ''}}" aria-labelledby="dropdownMenuButton">
            <div class="d-flex justify-content-between mb-3">
                <span>Property Type</span>
                <a href="#" wire:click.prevent="submit" class="text-primary">Done</a>
            </div>
            <div class="row">
                <div class="col-6 mb-2">
                    <div class="property-option {{ $selectedProperty === null ? 'active' : '' }}"
                         wire:click="selectProperty(null)">
                        Any
                    </div>
                </div>
                @foreach($properties as $property)
                    <div class="col-6 mb-2">
                        <div class="property-option {{ $selectedProperty === $property ? 'active' : '' }}"
                             wire:click="selectProperty('{{ $property }}')">
                            {{ $property }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <style>
        .dropdown-menu-custom {
            padding: 20px;
            width: 300px; /* Custom width */
        }

        .property-option {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            border-radius: 5px;
        }

        .property-option:hover {
            background-color: #f0f0f0;
        }

        .property-option.active {
            background-color: #333;
            color: #fff;
        }

        .btn-filter {
            align-items: center;
            background-image: none;
            cursor: pointer;
            display: inline-flex;
            gap: 8px;
            -webkit-box-pack: center;
            justify-content: center;
            line-height: 1;
            touch-action: manipulation;
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

    </style>
</div>

