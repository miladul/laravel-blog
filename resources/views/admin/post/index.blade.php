@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Post List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                        <li class="breadcrumb-item active">Post</li>
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
                                <h3 class="card-title">Post List</h3>
                                <a class="btn btn-primary" href="{{ route('post.create')}}">Create Post</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($posts->count()>0)
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>
                                        <div style="max-height: 70px; max-width: 70px; overflow: hidden">
                                            <img src="{{ asset('$post->image') }}" class="image-fluid" alt="Image">

                                        </div>
                                    </td>
                                    <td>{{ $post->slug }}</td>
                                    <td>{{ $post->id }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-info mr-1"> <i class="fa fa-edit"></i> </a>

                                        <form action="{{ route('post.destroy',$post->id) }}" class="mr-1" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>

                                        </form>


                                        <a href="{{ route('post.show',$post->id) }}" class="btn btn-success" data-toggle="modal" data-target="#view"> <i class="fa fa-eye"></i> </a>


                                    </td>
                                    <td>{{ $post->id }}</td>
                                </tr>
                                @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="6">Posts not Found</td>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Post Tittle</h5>
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
