@php
    $realEstatePosts = auth()->user()->real_estate_posts()->get();
@endphp

<div class="row">
    @foreach ($realEstatePosts as $post)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4 d-flex">
            <a href="{{ route('real-estate.show', $post->id) }}" class="card-link" style="text-decoration: none; color: inherit; width: 100%;">
                <div class="card d-flex flex-column h-100">
                    @if($post->image)
                        <img src="{{ asset('/' . $post->image->path) }}" class="card-img-top" alt="Real estate image" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title text-danger">{{ $post->title }}</h5>
                            <!-- Visibility Icon with Tooltip -->
                            @if($post->visibility == 0)
                                <i class="bi bi-lock text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Private Post"></i>
                            @else
                                <i class="bi bi-unlock text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Public Post"></i>
                            @endif
                        </div>
                        <p class="card-text mb-2">
                            <strong>Price:</strong> ${{ number_format($post->price, 2) }} <br>
                            <strong>Bedrooms:</strong> {{ $post->bedrooms ?? 'N/A' }} <br>
                            <strong>Bathrooms:</strong> {{ $post->bathrooms ?? 'N/A' }} <br>
                            <strong>Sqft:</strong> {{ $post->sqft ?? 'N/A' }} sqft <br>
                            <strong>Property Type:</strong> {{ ucfirst($post->property_type) }} <br>
                            <strong>Listing Type:</strong> {{ ucfirst($post->listing_type) }}
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

<!-- Add this script to initialize tooltips -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
