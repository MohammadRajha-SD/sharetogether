@auth
    <div class="card p-3 mb-4">
        <form method="POST" action="{{route('posts.comment', $post->slug)}}">
            @csrf

            <header class="d-flex align-items-center mb-3">
                <img src="{{asset('images/'.check_image(auth()->user()))}}"
                     alt=""
                     width="40"
                     height="40"
                     class="rounded-circle">

                <h2 class="ml-3 mb-0">Want to participate?</h2>
            </header>

            <div class="mb-3">
                <textarea
                    name="body"
                    class="form-control"
                    rows="5"
                    placeholder="Quick, think of something to say!"
                    required></textarea>

                <input type="hidden" value="{{auth()->user()->id}}" name="user_id" />
                @error('body')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end border-top pt-3">
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </div>
        </form>
    </div>
@else
    <p class="font-weight-bold">
        <a href="{{route('register')}}" class="text-decoration-underline">Register</a> or
        <a href="{{route('login')}}" class="text-decoration-underline">log in</a> to leave a comment.
    </p>
@endauth
