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
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Create Post</li>
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
                                <h3 class="card-title">Create Post</h3>
                                <a class="btn btn-primary" href="{{ route('post.index')}}">Go back to Post List</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-sm-8 mx-auto">
                                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')
                                            {{--@include('includes.success')--}}
                                            <div class="form-group">
                                                <label for="name">Post Title</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Post Photo</label>
                                                <input type="file" name="image" class="form-control">
                                                <label for="name">Post Category</label>
                                                <select class="form-control" name="category_id">
                                                    <option>Select category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="details">Discription</label>
                                                <textarea class="form-control" id="description" name="description" placeholder="Enter discription"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="create" class="btn btn-primary">Create Post</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
