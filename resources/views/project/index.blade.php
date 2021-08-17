@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Projects</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('project.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row">
                        @foreach($projects as $project)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                       <h4><b>{{$project->name}}</b></h4>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-muted text-sm"><b>About project: </b> {{$project->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <form action="{{route('project.destroy',$project->id)}}" method="POST">
                                                <a href="{{route('project.show',$project->id)}}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-user"></i> View Project
                                                </a>
                                                <a href="{{route('project.edit',$project->id)}}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-user"></i> Edit Project
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete Project</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <nav aria-label="Contacts Page Navigation">
                        <ul class="pagination justify-content-center m-0">
                            <li class="page-item">{{$projects->onEachSide(5)->links()}}</li>
                        </ul>
                    </nav>

                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
