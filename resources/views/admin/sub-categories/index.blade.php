@extends('admin.layouts.master')
@section('css')
    <link href="{{URL::asset('backend/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection

@section('page-header')
    <x-admin.page-header name1="dashboard" name2="all sub categories" />
@endsection

@section('content')
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">All Sub Categories</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.sub-categories.create') }}" class="btn btn-sm btn-info">Add New Sub Category</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ucwords($subcategory->parent->name)}}</td>
                                    <td>{{$subcategory->name}}</td>
                                    <td>{{$subcategory->status == 1 ? 'Active':'Inactive'}}</td>
                                    <td>
                                        <a href="{{route('admin.sub-categories.edit',$subcategory->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deleted{{$subcategory->id}}"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @include('admin.sub-categories.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
                <div class="card-footer">
                    <div class="mt-3 d-flex justify-content-between">
                        <div>
                            Showing {{  $subcategories->firstItem() }}
                            to {{  $subcategories->lastItem() }}
                            of {{  $subcategories->total() }} entries
                        </div>
                        <div>
                            {{  $subcategories->links() }}
                        </div>
                    </div>
                </div>
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
