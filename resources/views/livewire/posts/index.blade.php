<div class="row col-md-9 col-xl-9 col-sm-12 mt-1 parent-posts main" id="main" style="max-height: 600px;overflow-y:scroll; overflow-x:hidden;">
    <style>
        .slider {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
        .slider a {
            display: inline-block;
            padding: 10px 15px;
            margin: 0 5px;
            flex: 0 0 auto;
        }
    </style>
    @if(isset($selected_category) && count($selected_category) > 0)
        <div class="container my-3">
            <div class="slider pb-3">
                @foreach ($selected_category as $category)
                    <a
                        href="?{{http_build_query(request()->except('sub_category'))}}&sub_category={{$category->slug}}"
                        class="bg-danger text-white rounded-pill"
                    >{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    @endif

    @forelse($posts as $post)
        <div class="col-xl-6 col-md-6 col-sm-12 mb-3" key="{{$post->id}}">
           <x-frontend.post-card :post="$post"/>
        </div>
    @empty
        <p class="text-center">No posts yet. Please check back later.</p>
    @endforelse

    @if($hasMorePosts)
        <div class="text-center mt-3" wire:loading.remove>
            <button wire:click="loadMore" class="d-none load-more" wire:loading.attr="disabled">Load More</button>
        </div>

        <div wire:loading wire:target="loadMore">
            <x-frontend.loading />
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var main = document.getElementById('main');

            main.addEventListener('scroll', function () {
                var loadMoreButton = document.querySelector('.load-more');
                if (loadMoreButton && (main.scrollTop + main.clientHeight) / main.scrollHeight >= 0.75) {
                    loadMoreButton.click();
                }
            });
        });
    </script>
</div>
