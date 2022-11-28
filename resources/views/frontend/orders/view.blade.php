@extends('layouts.front')

@section('title')
    Mis órdenes
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Orden {{ $orders -> tracking_no }}
                            <a href="{{ url('my-orders') }}" class="btn btn-warning float-end">Regresar</a>
                        </h4>
                    </div>
                </div>
                <div class="card-body border">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Detalles de envío</h4>
                            <hr>
                            <label for="">Nombre: </label>
                            <div class="border">{{ $orders -> fname }}</div>
                            <label for="">Apellido: </label>
                            <div class="border">{{ $orders -> lname }}</div>
                            <label for="">Correo: </label>
                            <div class="border">{{ $orders -> email }}</div>
                            <label for="">Número de contacto: </label>
                            <div class="border">{{ $orders -> phone }}</div>
                            <label for="">Dirección de entrega: </label>
                            <div class="border">
                                {{ $orders -> address1 }} <br>
                                {{ $orders -> address2 }} <br>
                                {{ $orders -> city }} <br>
                                {{ $orders -> state }} <br>
                                {{ $orders -> country }}
                            </div>
                            <label for="">C.P: </label>
                            <div class="border">{{ $orders -> pincode }}</div>
                        </div>
                        <div class="col-md-6 order-details">
                            <h4>Detalles de la orden</h4>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>imagen</th>
                                </thead>
                                <tbody>
                                    @foreach ($orders ->orderitems as $item)
                                        <tr>
                                            <td>{{ $item -> products -> name }}</td>
                                            <td>{{ $item -> qty }}</td>
                                            <td>{{ $item -> price }}</td>
                                            <td>
                                                <img src="{{ asset('assets/uploads/product/'.$item -> products -> image) }}" width="80px" alt="Producto">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Total:  <span  class= "float-end">${{ $orders -> total_price }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection