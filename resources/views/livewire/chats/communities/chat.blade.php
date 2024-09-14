<div>
    @section('title')
        {{ $communityName }}
    @endsection

    @section('is_community_page', true)
    @section('css')
        <style>
            .main-scrolled {
                height: 380px;
                max-height: 380px;
                overflow-y: auto;
            }
        </style>
    @endsection
    @section('content')

        <div class="card">
            <div class="main-content-body main-content-body-chat d-flex">
                <div class="main-chat-header">
                    <a href="{{ route('home') }}" class="btn btn-danger px-3 py-2 "> <i class="fas fa-arrow-left"> </i></a>
                    <h4 class="text-secondary ml-2 pt-1">Welcome to the {{ $communityName }} Community</h4>
                </div>

                <div class="main-chat-body main-scrolled" id="ChatBody" wire:scroll="loadMoreMessages">
                    <div class="content-inner">
                        @forelse ($messages as $message)
                            <div class="media {{ $message->user_id === auth()->id() ? 'flex-row-reverse' : '' }}">
                                <div class="main-img-user online">
                                    <img alt=""
                                        src="{{ asset('assets/img/faces/' . $message->user->profile_image) }}">
                                </div>
                                <div class="media-body">
                                    <div
                                        class="main-msg-wrapper {{ $message->user_id === auth()->id() ? 'right' : 'left' }}">
                                        {{ $message->message }}
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
                        <div wire:loading class="text-center">
                            <span>Loading more messages...</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-chat-footer">
                <input class="form-control" placeholder="Type your message here..." type="text" wire:model="message">
                <a class="main-msg-send" href="#" wire:click.prevent="sendMessage"><i class="far fa-paper-plane"></i></a>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const chatBody = document.getElementById('ChatBody');
                
                chatBody.addEventListener('scroll', function() {
                    if (chatBody.scrollTop === 0) {
                        @this.call('loadMoreMessages');
                    }
                });
            });
            </script>
    @endsection
</div>