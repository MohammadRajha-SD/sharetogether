@extends('admin.layouts.master')

@section('title')
    Create City
@endsection
@section('page-header')
    <x-admin.page-header name1="dashboard" name2="create city" />
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom-1" style="border-bottom:1px solid #eee;">
                    <div class="d-flex">
                        <a href="{{ route('admin.cities.index') }}" class="btn btn-sm btn-primary text-center py-2 px-3">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h3 class="card-title  mx-2 mt-2">Create City</h3>
                    </div>
              </div>

                <div class="card-body">
                    <form action="{{route('admin.cities.store')}}" method="post" autocomplete="off">
                        @csrf

                        <div class="row">
                            <div class="col-12 mb-2">
                                <label name="name">Name</label>
                                <input type="text" name="name"  value="{{old('name')}}" class="form-control" id="name" required />
                            </div>

                            <div class="col-12">
                                <label for="state">State</label>
                                <select class="form-control SlectBox" name="state" id="state">
                                    <option value="" selected disabled>Selected</option>
                                    @foreach($states as $state)
                                        <option
                                            value="{{$state->id}}" >{{ucwords($state->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
