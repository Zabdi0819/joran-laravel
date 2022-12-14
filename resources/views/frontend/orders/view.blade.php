@extends('layouts.front')

@section('title')
    Mis órdenes
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark bg-gradient">
                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 align-self-center">
                            <div class="col">
                                <h4 class="text-white">Folio: {{ $orders -> tracking_no }}</h4>
                            </div>
                            <div class="col">
                                <a href="{{ url('view-pdf/'.$orders->id) }}" class="btn btn-primary bg-gradient float-end" style="width: 140px">Descargar PDF</a>
                            </div>
                            <div class="col">
                                <a href="{{ url('my-orders') }}" class="btn btn-warning bg-gradient float-end" style="width: 140px">Regresar</a>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="card-body border bg-light bg-gradient shadow-lg">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Detalles de envío</h4>
                            <hr>
                            <label for="">Nombre: </label>
                            <div class="border border-dark">{{ $orders -> fname }}</div>
                            <label for="">Apellido: </label>
                            <div class="border border-dark">{{ $orders -> lname }}</div>
                            <label for="">Correo: </label>
                            <div class="border border-dark">{{ $orders -> email }}</div>
                            <label for="">Número de contacto: </label>
                            <div class="border border-dark">{{ $orders -> phone }}</div>
                            <label for="">Dirección de entrega: </label>
                            <div class="border border-dark">
                                {{ $orders -> address1 }} <br>
                                {{ $orders -> address2 }} <br>
                                {{ $orders -> city }} <br>
                                {{ $orders -> state }} <br>
                                {{ $orders -> country }}
                            </div>
                            <label for="">C.P: </label>
                            <div class="border border-dark">{{ $orders -> pincode }}</div>
                        </div>
                        <div class="col-md-6 order-details">
                            <h4>Detalles de la orden</h4>
                            <hr>
                            <table class="table table-bordered border-dark">
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
                            <h3 class="px-2">Total:  <span  class= "float-end">${{ $orders -> total_price }}</span></h3>
                            <h4 class="px-2">{{ $orders -> payment_mode }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection