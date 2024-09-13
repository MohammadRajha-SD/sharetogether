@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <h1>Welcome to the {{ $community->name }} Chat</h1>
        <!-- Display chat messages here -->

        <div id="chat-box">
            <!-- Chat messages will be displayed here -->
        </div>

        <form action="" method="POST">
            @csrf
            <input type="text" name="message" placeholder="Type a message..." class="form-control">
            <button type="submit" class="btn btn-primary mt-2">Send</button>
        </form>
    </div>
@endsection
