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
                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 align-self-center">
                            <div class="col">
                                <h4 class="text-white">Mi perfil</h4>
                            </div>
                            <div class="col">
                                <a href="{{ url('/') }}" class="btn btn-warning bg-gradient float-end" style="width: 140px">Salir</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border bg-light bg-gradient shadow-lg">
                    <form action="{{ url('update-profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 order-details">
                                <h4>Asegúrate de que toda tu información sea correcta</h4>
                                <hr>
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                                    <div class="col">
                                        <label for="">Nombre:</label>
                                        <br>
                                        <input type="text" class="form-control fname" value="{{ Auth::user()->name }}" placeholder="Ingresa tu nombre completo" name="fname">
                                        <span id="fname_error"></span>
                                    </div>
                                    <div class="col">
                                        <label for="">Apellido:</label>
                                        <br>
                                        <input type="text" class="form-control lname" value="{{ Auth::user()->lname }}" placeholder="Ingresa tu apellido" name="lname">
                                        <span id="lname_error"></span>
                                    </div>
                                    <div class="col">
                                        <label for="">Correo:</label>
                                        <br>
                                        <input type="text" class="form-control email" value="{{ Auth::user()->email }}" placeholder="Ingresa tu correo electrónico" name="email">
                                        <span id="email_error"></span>
                                    </div>
                                    <div class="col">
                                        <label for="">Teléfono:</label>
                                        <br>
                                        <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" placeholder="Ingresa tu teléfono" name="phone">
                                        <span id="phone_error"></span>
                                    </div>
                                    <div class="col">
                                        <label for="">Calle:</label>
                                        <br>
                                        <input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}" placeholder="Ingresa tu dirección 1" name="address1">
                                        <span id="address1_error"></span>
                                    </div>
                                    <div class="col">
                                        <label for="">Colonia:</label>
                                        <br>
                                        <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}" placeholder="Ingresa tu dirección 2" name="address2">
                                        <span id="address2_error"></span>
                                    </div>
                                    <div class="col">
                                        <label for="">Ciudad:</label>
                                        <br>
                                        <input type="text" class="form-control city" value="{{ Auth::user()->city }}" placeholder="Ingresa tu ciudad" name="city">
                                        <span id="city_error"></span>
                                    </div>
                                    <div class="col">
                                        <label for="">Estado:</label>
                                        <br>
                                        <input type="text" class="form-control state" value="{{ Auth::user()->state }}" placeholder="Ingresa tu estado" name="state">
                                        <span id="state_error"></span>
                                    </div>
                                    <div class="col">
                                        <label for="">País:</label>
                                        <br>
                                        <input type="text" class="form-control country" value="{{ Auth::user()->country }}" placeholder="Ingresa tu país" name="country">
                                        <span id="country_error"></span>
                                    </div>
                                    <div class="col">
                                        <label for="">C.P:</label>
                                        <br>
                                        <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}" placeholder="Ingresa tu C.P" name="pincode">
                                        <span id="pincode_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar mi información</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection