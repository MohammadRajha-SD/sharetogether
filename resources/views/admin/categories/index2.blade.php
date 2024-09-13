@extends('admin.layouts.master')

@section('css')
    <link href="{{URL::asset('backend/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection

@section('page-header')
    <x-admin.page-header name1="dashboard" name2="all categories" />
@endsection

@section('content')
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">All Categories</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-info">Add New Category</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->status == 1 ? 'Active':'Inactive'}}</td>
                                    <td>
                                        <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deleted{{$category->id}}"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @include('admin.categories.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
