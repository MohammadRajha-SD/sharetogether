<div>
    <style>
        .card {
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin-top: 50px;
        }

        .main-chat-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
            background-color: white;
            z-index: 10;
            border-bottom: 1px solid #ccc;
            padding: 10px;
        }

        .main-chat-body {
            flex-grow: 1;
            margin-top: 60px;
            margin-bottom: 60px;
            overflow-y: auto;
        }

        .main-chat-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            /* Adjust as necessary */
            background-color: white;
            z-index: 10;
            /* Ensure it stays above other content */
            border-top: 1px solid #ccc;
            padding: 10px;
        }
    </style>

    <div class="card" id="main-container">
        <!-- Fixed Header -->
        <div class="main-chat-header">
            <a href="{{ route('home') }}" class="btn btn-danger px-3 py-2 "> <i class="fas fa-arrow-left"></i></a>
            <h4 class="text-secondary ml-2 pt-1">Welcome to the {{ $communityName }} Community</h4>
        </div>

        <!-- Scrollable Body -->
        <div class="main-chat-body main-scrolled" id="main-community">
            <div class="content-inner">
                @forelse ($messages as $message)
                <div class="media {{ $message->user_id === auth()->id() ? 'flex-row-reverse' : '' }}">
                    <div class="profile-user">
                        <img alt="" src="{{ asset(check_image(auth()->user())) }}">
                    </div>
                    <div class="media-body">
                        <div class="main-msg-wrapper {{ $message->user_id === auth()->id() ? 'right' : 'left' }}">
                            <strong>{{ $message->user_id == auth()->id() ? 'You' : $message->user->name }}</strong>
                            : {{ $message->message }}
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
                    <button wire:click="loadMessages" class="d-none load-more-messages"
                        wire:loading.attr="disabled">Load...</button>
                </div>

                <div wire:loading wire:target="loadMessages">
                    <x-frontend.loading />
                </div>
                @endif
            </div>
        </div>

        <!-- Fixed Footer -->
        <div class="main-chat-footer">
            <input class="form-control" id="messageInput" placeholder="Type your message here..." type="text" wire:model="message">
            <button class="main-msg-send" id="sendButton" wire:click.prevent="sendMessage"><i class="far fa-paper-plane"></i></button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let main = document.getElementById('main-community');

            main.addEventListener('scroll', function () {
                let loadMoreButton = document.querySelector('.load-more-messages');
                if (loadMoreButton && (main.scrollTop + main.clientHeight) / main.scrollHeight >= 0.75) {
                    loadMoreButton.click();
                }
            });

            let input = document.getElementById('messageInput');
            let sendButton = document.getElementById('sendButton');

            // Add keydown event listener to the input field
            input.addEventListener('keydown', function (event) {
                // Check if Enter key is pressed
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent the default form submission behavior
                    
                    // Trigger the click event of the send button
                    sendButton.click();
                }
            });
        });
    </script>
</div>