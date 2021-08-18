@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{isset($task)?'About task:':'Create task:'}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('project.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Create task</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" enctype="multipart/form-data"
                  @if (isset($task))
                  action="{{route('tasks.update',$task)}}"
                  @else
                  action="{{route('project.tasks.store',$project->id)}}"
                @endif  >
                @csrf
                @isset($task)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{isset($task)?'About task:':'Create task:'}}
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Task name</label>
                                    <input type="text" name="name" placeholder="name" aria-label="name"
                                           value="{{old('name',isset($task) ? $task->name:null)}}" class="form-control" >
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
{{--                                @dd($status)--}}
                                <select class="form-select form-control" name="status_id" id="status_id" aria-label="status_id">
                                    @foreach($status as $status)

                                        <option name="status_id" id="status_id" aria-label="status_id" value="{{$status->id}}">{{$status->name}}</option>

                                    @endforeach

                                </select>
                              <div>

                                <input type="hidden" name="project_id" id="project_id"
                                       @if (isset($task))
                                       value="{{old('project_id',isset($project) ? $project:null)}}"
                                       @else
                                       value="{{old('project_id',isset($project) ? $project->id:null)}}"
                                    @endif
                                     class="form-control" >
                              </div>
                                <div class="form-group">
                                    <label for="inputPhone">Task description</label>
                                    <textarea class="form-control" type="text"  name="description" rows="5" id="description">{{old('description',isset($task) ? $task->description:null)}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                    <div class="form-group">
                                        <strong>File:</strong> @isset($task)
                                        <a class="list-group-item" href="{{asset("file/$task->file")}}">
                                            <p> Download file :  {{$task->file}}</p>
                                        </a>
                                        @endisset
                                            <input type="file" name="file" class="form-control" placeholder="file">
                                    </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
{{--                @dd($task)--}}
                    <div class="row">
                        <div class="col-12">

                            <a @if (isset($task))
                               href="{{route('project.store',$task->project_id)}}"
                               @else
                               href="{{route('project.store',$project->id)}}"
                               @endif  class="btn btn-secondary">Cancel</a>
                            <button type="submit" value="Create new Client" class="btn btn-success float-right">{{isset($task)?'Update task':'Create task'}}</button>
                        </div>
                    </div>
            </form>
        </section>
        <!-- /.content -->
    </div>








@endsection
