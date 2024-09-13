@props(['post'])
<div class="card custom-card text-center">
    <div class="card-header px-2 pt-3 pb-0">
        <div class="d-flex">
            <!-- image -->
            <div class="image-user">
                <img src="{{ asset('images/' . check_image($post->user)) }}" alt="">
            </div>

            <!-- username -->
            <div class="d-flex align-items-start flex-column">
                <p class="mx-1 mb-0 p-0">{{ $post->user->username }}</p>
                <p class="mx-1 p-0" style="font-size: .6rem">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
    <figure>
        <img class="card-img-top w-100" src="{{ $post->image->path }}" alt="" loading="lazy">
    </figure>
    <div class="card-body">
        <h4 class="card-title">{{ ucwords($post->title) }}</h4>
        <p class="card-text">{{ Str::limit($post->description, 50) }}</p>
        <a class="btn ripple btn-outline-secondary btn-sm" href="{{ route('posts.show', $post->slug) }}">Read More</a>
    </div>
    <div class="card-footer">
        <div class="icon-group">
            @livewire('posts.post-like', ['post' => $post], key('post_like_'.$post->id))
            <i class="fa fa-comment"></i><span class="count">{{count($post->comments)}}</span>
        </div>
        <div class="icon-group">
            @livewire('posts.post-save', ['post' => $post], key('post_save_'.$post->id))
            <i class="fa fa-share"></i>
        </div>
    </div>
</div>