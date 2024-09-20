<div>
    <div class="dropdown">
        <button class="btn-filter dropdown-toggle" type="button" id="dropdownMenuButtonRooms" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" wire:click="toggleShow">
            {{$rooms}}
        </button>

        <div class="dropdown-menu dropdown-menu-custom {{$is_show ? 'show' : ''}}"
             aria-labelledby="dropdownMenuButtonRooms">
            <div class="d-flex justify-content-between mb-3">
                <span>Rooms</span>
                <a href="#" wire:click.prevent="submit" class="text-primary">Done</a>
            </div>
            <div class="row">
                <div class="col-12">
                    <div>Bedrooms</div>
                    <div class="d-flex align-items-center justify-content-between" style="gap:5px;">
                        <select class="SlectBox form-control" wire:model.live="min_bed">
                            <option value="" selected>No min</option>
                            @foreach ([1,2,3,4,5] as $d)
                                <option value="{{$d}}">{{$d}}</option>
                            @endforeach
                        </select>

                        <select class="SlectBox form-control" wire:model.live="max_bed">
                            <option value="" selected>No max</option>
                            @foreach ($max_beds as $d)
                                <option value="{{$d}}">{{$d}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div>Bathrooms</div>
                    <div class="d-flex align-items-center justify-content-between" style="gap:5px;">
                        <select class="SlectBox form-control" wire:model.live="min_bath">
                            <option value="" selected>No min</option>
                            @foreach ([1,2,3,4,5] as $d)
                                <option value="{{$d}}">{{$d}}</option>
                            @endforeach
                        </select>

                        <select class="SlectBox form-control" wire:model.live="max_bath">
                            <option value="" selected>No max</option>
                            @foreach ($max_baths as $d)
                                <option value="{{$d}}">{{$d}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .dropdown-menu-custom {
            padding: 20px;
            width: 300px; /* Custom width */
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

