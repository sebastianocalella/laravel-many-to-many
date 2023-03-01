@extends('layouts.admin')

@section('content')
    @include('admin.tecnologies.partials.editCreateForm', ['method' => 'POST', 'routeName' => 'admin.tecnologies.store'])
@endsection