@extends('layouts.admin')

@section('title')
    Órdenes
@endsection

@section('content')
    <div class="py-3">
        <div class="container bg-light">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4>Historial de órdenes
                            <a href="{{ url('orders') }}" class="btn btn-warning float-end">Regresar</a>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body bg-white" style="overflow-x:scroll; width: 100%">
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
                                            <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-primary">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection