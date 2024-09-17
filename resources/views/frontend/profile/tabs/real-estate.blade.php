@php
    $realEstatePosts = auth()->user()->real_estate_posts()->get();
@endphp
<div class="row" style="overflow-y: auto;">
    @foreach ($realEstatePosts as $post)
    <div class="col-md-4 mb-4 d-flex">
        <a href="{{ route('real-estate.show', $post->id) }}" class="card-link" style="text-decoration: none; color: inherit;">
            <div class="card d-flex flex-column" style="width: 100%; min-height: 100%;">
                @if($post->image)
                    <img src="{{ asset('/' . $post->image->path) }}" class="card-img-top" alt="" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body d-flex flex-column" style="flex-grow: 1;">
                    <h5 class="card-title text-danger">{{ $post->title }}</h5>
                    <p class="card-text">
                        <strong>Price:</strong> ${{ number_format($post->price, 2) }} <br>
                        <strong>Bedrooms:</strong> {{ $post->bedrooms ?? 'N/A' }} <br>
                        <strong>Bathrooms:</strong> {{ $post->bathrooms ?? 'N/A' }} <br>
                        <strong>Sqft:</strong> {{ $post->sqft ?? 'N/A' }} sqft <br>
                        <strong>Property Type:</strong> {{ ucfirst($post->property_type) }} <br>
                        <strong>Listing Type:</strong> {{ ucfirst($post->listing_type) }} <br>
                    </p>
                    <p class="card-text">{{ Str::limit($post->description, 100, '...') }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Address: {{ $post->address }}, {{ $post->city }}, {{ $post->state }}</small>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
