<div class="mx-2 row" style="margin-top: 70px">
    <style>
        /* Existing styles */
        .btn-email-agent {
            cursor: pointer;
            transition: background-color 100ms cubic-bezier(0.5, 0, 0.2, 1), color 100ms cubic-bezier(0.5, 0, 0.2, 1), border-color 100ms cubic-bezier(0.5, 0, 0.2, 1);
            user-select: none;
            white-space: nowrap;
            vertical-align: middle;
            border: 1px solid rgb(26, 24, 22);
            padding: 5px 24px;
            font-weight: 500;
            border-radius: 20px;
            color: rgb(26, 24, 22);
            background-color: rgb(255, 255, 255);
        }

        .btn-email-agent:hover {
            opacity: .8;
            background: #eee;
        }

        .card-property {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-decoration: none;
            /* Remove underline */
            color: inherit;
            /* Inherit text color */
        }

        .card-property:hover {
            text-decoration: none;
            /* Remove underline on hover */
        }

        .badge-new {
            background-color: #007bff;
            position: absolute;
            top: 15px;
            left: 15px;
            z-index: 1000;
        }


        .image-container {
            position: relative;
            max-height: 250px;
        }

        .image-container img {
            height: 250px;
            border-radius: 5px !important;
            object-fit: cover;
        }
    </style>
    @foreach ($real_estate_posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="position-relative">
                    @if ($post->is_new)
                        <span class="badge badge-new text-white">New</span>
                    @endif

                    @livewire('real-estate.save', [$post->id])

                    @if ($post->images)
                        @foreach ($post->images as $image)
                            <div class="carousel-item image-container {{ $loop->first ? 'active' : '' }}">
                                <img class="d-block w-100 img-fluid" src="{{ asset($image->path) }}" alt="" />
                            </div>
                        @endforeach
                    @endif
                </div>
                <a href="{{ route('real-estate.show', $post->id) }}" class="card-property">
                    <div class="card-body">
                        <p class="text-success mb-2">
                            <i class="fas fa-circle"></i> {{ $post->property_type }}
                            for {{ $post->listing_type }}
                        </p>
                        <h2 class="text-danger">
                            ${{ intval($post->price) == $post->price ? number_format($post->price, 0) : number_format($post->price, 2) }}
                        </h2>

                        <p class="card-text">
                            @if ($post->bedrooms > 0)
                                <strong>{{ $post->bedrooms }}</strong> bed
                            @endif

                            @if ($post->bathrooms > 0)
                                <strong> • {{ $post->bathrooms }}</strong> bath
                            @endif

                            @if ($post->sqft > 0)
                                <strong> • {{ $post->sqft }}</strong> sqft
                            @endif

                            @if ($post->acre_lot > 0)
                                <strong> • {{ $post->acre_lot }}</strong> sqft lot
                            @endif
                        </p>

                        <p class="text-muted">{{ $post->address }}, {{ ucwords($post->city_name->name) }}, {{ ucwords($post->state_name->name) }}</p>
                        <button class="btn-email-agent">Email Agent</button>
                    </div>
                </a>
            </div>
        </div>
    @endforeach

    <div class="col-12 d-flex align-items-center justify-content-center">
        <nav aria-label="Page navigation">
            {{ $real_estate_posts->links() }}
        </nav>
    </div>
</div>
