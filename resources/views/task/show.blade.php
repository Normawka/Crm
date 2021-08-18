@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>About task:</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('project.show',$task->project_id)}}">Home</a></li>
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
                                <h3 class="profile-username text-center">{{$task->name}}</h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Status : </b>
{{--                                        @dd($task->status['name'])--}}
                                        <p><b>{{$task->status['name']}}</b></p>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Description : </b>
                                        <p>{{$task->description}}</p>
                                    </li>
                                    <a class="list-group-item" href="{{asset("file/$task->file")}}">
                                        <b>File download : </b>
                                        <p>{{$task->file}}</p>
                                    </a>
                                    <a href="{{route('tasks.edit',$task->id)}}"
                                       class="btn btn-primary btn-block"><b>Edit</b></a>
                                    <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>




@endsection
