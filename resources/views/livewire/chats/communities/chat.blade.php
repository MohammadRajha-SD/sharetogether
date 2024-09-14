<div>
    <style>
        .main-scrolled {
            height: 380px;
            max-height: 380px;
            overflow-y: auto;
        }
    </style>
    <div class="card">
        <div class="main-content-body main-content-body-chat d-flex">
            <div class="main-chat-header">
                <a href="{{ route('home') }}" class="btn btn-danger px-3 py-2 "> <i class="fas fa-arrow-left"> </i></a>
                <h4 class="text-secondary ml-2 pt-1">Welcome to the {{ $communityName }} Community</h4>
            </div>

            <div class="main-chat-body main-scrolled" id="main-community">
                <div class="content-inner">
                    @forelse ($messages as $message)
                        <div class="media {{ $message->user_id === auth()->id() ? 'flex-row-reverse' : '' }}">
                            <div class="profile-user">
                                <img alt=""src="{{ asset(check_image(auth()->user())) }}">
                            </div>
                            <div class="media-body">
                                <div
                                    class="main-msg-wrapper {{ $message->user_id === auth()->id() ? 'right' : 'left' }}">
                                   <strong>{{ $message->user_id == auth()->id() ? 'You' : $message->user->name }}</strong> : {{ $message->message }}
                                </div>
                                <div>
                                    <span>{{ $message->created_at->diffForHumans() }}</span>
                                    <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No messages yet.</p>
                    @endforelse

                    @if($hasMoreMessages)
                        <div class="text-center mt-3" wire:loading.remove>
                            <button wire:click="loadMessages" class="d-none load-more-messages" wire:loading.attr="disabled">Load...</button>
                        </div>
                
                        <div wire:loading wire:target="loadMessages">
                            <x-frontend.loading />
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="main-chat-footer">
            <input class="form-control" placeholder="Type your message here..." type="text" wire:model="message">
            <button class="main-msg-send" wire:click.prevent="sendMessage"><i class="far fa-paper-plane"></i></button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var main = document.getElementById('main-community');

            main.addEventListener('scroll', function () {
                var loadMoreButton = document.querySelector('.load-more-messages');
                if (loadMoreButton && (main.scrollTop + main.clientHeight) / main.scrollHeight >= 0.75) {
                    loadMoreButton.click();
                }
            });
        });
    </script>
</div>