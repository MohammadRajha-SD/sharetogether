@php
    
    $realEstatePosts = App\Models\RealEstatePost::all();
@endphp
<div class="row" style="overflow-y: auto;">
    @foreach ($realEstatePosts as $post)
    <div class="col-md-4 mb-4">
        <div class="card">
            @if($post->images)
                <img src="{{ $post->exterior_image_url }}" class="card-img-top" alt="Exterior Image">
            @else
                <img src="https://via.placeholder.com/400x300?text=No+Image" class="card-img-top" alt="No Image">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">
                    <strong>Price:</strong> ${{ number_format($post->price, 2) }} <br>
                    <strong>Bedrooms:</strong> {{ $post->bedrooms ?? 'N/A' }} <br>
                    <strong>Bathrooms:</strong> {{ $post->bathrooms ?? 'N/A' }} <br>
                    <strong>Sqft:</strong> {{ $post->sqft ?? 'N/A' }} sqft <br>
                    <strong>Property Type:</strong> {{ ucfirst($post->property_type) }} <br>
                    <strong>Listing Type:</strong> {{ ucfirst($post->listing_type) }} <br>
                </p>
                <p class="card-text">{{ Str::limit($post->description, 100, '...') }}</p>
                <a href="#" class="btn btn-primary">View Details</a>
            </div>
            <div class="card-footer">
                <small class="text-muted">Address: {{ $post->address }}, {{ $post->city }}, {{ $post->state }}</small>
            </div>
        </div>
    </div>
    @endforeach
</div>