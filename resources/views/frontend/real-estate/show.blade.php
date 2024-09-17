@extends('frontend.layouts.master')

@section('content')
    <style>
        .main-image img,
        .side-images img {
            border-radius: 10px;
        }

        .side-images img {
            margin-bottom: 10px;
        }

        .map img {
            width: 100%;
            border-radius: 10px;
        }

        .property-details h2 {
            color: #333;
            font-weight: bold;
        }

        .buttons button {
            margin-right: 10px;
        }


        .btn-next {
            right: 10px;
        }

        .btn-prev {
            left: 10px;
        }

        .btn-next,
        .btn-prev {
            border: 1px solid transparent;
            color: rgb(255, 255, 255);
            background-color: rgba(43, 43, 43, 0.72);
            width: 40px;
            height: 40px;
            border-radius: 40px;
            top: 50%;
            transform: translateY(-40px);
        }

        .badge-new {
            background-color: #007bff;
            position: absolute;
            color: white;
            top: 15px;
            left: 15px;
        }


        .badge-image {
            background-color: #000;
            opacity: 0.7;
            position: absolute;
            color: white;
            bottom: 15px;
            left: 5px;
            padding: 8px;
        }


        .image-container {
            position: relative;
            max-height: 500px;
        }

        .image-container img {
            height: 500px;
            border-radius: 5px !important;
            object-fit: cover;
        }

        .position-absolute {
            position: absolute;
        }


        .side-images img {
            width: 100%;
            max-width: 250px;
            height: 150px;
            object-fit: cover;
        }

        @media (max-width: 480px) {
            .side-images {
                margin-top: 10px;
            }

            .side-images img {
                max-width: 100%;
            }

            .image-container{
                width: 100%;
                height: 300px;
            }
        }
    </style>

    <div class="container card pt-3" style="margin-top: 70px; ">
        <div class="row ">
            <div class="col-12">
                <div>
                    <p class="text-muted mb-1"><strong>Listed by</strong> Richmond Jones</p>
                    <p class="text-muted"><strong>Brokered by</strong> Keller Williams Realty Partners, Inc</p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="carousel slide " data-ride="carousel" id="carouselExample2">
                    <div class="carousel-inner">
                        @if ($real_estate_post->is_new)
                            <span class="badge badge-new text-white">New</span>
                        @endif

                        @if ($real_estate_post->images)
                            @foreach ($real_estate_post->images as $image)
                                <div class="carousel-item image-container {{ $loop->first ? 'active' : '' }}">
                                    <img alt="" class="d-block w-100 img-fluid" src="{{ asset($image->path) }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <a class="carousel-control-prev btn-prev" href="#carouselExample2" role="button" data-slide="prev">
                        <i class="fa fa-angle-left fs-30" aria-hidden="true"></i>
                    </a>
                    <a class="carousel-control-next btn-next" href="#carouselExample2" role="button" data-slide="next">
                        <i class="fa fa-angle-right fs-30" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="side-images">
                    <div class=" position-relative mb-2">
                        <img src="{{ asset($real_estate_post->exterior_image_url) }}" alt="" class="img-fluid">
                        <span class="badge badge-image position-absolute">Exterior Image</span>
                    </div>
                    <div class=" position-relative mb-2">
                        <img src="{{ asset($real_estate_post->kitchen_image_url) }}" alt="" class="img-fluid">
                        <span class="badge badge-image position-absolute">Kitchen Image</span>
                    </div>
                    <div class=" position-relative">
                        <img src="{{ asset($real_estate_post->bathroom_image_url) }}" alt="" class="img-fluid">
                        <span class="badge badge-image position-absolute">Bathroom Image</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-2 property-details">
            <!-- Property Details -->
            <div class="col-md-12">
                <div class="card" style="padding:15px">
                    <p class="text-success mb-2">
                        <i class="fas fa-circle"></i> {{ $real_estate_post->property_type }}
                        for {{ $real_estate_post->listing_type }}
                    </p>

                    @if ($real_estate_post->listing_type === 'rent')
                        <h2>
                            <span
                                class="text-danger">${{ intval($real_estate_post->price) == $real_estate_post->price ? number_format($real_estate_post->price, 0) : number_format($real_estate_post->price, 2) }}
                            </span><sup>/month</sup>
                        </h2>
                    @else
                        <h2 class="text-danger">
                            ${{ intval($real_estate_post->price) == $real_estate_post->price ? number_format($real_estate_post->price, 0) : number_format($real_estate_post->price, 2) }}
                        </h2>
                    @endif
                    <p class="card-text">
                        @if ($real_estate_post->bedrooms > 0)
                            <strong>{{ $real_estate_post->bedrooms }}</strong> bed
                        @endif

                        @if ($real_estate_post->bathrooms > 0)
                            <strong> • {{ $real_estate_post->bathrooms }}</strong> bath
                        @endif

                        @if ($real_estate_post->sqft > 0)
                            <strong> • {{ $real_estate_post->sqft }}</strong> sqft
                        @endif

                        @if ($real_estate_post->acre_lot > 0)
                            <strong> • {{ $real_estate_post->acre_lot }}</strong> sqft lot
                        @endif
                    </p>

                    <p class="text-muted">{{ $real_estate_post->address }}, {{ $real_estate_post->city }}
                        , {{ $real_estate_post->state }} {{ $real_estate_post->zip_code }}</p>

                    @if ($real_estate_post->listing_type !== 'rent')
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-2 py-1 px-2 text-center">
                                    <svg fill="currentColor" data-testid="icon-home" viewBox="0 0 24 24" aria-hidden="true"
                                        focusable="false"
                                        style="display: inline-block; width: 1em; height: 1em; font-size: 24px; color: inherit; fill: currentcolor;">
                                        <path
                                            d="m20.499 7.799-5.375-4.3a5 5 0 0 0-6.247 0L3.5 7.799A4 4 0 0 0 2 10.922V18a4 4 0 0 0 4 4h2a2 2 0 0 0 2-2v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a2 2 0 0 0 2 2h2a4 4 0 0 0 4-4v-7.078A4 4 0 0 0 20.499 7.8ZM4.75 9.361l5.375-4.3a3 3 0 0 1 3.748 0l5.375 4.3A2 2 0 0 1 20 10.922V18a2 2 0 0 1-2 2h-2v-3a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v3H6a2 2 0 0 1-2-2v-7.078a2 2 0 0 1 .75-1.561Z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="col-10 ">
                                    <p class="m-0">Single family</p>
                                    <small>Property type</small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2 py-1 px-2 text-center">
                                    <svg data-testid="icon-square-footage" viewBox="0 0 24 24" aria-hidden="true"
                                        focusable="false"
                                        style="display: inline-block; width: 1em; height: 1em; font-size: 24px; color: inherit; fill: currentcolor;">
                                        <path fill-rule="evenodd"
                                            d="M2 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v9h9a3 3 0 0 1 3 3v2a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5Zm2 4h1a1 1 0 0 0 0-2H4V5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2v-1a1 1 0 1 0-2 0v1h-2v-1a1 1 0 1 0-2 0v1H9v-1a1 1 0 1 0-2 0v1H5a1 1 0 0 1-1-1v-2h1a1 1 0 1 0 0-2H4v-2h1a1 1 0 1 0 0-2H4V9Z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="col-10 ">
                                    <p class="m-0">{{ round($real_estate_post->price / $real_estate_post->sqft, 0) }}
                                    </p>
                                    <small>Price per sqft</small>
                                </div>
                            </div>

                            @if ($real_estate_post->year_built > 1000)
                                <div class="row">
                                    <div class="col-2 py-1 px-2 text-center">
                                        <svg data-testid="icon-hammer" viewBox="0 0 24 24" aria-hidden="true"
                                            focusable="false"
                                            style="display: inline-block; width: 1em; height: 1em; font-size: 24px; color: inherit; fill: currentcolor;">
                                            <path fill-rule="evenodd"
                                                d="m2.035 7.747 2.403 1.387c1.12.647 2.49.69 3.649.118l.18-.09a2.49 2.49 0 0 1 .514-.187 2.28 2.28 0 0 0 .005.46l-4.92 7.186a3 3 0 0 0 .975 4.293l1.317.76a3 3 0 0 0 4.206-1.301l3.763-7.854c.36-.157.684-.41.928-.75l.227-.316.075-.008.564.855 1.925 1.11a2.25 2.25 0 0 0 3.073-.823l1.25-2.165a2.25 2.25 0 0 0-.823-3.073L19.42 6.238l-1.088-.066a.118.118 0 0 1-.091-.052l-.601-.91-3.873-2.236a6.162 6.162 0 0 0-7.17.726L2.035 7.747Zm11.072 2.928c.11.061.25.03.324-.073l.74-1.03 1.096-.131a1.756 1.756 0 0 1 1.675.776l.388.587 1.516.875a.25.25 0 0 0 .341-.092l1.25-2.165a.25.25 0 0 0-.091-.341l-1.516-.875-.617-.037a2.118 2.118 0 0 1-1.64-.947l-.341-.516-3.464-2a4.162 4.162 0 0 0-4.843.49L5.438 7.402a1.869 1.869 0 0 0 1.762.057l.181-.09a4.488 4.488 0 0 1 4.146.086l-.733 1.625a.25.25 0 0 0 .099.317l2.214 1.278Zm-3.101.519 1.988 1.148-3.434 7.166a1 1 0 0 1-1.402.434l-1.317-.76a1 1 0 0 1-.325-1.431l4.49-6.557Z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="col-10 ">
                                        <p class="m-0 mx-1">{{ $real_estate_post->year_built }}</p>
                                        <small>Year Built</small>
                                    </div>
                                </div>
                            @endif

                            @if ($real_estate_post->garage > 0)
                                <div class="row">
                                    <div class="col-2 py-1 px-2 text-center">
                                        <svg data-testid="icon-garage" viewBox="0 0 24 24" aria-hidden="true"
                                            focusable="false"
                                            style="display: inline-block; width: 1em; height: 1em; font-size: 24px; color: inherit; fill: currentcolor;">
                                            <path
                                                d="M10 13a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1Zm1 2a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M4 20a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4ZM4 6h16v12h-2v-7a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v7H4V6Zm4 12h8v-7a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v7Z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="col-10">
                                        <p class="m-0  mx-1">
                                            {{ $real_estate_post->garage }}{{ $real_estate_post->garage === 1 ? ' Car' : ' Cars' }}
                                        </p>
                                        <small class=" mx-1">garage</small>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                    <!-- Buttons -->
                    <div class="row mt-5  buttons">

                        <div class="col-md-12">
                            @if ($real_estate_post->listing_type === 'rent')
                                <button class="btn btn-success">Request tour</button>
                            @else
                                <button class="btn btn-primary">Ask a question</button>
                                <button class="btn btn-success">Share this home</button>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <!-- Map -->
            {{--        <div class="col-md-4 map"> --}}
            {{--            <img src="https://via.placeholder.com/300x200" alt="Map" class="img-fluid"> --}}
            {{--        </div> --}}
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
@endsection
