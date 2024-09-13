<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    @foreach($users as $user)
        <div>
            <h2>{{ $user->name }} ({{ $user->username }})</h2>
            <p>Email: {{ $user->email }}</p>
            <p>Phone: {{ $user->phone }}</p>
            <p>Admin: {{ $user->is_admin ? 'Yes' : 'No' }}</p>

            <h3>Details</h3>
            <p>Occupation: {{ $user->details->occupation->name }}</p>
            <p>Country: {{ $user->details->country->name }}</p>
            <p>State: {{ $user->details->state }}</p>
            <p>City: {{ $user->details->city }}</p>
            <p>Latitude: {{ $user->details->latitude }}</p>
            <p>Longitude: {{ $user->details->longitude }}</p>

            <h3>Interests</h3>
            <ul>
                @foreach($user->interests as $interest)
                    <li>{{ $interest->name }}</li>
                @endforeach
            </ul>

            <h3>Posts</h3>
            <ul>
                @foreach($user->posts as $post)
                    <li>
                        <h4>{{ $post->title }}</h4>
                        <p>{{ $post->description }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <hr>
    @endforeach
</body>
</html>
