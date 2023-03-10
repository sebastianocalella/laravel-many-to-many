@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col-3">#id</th>
                    <th scope="col-3">name</th>
                    <th class="text-end" scope="col">
                        <a class="btn btn-sm btn-primary w-50 me-4" href="{{route('admin.tecnologies.create')}}"><i class="fa-solid fa-plus"></i> Create new element</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tecnologies as $tecnology)
                    <tr>
                        <th scope="row">{{ $tecnology->id }}</th>
                        <td>{{ $tecnology->name }}</td>
                        <td class="d-flex justify-content-end px-5">
                            <a class="btn btn-sm btn-primary" href="{{route('admin.tecnologies.show', $tecnology->slug)}}"><i class="fa-solid fa-eye"></i></a>
                            <a class="btn btn-sm btn-success mx-3" href="{{route('admin.tecnologies.edit', $tecnology->slug)}}"><i class="fa-solid fa-pencil"></i></a>
                            <form class="d-inline" action="{{route('admin.tecnologies.destroy', $tecnology->slug)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection