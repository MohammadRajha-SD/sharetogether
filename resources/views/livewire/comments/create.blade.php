<div class="card p-3 mb-4">
    <header class="d-flex align-items-center mb-3">
        <img src="{{asset('images/'.check_image(auth()->user()))}}"
             alt=""
             width="40"
             height="40"
             class="rounded-circle">

        <h2 class="ml-3 mb-0">Want to participate?</h2>
    </header>

    <form wire:submit.prevent="submitComment" onsubmit="document.getElementById('text').value = '';">
        <div class="mb-3">
            <textarea wire:model.defer="text" name="text" class="form-control" rows="5" id="text"
                      placeholder="Quick, think of something to say!" required></textarea>

            @error('text')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end border-top pt-3">
            <button type="submit" class="btn btn-danger">Post Comment</button>
        </div>
    </form>
</div>
