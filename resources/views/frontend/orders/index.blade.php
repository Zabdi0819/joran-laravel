@extends('layouts.front')

@section('title')
    Mis órdenes
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header bg-dark bg-gradient text-white">
                        <h4>Mis órdenes</h4>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:scroll; width: 100%">
                    <table class="table table-bordered border-dark bg-light bg-gradient shadow-lg">
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