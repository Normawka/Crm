@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>About project:</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('project.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Project Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <h3 class="profile-username text-center">{{$project->name}}</h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Description : </b>
                                        <p>{{$project->description}}</p>
                                    </li>
                                    <a href="{{route('project.edit',$project->id)}}"
                                       class="btn btn-primary btn-block"><b>Edit</b></a>
                                    <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Tasks</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($project->tasks as $task)
                                <tr>
                                    <td>{{$task->id}}</td>
                                    <td>{{$task->name}}</td>
                                    <td>{{$task->description}}</td>

                                    <td>{{$task->status->name}}</td>

                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{$task->created_at}}</div>
                                    </td>
                                    <td>
                                    <form action="{{route("tasks.destroy",$task->id) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('tasks.show',$task->id) }}">Show</a>

                                        <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a  href="{{route('project.tasks.create',$project->id)}}" type="submit" class="btn btn-sm btn-info float-left">Add task</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </section>
    </div>


@endsection
