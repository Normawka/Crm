@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{isset($project)?'About superhero:':'Create superhero:'}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('project.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Create project</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" enctype="multipart/form-data"
                  @if (isset($project))
                  action="{{route('project.update',$project)}}"
                  @else
                  action="{{route('project.store')}}"
                @endif  >
                @csrf
                @isset($project)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{isset($project)?'About Project:':'Create project:'}}
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Project name</label>
                                    <input type="text" name="name" placeholder="name" aria-label="name"
                                           value="{{old('name',isset($project) ? $project->name:null)}}" class="form-control" >
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputPhone">Project description</label>
                                    <textarea class="form-control" type="text"  name="description" rows="5" id="description">{{old('description',isset($project) ? $project->description:null)}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{route('project.index')}}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" value="Create new Client" class="btn btn-success float-right">{{isset($project)?'Update project':'Create project'}}</button>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>







@endsection
