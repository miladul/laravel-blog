@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Category List</h3>
                                <a class="btn btn-primary" href="{{ route('category.create')}}">Create Category</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Post Count</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($categories->count()>0)
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->id }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info mr-1"> <i class="fa fa-edit"></i> </a>

                                        <form action="{{ route('category.destroy',$category->id) }}" class="mr-1" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>

                                        </form>


                                        <a href="{{ route('category.show',$category->id) }}" class="btn btn-success" data-toggle="modal" data-target="#view"> <i class="fa fa-eye"></i> </a>


                                    </td>
                                </tr>
                                @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="5">Categories not Found</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Category Tittle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Name: </td>
                                <td>Mobile phone</td>
                            </tr>
                            <tr>
                                <td>Slug: </td>
                                <td>mobile-phone</td>
                            </tr>
                            <tr>
                                <td>Discription: </td>
                                <td>mobile-phone mobile-phone mobile-phone mobile-phone</td>
                            </tr>
                        </tbody>


                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->


@endsection
