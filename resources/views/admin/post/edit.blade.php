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
                                <h3 class="card-title">Edit Post</h3>
                                <a class="btn btn-primary" href="{{ route('post.index')}}">Go back to Post List</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-sm-8 mx-auto">
                                    <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')
                                            {{--@include('includes.success')--}}
                                            <div class="form-group">
                                                <label for="name">Post Title</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter name" value="{{ $post->title }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Post Photo</label>
                                                <img src="{{ asset('/assets/post/img/')}}/{{ $post->image }}" class="image-fluid" alt="Image" width="50px">
                                                <br>
                                                <label for="name">Upload New Photo</label>
                                                <input type="file" name="image" class="form-control">
                                                <label for="name">Post Category</label>
                                                <select class="form-control" name="category_id">
                                                    <option>Select category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ ($post->category_id==$category->id)?'selected':'' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="details">Discription</label>
                                                <textarea class="form-control" id="description" name="description" placeholder="Enter discription"> {{ (!empty($post)?$post->description:'')  }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="create" class="btn btn-primary">Update Post</button>
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
