<div class="main" style="max-height: 400px;overflow-y:scroll;" id="main">
    <style>
        .card-header {
            background-color: #fff;
        }
        .card-body {
            background-color: #f8f9fa;
        }
        .rounded-circle {
            margin-right: 0.5rem;
        }
        @media (max-width: 576px) {
            .text-primary {
                margin-top: 1rem;
            }
        }
    </style>

    <div id="comments">
        @foreach($comments as $comment)
            <div class="comment mb-4" wire:key="comment_{{$comment->id}}">
                <div class="card-header border-1 m-0 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/' . check_image($comment->user)) }}" alt="" width="35" height="35" class="rounded-circle mr-2">
                        <div class="d-flex flex-column">
                            <h6 class="mb-0">{{ $comment->user->username }}</h6>
                            <p>{{$comment->body}}</p>
                            <p class="text-muted small mb-0">Posted <time>{{ $comment->created_at->diffForHumans() }}</time></p>
                        </div>
                    </div>

                    <a href="#" class="text-danger reply-toggle" style="font-size: .75rem" data-comment-id="{{$comment->id}}">Reply</a>
                </div>
                
                <!-- Reply form -->
                <div class="card-body reply-form" style="display: none;" data-comment-id="{{$comment->id}}">
                    <form wire:submit.prevent="submitReply('{{$comment->id}}')" onsubmit="document.getElementById('body_{{$comment->id}}').value = '';">
                        <div class="form-group">
                            <textarea wire:model.defer="body" class="form-control" id="body_{{$comment->id}}" rows="2" placeholder="Write your reply" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger btn-sm">Reply</button>
                    </form>
                </div>

                @livewire('comment-replies', ['comment' => $comment], key($comment->id))
            </div>
        @endforeach
    </div>
        
    @if($hasMoreComments)
        <div class="text-center mt-3">
            <button wire:click="loadMoreComments" class="d-none load-more" wire:loading.attr="disabled">Load More</button>

            <div wire:loading>
                <x-frontend.loading />
            </div>
        </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Handle reply toggling
            $(document).on('click', '.reply-toggle', function (e) {
                e.preventDefault();
                var commentId = $(this).data('comment-id');
                var replyForm = $('.reply-form[data-comment-id="' + commentId + '"]');
                replyForm.toggle();
            });

            // Infinite scroll functionality
            $('#main').on('scroll', function () {
                var mainElement = $(this);
                var loadMoreButton = $('.load-more');

                if (loadMoreButton.length && (mainElement.scrollTop() + mainElement.innerHeight()) / mainElement[0].scrollHeight >= 0.75) {
                    loadMoreButton.click();
                }
            });

            // Re-attach event listeners after Livewire updates the DOM
            Livewire.hook('message.processed', (message, component) => {
                $(document).on('click', '.reply-toggle', function (e) {
                    e.preventDefault();
                    var commentId = $(this).data('comment-id');
                    var replyForm = $('.reply-form[data-comment-id="' + commentId + '"]');
                    replyForm.toggle();
                });
            });
        });
    </script>
</div>
