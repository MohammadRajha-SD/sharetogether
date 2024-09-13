@extends('frontend.layouts.master')

@section('css')
    <link href="{{asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/siderbar.css')}}" />
    <style>
        .author-box {
            text-align: center;
        }
        .box-x {
            justify-content: center;
        }
        @media (max-width: 768px) {
            .author-box {
                text-align: left;
            }
            .author {
                justify-content: left !important;
            }
            .box-x {
                justify-content: left;
            }
            .image-user {
                width: 30px;
                height: 30px;
            }
        }
    </style>
@endsection

@section('content')
    <main class="card mt-2 p-3">
        <article class="row box-x">
            <div class="col-lg-4 col-md-6 col-sm-12 author-box">
                <div class="card custom-card">
                    <div class="card-body ht-100p">
                        <div class="carousel-slider">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($post->images as $index => $image)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <img src="{{ $image->path }}" alt="img" class="carousel-image" />
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                    <i class="fa fa-angle-left fs-30" aria-hidden="true"></i>
                                </a>
                                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                    <i class="fa fa-angle-right fs-30" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal Structure -->
                    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel">Image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <img id="modalImage" src="" alt="img" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
               
                <p class="mt-4 mb-2 text-muted small">
                    Published
                    <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>

                <div class="d-flex align-items-center justify-content-center author">
                    <img src="{{ asset('images/' . check_image($post->user)) }}" alt="" class="image-user">
                    <div class="ml-2 text-left">
                        <h6 class="mt-2">
                            <a class="text-secondary" href="/?author={{ $post->user->username }}">{{ $post->user->name }}</a>
                        </h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-12 mt-2">
                <div class="d-none d-lg-flex justify-content-between mb-4">
                    <a href="/" class="text-dark">
                        <i class="fas fa-arrow-left"></i> Back to Posts
                    </a>

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <x-frontend.form.category-button :category="$post->category" />
                    </div>
                </div>

                <h2 class="mb-4">
                    {{ $post->title }}
                </h2>

                <div class="content mb-4">{!! $post->description !!}</div>
            </div>

            <section class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 mt-4">
                @include('frontend.posts._add-comment-form')
                {{-- @auth
                    @livewire('comments.create', ['post' => $post], key('comments-create-'.$post->id))
                @else
                    <p class="font-weight-bold">
                        <a href="{{route('register')}}" class="text-decoration-underline">Register</a> or
                        <a href="{{route('login')}}" class="text-decoration-underline">log in</a> to leave a comment.
                    </p>
                @endauth --}}
                @livewire('post-comments', ['post' => $post], key('post-comments-'.$post->id))
            </section>
        </article>
    </main>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var carouselImages = document.querySelectorAll('.carousel-image');
        var modalImage = document.getElementById('modalImage');
        var imageModal = $('#imageModal');

        carouselImages.forEach(function (image) {
            image.addEventListener('click', function () {
                modalImage.src = this.src;
                imageModal.modal('show');
            });
        });
    });
</script>
<script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/plugins/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{asset('assets/plugins/multislider/multislider.js')}}"></script>
<script src="{{asset('assets/js/carousel.js')}}"></script>
@endsection
