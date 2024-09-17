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
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="form-group mb-3">
                    <label for="listing_type">Listing Type</label>
                    <select id="listing_type" wire:model="listing_type" class="form-control">
                        <option value="">Select Listing Type</option>
                        @foreach ($listing_types as $listing_type)
                            <option value="{{ $listing_type }}">{{ ucwords($listing_type) }}</option>
                        @endforeach
                    </select>
                    @error('listing_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="form-group mb-3">
                    <label for="property_type">Property Type</label>
                    <select id="property_type" wire:model="property_type" class="form-control">
                        <option value="">Select Property Type</option>
                        @foreach ($property_types as $property_type)
                            <option value="{{ $property_type }}">{{ ucwords($property_type) }}</option>
                        @endforeach
                    </select>
                    @error('property_type')
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
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="garage">Garage</label>
                    <input type="number" id="garage" class="form-control" wire:model="garage" min='0' />
                    @error('garage')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="year_built">Year Built</label>
                    <input type="number" id="year_built" class="form-control" wire:model="year_built"
                        min="1800" max="2025">
                    @error('year_built')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>


        {{-- 3 IMAGES  --}}
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
                        @if ($exterior_image)
                            <img src="{{ $exterior_image->temporaryUrl() }}" class="img-thumbnail mt-2  card-image"
                                width="150" />
                        @elseif ($realEstatePost->exterior_image_url)
                            <img src="{{ asset($realEstatePost->exterior_image_url) }}"
                                class="img-thumbnail mt-2  card-image" width="150" />
                        @else
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
                        @if ($kitchen_image)
                            <img src="{{ $kitchen_image->temporaryUrl() }}" class="img-thumbnail mt-2  card-image" />
                        @elseif ($realEstatePost->kitchen_image_url)
                            <img src="{{ asset($realEstatePost->kitchen_image_url) }}"
                                class="img-thumbnail mt-2  card-image" width="150" />
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
                        @if ($bathroom_image)
                            <img src="{{ $bathroom_image->temporaryUrl() }}" class="img-thumbnail mt-2  card-image"
                                width="150" />
                        @elseif ($realEstatePost->bathroom_image_url)
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

        <div class="row">
            <div class="form-group mb-3">
                <label for="images">Images</label>
                <input type="file" wire:model="newImages" multiple class="form-control" />
                @error('newImages.*')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mt-3">
                    <ul class="list-group">
                        @foreach ($realEstatePost->images as $image)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <img src="{{ asset($image->path) }}" width="100" alt="Image" />
                                <button type="button" wire:click="deleteImage({{ $image->id }})"
                                    class="btn btn-danger btn-sm">Delete</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-4 mt-2">Update Real Estate Post</button>
    </form>
</div>
