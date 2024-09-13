@extends('admin.layouts.master')
@section('title')
    Edit City
@endsection

@section('page-header')
    <x-admin.page-header name1="dashboard" name2="edit city"/>
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom-1" style="border-bottom:1px solid #eee;">
                    <div class="d-flex">
                        <a href="{{ route('admin.states.index') }}"
                           class="btn btn-sm btn-primary text-center py-2 px-3">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h3 class="card-title  mx-2 mt-2">Edit City</h3>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.cities.update', $city->id)}}" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12 mb-2">
                                <label name="name">Name</label>
                                <input type="text" name="name" value="{{old('name', $city->name)}}"
                                       class="form-control" id="name" required/>
                            </div>


                            <div class="col-12">
                                <label for="state">State</label>
                                <select class="form-control SlectBox" name="state" id="state">
                                    <option value="" selected disabled>Selected</option>
                                    @foreach($states as $state)
                                        <option
                                            value="{{$state->id}}"  {{$city->state_id === $state->id ? 'selected' : ''}}>{{ucwords($state->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

