<div class="ml-2">
    @foreach($replies as $reply)
        <div class="reply border-bottom" wire:key="reply_{{$reply->id}}">
            <div class="card-header border-0 m-0 d-flex justify-content-between align-items-center" style="background-color: #f8f9fa;">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/' . check_image($reply->user)) }}" alt="" width="35" height="35" class="rounded-circle mr-2">
                    <div class="d-flex flex-column">
                        <h6 class="mb-0">
                            {{ $reply->user->username }}
                            @if($reply->parent)
                                &raquo; {{ $reply->parent->user->username }}
                            @endif
                        </h6>
                        <p>{{$reply->body}}</p>
                        <p class="text-muted small mb-0">Posted <time>{{ $reply->created_at->diffForHumans() }}</time></p>
                    </div>
                </div>

                <a href="#" class="text-danger reply-toggle" style="font-size: .75rem" data-reply-id="{{$reply->id}}">Reply</a>
            </div>
            
            <!-- Reply form -->
            <div class="card-body reply-form" style="display: none;" data-reply-id="{{$reply->id}}">
                <form wire:submit.prevent="submitReply" onsubmit="document.getElementById('message_{{$reply->id}}').value = '';">
                    <div class="form-group">
                        <textarea wire:model.defer="message" class="form-control" id="message_{{$reply->id}}" rows="2" placeholder="Write your reply" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger btn-sm">Reply</button>
                </form>
            </div>
        </div>
    @endforeach

    @if($hasMoreReplies && $comment_counted > 0)
        <div class="card-footer">
            <button wire:click="loadMoreReplies" class="btn btn-link" wire:loading.attr="disabled">
                {{$comment_counted == 1 ? 'View 1 more reply' : 'View '.$comment_counted.' more replies'}}
            </button>

            <div wire:loading>
                <x-frontend.loading />
            </div>
        </div>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle reply toggling
        $(document).on('click', '.reply-toggle', function (e) {
            e.preventDefault();
            var replyId = $(this).data('reply-id');
            var replyForm = $('.reply-form[data-reply-id="' + replyId + '"]');
            replyForm.toggle();
        });

        // Re-attach event listeners after Livewire updates the DOM
        Livewire.hook('message.processed', (message, component) => {
            $(document).on('click', '.reply-toggle', function (e) {
                e.preventDefault();
                var replyId = $(this).data('reply-id');
                var replyForm = $('.reply-form[data-reply-id="' + replyId + '"]');
                replyForm.toggle();
            });
        });
    });
</script>
