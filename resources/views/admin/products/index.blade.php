@extends('layouts.admin')

@section('content')
    <div class="py-3">
        <div class="container">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>Productos</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Categoría</th>
                                <th>Nombre</th>
                                <th>Precio de venta</th>
                                <th>Imagen</th>
                                <th>Accción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item -> id }}</td>
                                    <td>{{ $item -> category -> name }}</td>
                                    <td>{{ $item -> name }}</td>
                                    <td>{{ $item -> selling_price }}</td>
                                    <td>
                                        <img src="{{ asset('assets/uploads/product/'.$item -> image) }}" class= "cate-image" alt="Image here">
                                    </td>
                                    <td>
                                        <a href="{{ url('edit-product/'.$item -> id) }}" class="btn btn-primary btn-sm">Editar</a>
                                        <a href="{{ url('delete-product/'.$item -> id) }}" onclick="return confirm('¿Estás seguro de eliminar la categoría de {{ $item -> name }}?')" class="btn btn-danger btn-sm">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection