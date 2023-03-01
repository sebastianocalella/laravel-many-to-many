@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="card text-white bg-dark text-center">
            <div class="card-header">
                <h2>{{$project->title}}</h2>
            </div>
            <div class="card-body">
                <h3 class="card-title"><span class="text-secondary">designed by: </span>{{$project->author}} <span class="text-secondary"> --- a </span>{{$project->type->name}} <span class="text-secondary">project</span></h3>
                <div class="card-image">
                    @if (str_starts_with($project->image_path, 'http'))
                        <img src="{{$project->image_path}}"
                    @else
                        <img src="{{asset('storage/' . $project->image_path)}}"
                    @endif
                    alt="project cover" class="img-fluid">
                </div>
                <div class="row align-items-center my-4">
                    @if (isset($previousProject))
                        <div class="col-2">
                            <a class="btn btn-outline-primary" href="{{route('admin.projects.show',$previousProject->slug)}}">previous</a>
                        </div>
                    @else
                        <div class="col-2">
                            <a class="btn btn-outline-secondary disabled" href="">previous</a>
                        </div>
                    @endif

                    <div class="col-8">
                        <p class="card-text">{{$project->description}}</p>
                    </div>

                    @if (isset($nextProject))
                        <div class="col-2">
                            <a class="btn btn-outline-primary" href="{{route('admin.projects.show',$nextProject->slug)}}">next</a>
                        </div>
                    @else
                        <div class="col-2">
                            <a class="btn btn-outline-secondary disabled" href="">next</a>
                        </div>
                    @endif
                </div>
                <a href="{{route('admin.projects.index')}}" class="btn btn-primary">projects list</a>
            </div>
            <div class="card-footer text-muted">
                {{$project->modification_date}}
            </div>
        </div>
    </div>
@endsection
