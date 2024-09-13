@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <h1>Select Homeless Community</h1>
        <form action="{{ route('community.join', ['id' => 1]) }}" method="POST">
            @csrf
            <select name="community" class="form-control" onchange="this.form.submit()">
                @foreach($communities as $community)
                    <option value="{{ $community->id }}">{{ $community->name }}</option>
                @endforeach
            </select>
        </form>
    </div>
@endsection
