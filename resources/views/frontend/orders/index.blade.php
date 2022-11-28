@extends('layouts.front')

@section('title')
    Mis órdenes
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Mis órdenes</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Fecha de orden</th>
                            <th>Número de rastreo</th>
                            <th>Precio total</th>
                            <th>Estado de la orden</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($item -> created_at)) }}</td>
                                    <td>{{ $item -> tracking_no }}</td>
                                    <td>{{ $item -> total_price }}</td>
                                    <td>{{ $item -> status == '0' ? 'Pendiente':'Completada' }}</td>
                                    <td>
                                        <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-primary">Ver</a>
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