@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="card text-white bg-dark text-center">
            <div class="card-header">
                <h2>{{$tecnology->name}}</h2>
            </div>
            <div class="card-body">
                <a href="{{route('admin.tecnologies.index')}}" class="btn btn-primary">tecnologies list</a>
            </div>
        </div>
    </div>
@endsection
