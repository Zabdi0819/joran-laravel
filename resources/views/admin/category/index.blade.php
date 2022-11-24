@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Categorías</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Accción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $item -> id }}</td>
                            <td>{{ $item -> name }}</td>
                            <td>{{ $item -> description }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/category/'.$item -> image) }}" class= "cate-image" alt="Image here">
                            </td>
                            <td>
                                <a href="{{ url('edit-prod/'.$item -> id) }}" class="btn btn-primary">Editar</a>
                                <a href="{{ url('delete-category/'.$item -> id) }}" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection