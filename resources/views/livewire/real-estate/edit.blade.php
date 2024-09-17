<div class="container card pt-3" style="margin-top: 70px; ">
    <h1>Edit Real Estate Post</h1>

    <style>
        .card-image {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
    </style>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form wire:submit.prevent="update">
        <!-- Form fields for editing post -->
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" wire:model="title">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" class="form-control" wire:model="description"></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" id="price" class="form-control" wire:model="price">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group mb-3">
                    <label for="bedrooms">Bedrooms</label>
                    <input type="number" id="bedrooms" class="form-control" wire:model="bedrooms"
                        placeholder="Enter number of bedrooms">
                    @error('bedrooms')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group mb-3">
                    <label for="bathrooms">Bathrooms</label>
                    <input type="number" id="bathrooms" class="form-control" wire:model="bathrooms"
                        placeholder="Enter number of bathrooms">
                    @error('bathrooms')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group mb-3">
                    <label for="sqft">Square Feet</label>
                    <input type="number" id="sqft" class="form-control" wire:model="sqft"
                        placeholder="Enter square feet">
                    @error('sqft')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">

                <div class="form-group mb-3">
                    <label for="acre_lot">Acre Lot</label>
                    <input type="number" step="0.01" id="acre_lot" class="form-control" wire:model="acre_lot"
                        placeholder="Enter acre lot">
                    @error('acre_lot')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12">

                <div class="form-group mb-3">
                    <label for="state">State</label>
                    <select id="state" wire:model.live="state" class="form-control">
                        <option value="">Select State</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ ucwords($state->name) }}</option>
                        @endforeach
                    </select>
                    @error('state')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">

                <div class="form-group mb-3">
                    <label for="city">City</label>
                    <select id="city" wire:model="city" class="form-control">
                        <option value="">Select City</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ ucwords($city->name) }}</option>
                        @endforeach
                    </select>
                    @error('city')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="form-group mb-3">
                    <label for="address">Address</label>
                    <input type="text" id="address" wire:model="address" class="form-control" />
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-header border-bottom pb-0 pl-4">
                        <label for="exterior_image" class="text-danger font-bold">
                            <h4>
                                Exterior Image
                            </h4>
                        </label>
                    </div>
                    <div class="card-body pt-0">
                        @if ($realEstatePost->exterior_image_url)
                            <img src="{{ asset($realEstatePost->exterior_image_url) }}"
                                class="img-thumbnail mt-2  card-image" width="150" />
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <input type="file" id="exterior_image" wire:model="exterior_image"
                                class="form-control">
                            @error('exterior_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-header border-bottom pb-0 pl-4">
                        <label for="kitchen_image" class="text-danger font-bold">
                            <h4>
                                Kitchen Image
                            </h4>
                        </label>
                    </div>
                    <div class="card-body pt-0">
                        @if ($realEstatePost->kitchen_image_url)
                            <img src="{{ asset($realEstatePost->kitchen_image_url) }}"
                                class="img-thumbnail mt-2  card-image" />
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <input type="file" id="kitchen_image" wire:model="kitchen_image"
                                class="form-control">
                            @error('kitchen_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-header border-bottom pb-0 pl-4">
                        <label for="bathroom_image" class="text-danger font-bold">
                            <h4>
                                Bathroom Image
                            </h4>
                        </label>
                    </div>
                    <div class="card-body pt-0">
                        @if ($realEstatePost->bathroom_image_url)
                            <img src="{{ asset($realEstatePost->bathroom_image_url) }}"
                                class="img-thumbnail mt-2 card-image" />
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <input type="file" id="bathroom_image" wire:model="bathroom_image"
                                class="form-control">
                            @error('bathroom_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
