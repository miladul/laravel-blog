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
                        <li class="breadcrumb-item active">Tag</li>
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
                                <h3 class="card-title">Tag Name</h3>
                                <a class="btn btn-primary" href="{{ route('tag.index')}}">Back to Tag List</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                           <table class="ml-3 table table-bordered">
                               <tr>
                                   <th>ID: </th>
                                   <td>{{ $tag->id }}</td>
                               </tr>
                               <tr>
                                   <th>Name: </th>
                                   <td>{{ $tag->name }}</td>
                               </tr>

                               <tr>
                                   <th>slug: </th>
                                   <td>{{ $tag->slug }}</td>
                               </tr>
                               <tr>
                                   <th>Description: </th>
                                   <td>{{ $tag->description }}</td>
                               </tr>

                           </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
