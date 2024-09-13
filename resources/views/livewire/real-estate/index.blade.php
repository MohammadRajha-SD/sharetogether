<div class="my-5 mx-2 row">
    @foreach($real_estate_posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card card-property">
                <div class="position-relative">
                    <img src="{{asset('assets/img/photos/1.jpg')}}" class="card-img-top" alt="House Image">
                    @if($post->is_new)
                        <span class="badge badge-new text-white">New</span>
                    @endif
                    <span class="badge badge-new text-white">New</span>
                    <span class="favorite-icon"><i class="fas fa-heart"></i></span>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-success mb-2">
                            <i class="fas fa-circle"></i> {{ $post->property_type }}
                            for {{$post->listing_type}}
                        </p>
                        <a href="{{route('real-estate.show', $post->id)}}" class="btn btn-info btn-sm rounded-pill">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                    <h2 class="text-danger">
                        ${{ intval($post->price) == $post->price ? number_format($post->price, 0) : number_format($post->price, 2) }}
                    </h2>

                    <p class="card-text">
                        @if($post->bedrooms > 0)
                            <strong>{{$post->bedrooms}}</strong> bed
                        @endif

                        @if($post->bathrooms > 0)
                            <strong> • {{$post->bathrooms}}</strong> bath
                        @endif

                        @if($post->sqft > 0)
                            <strong> • {{$post->sqft}}</strong> sqft
                        @endif

                        @if($post->acre_lot > 0)
                            <strong> • {{$post->acre_lot}}</strong> sqft lot
                        @endif
                    </p>

                    <p class="text-muted">{{ $post->address }}, {{ $post->city }}
                        , {{ $post->state }} {{ $post->zip_code }}</p>
                    <button class="btn-email-agent">Email Agent</button>
                </div>
            </div>
        </div>
    @endforeach

    <div class="col-12 d-flex align-items-center justify-content-center">
        <nav aria-label="Page navigation">
            {{ $real_estate_posts->links() }}
        </nav>
    </div>
</div>
