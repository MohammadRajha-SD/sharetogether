@extends('admin.layouts.master')
@section('css')
<<<<<<< HEAD
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect.css')}}" />
    <link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection

@section('title')
    Create Sub Category
@endsection

@section('page-header')
    <x-admin.page-header name1="dashboard" name2="create sub category" />
=======
    <link href="{{URL::asset('backend/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
    Create Category
@endsection
@section('page-header')
    <x-admin.page-header name1="dashboard" name2="create category" />
>>>>>>> origin/main
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom-1" style="border-bottom:1px solid #eee;">
                    <div class="d-flex">
<<<<<<< HEAD
                        <a href="{{ route('admin.sub-categories.index') }}" class="btn btn-sm btn-primary text-center py-2 px-3">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h3 class="card-title  mx-2 mt-2">Create Sub Categories</h3>
=======
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-primary text-center py-2 px-3">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h3 class="card-title  mx-2 mt-2">Create Categories</h3>
>>>>>>> origin/main
                    </div>
              </div>

                <div class="card-body">
<<<<<<< HEAD
                    <form action="{{route('admin.sub-categories.store')}}" method="post" autocomplete="off">
=======
                    <form action="{{route('admin.categories.store')}}" method="post" autocomplete="off">
>>>>>>> origin/main
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label name="name">Name</label>
<<<<<<< HEAD
                                <input type="text" name="name"  value="{{old('name')}}" class="form-control" id="name" />
                            </div>

                            <div class="col-12 mb-2">
                                <label for="category">Category</label>
                                <select class="SlectBox form-control" name="category" id="category">
                                    <option value="" disabled selected>Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{old('category') ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="status">Status</label>
                                <select class="SlectBox form-control" name="status" id="status">
                                    <option value="1"  {{old('status') == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0"  {{old('status') == 0 ? 'selected' : ''}}>Inactive</option>
=======
                                <input type="text" name="name"  value="{{old('Name')}}" class="form-control" id="name" />
                            </div>
                            <div class="col-12">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
>>>>>>> origin/main
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
<<<<<<< HEAD
    <script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
=======
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifit-custom.js')}}"></script>
>>>>>>> origin/main
@endsection
