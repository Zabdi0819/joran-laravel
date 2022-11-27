@extends('layouts.front')

@section('title')
    Pagar ahora
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{  url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Detalles</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">Nombre:</label>
                                    <br>
                                    <input type="text" class="form'control" value="{{ Auth::user()->name }}" placeholder="Ingresa tu nombre completo" name="fname">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Apellido:</label>
                                    <br>
                                    <input type="text" class="form'control" value="{{ Auth::user()->lname }}" placeholder="Ingresa tu apellido" name="lname">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Correo:</label>
                                    <br>
                                    <input type="text" class="form'control" value="{{ Auth::user()->email }}" placeholder="Ingresa tu correo electrónico" name="email">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Teléfono:</label>
                                    <br>
                                    <input type="text" class="form'control" value="{{ Auth::user()->phone }}" placeholder="Ingresa tu teléfono" name="phone">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Dirección 1:</label>
                                    <br>
                                    <input type="text" class="form'control" value="{{ Auth::user()->address1 }}" placeholder="Ingresa tu dirección 1" name="address1">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Dirección 2:</label>
                                    <br>
                                    <input type="text" class="form'control" value="{{ Auth::user()->address2 }}" placeholder="Ingresa tu dirección 2" name="address2">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Ciudad:</label>
                                    <br>
                                    <input type="text" class="form'control" value="{{ Auth::user()->city }}" placeholder="Ingresa tu ciudad" name="city">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Estado:</label>
                                    <br>
                                    <input type="text" class="form'control" value="{{ Auth::user()->state }}" placeholder="Ingresa tu estado" name="state">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">País:</label>
                                    <br>
                                    <input type="text" class="form'control" value="{{ Auth::user()->country }}" placeholder="Ingresa tu país" name="country">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">C.P:</label>
                                    <br>
                                    <input type="text" class="form'control" value="{{ Auth::user()->pincode }}" placeholder="Ingresa tu C.P" name="pincode">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Detalles de compra</h6>
                            <hr>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr style="font-weight: bold;">
                                        <td>Nombre</td>
                                        <td>Cantidad</td>
                                        <td>Precio</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($caritems as $item)
                                        <tr>
                                            <td>{{ $item -> products -> name }}</td>
                                            <td>{{ $item -> prod_qty }}</td>
                                            <td>{{ $item -> products -> selling_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <button type="submit" class="btn btn-primary float-end">Confirmar orden</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection