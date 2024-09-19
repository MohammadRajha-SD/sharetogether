<div class="row">
    <style>
        .public_private_icon {
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
        .btn-active{
            opacity: 0.5;
        }
    </style>

    <div class="col-12 d-flex align-items-center justify-content-end">
        <a class="btn btn-primary mb-3 text-white mr-2 {{$is_favorite === false ? 'btn-active' : ''}}" data-bs-toggle="tooltip" title="My Real Estate Posts"
            wire:click="load_my_real_estate_posts">
            <i class="bi bi-journal-text"></i>
        </a>

        <a class="btn btn-warning mb-3 text-white  {{$is_favorite === true ? 'btn-active' : ''}}" data-bs-toggle="tooltip" title="Favorite Real Estate Posts"
            wire:click='load_favorite_real_estate_posts'>
            <i class="bi bi-star-fill"></i>
        </a>
    </div>



    @forelse ($real_estate_posts as $post)
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 d-flex">
        <div class="card d-flex flex-column h-100">
            <div class="position-relative">
                @if($post->image)
                <img src="{{ asset('/' . $post->image->path) }}" class="card-img-top" alt="Real estate image"
                    style="height: 200px; object-fit: cover;">
                @endif
                @if($is_favorite === true)
                    @livewire('real-estate.save', [$post->id], key('comment_'. $post->id))
                @else

                <i class="bi {{ $post->visibility == 0 ? 'bi-lock' : 'bi-unlock' }} public_private_icon"
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ $post->visibility == 0 ? 'Private Post' : 'Public Post' }}"></i>
                @endif
            </div>
            <a href="{{ route('real-estate.show', $post->id) }}" class="card-link"
                style="text-decoration: none; color: inherit; width: 100%;">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title text-danger">{{ $post->title }}</h5>
                    </div>
                    <p class="card-text mb-2">
                        <strong>Price:</strong> ${{ intval($post->price) == $post->price ? number_format($post->price, 0) : number_format($post->price, 2) }} <br>
                        <strong>Bedrooms:</strong> {{ $post->bedrooms ?? 'N/A' }} <br>
                        <strong>Bathrooms:</strong> {{ $post->bathrooms ?? 'N/A' }} <br>
                        <strong>Sqft:</strong> {{ $post->sqft ?? 'N/A' }} sqft <br>
                        <strong>Property Type:</strong> {{ ucfirst($post->property_type) }} <br>
                        <strong>Listing Type:</strong> {{ ucfirst($post->listing_type) }}
                    </p>
                    <p class="card-text">{{ Str::limit($post->description, 100, '...') }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{ $post->address }}, {{ $post->city_name->name }}, {{
                        $post->state_name->name}}</small>
                </div>
            </a>

        </div>
    </div>
    @empty
    <div class="col-12">
        <p class="text-center text-muted"> {{$is_favorite === true ? 'You have no favorite real estate posts.' : 'You have no real estate posts.'}} </p>
    </div>
    @endforelse

<!-- Add this script to initialize tooltips -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
</div>
