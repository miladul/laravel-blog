@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tag List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Tag</li>
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
                                <h3 class="card-title">Edit Tag</h3>
                                <a class="btn btn-primary" href="{{ route('tag.index')}}">Go back to Tag List</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-sm-8 mx-auto">
                                    <form action="{{route('tag.update',$tag->id)}}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')
                                            {{--@include('includes.success')--}}
                                            <div class="form-group">
                                                <label for="name">Tag Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="details">Description</label>
                                                <textarea class="form-control" id="description" name="description" value="jdsghf" placeholder="Enter description">{{ $tag->description }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Update Tag</button>
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
