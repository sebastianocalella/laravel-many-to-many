@extends('layouts.admin')

@section('content')
    @include('admin.tecnologies.partials.editCreateForm', ['method' => 'PUT', 'routeName' => 'admin.tecnologies.update'])
@endsection