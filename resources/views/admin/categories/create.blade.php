@extends('admin.layouts.master')
@section('css')
    <link href="{{URL::asset('backend/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
    Create Category
@endsection
@section('page-header')
    <x-admin.page-header name1="dashboard" name2="create category" />
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom-1" style="border-bottom:1px solid #eee;">
                    <div class="d-flex">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-primary text-center py-2 px-3">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h3 class="card-title  mx-2 mt-2">Create Categories</h3>
                    </div>
              </div>

                <div class="card-body">
                    <form action="{{route('admin.categories.store')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label name="name">Name</label>
                                <input type="text" name="name"  value="{{old('Name')}}" class="form-control" id="name" />
                            </div>

                            <div class="col-12">
                                <label for="status">Category</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="" disabled selected>Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
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
    <!-- row closed -->
@endsection
@section('js')
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
