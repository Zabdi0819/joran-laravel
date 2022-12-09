@extends('layouts.front')

@section('title')
    Bienvenido
@endsection

@section('content')
    <div class="container p-2">
        <br>
        <h1 class="text-center"><strong>Facturación</strong></h1>
        <br>
        <p class="h5" style="text-align: justify;">
            <strong>
                Si necesitas factura, envíanos un correo con tu número de orden y su constancia de situación fiscal a nuestro correo electrónico proyectojoran@gmail.com.
                <br><br>IMPORTANTE: La factura solo se podrá pedir 15 días después y dentro del mes en curso a partir de cuando se hizo la compra.
            </strong><br>  <br>
        </p> <br>
        <img src="{{ asset('assets/images/factura.jpg') }}" class="rounded mx-auto d-block" style="width: 30%; height: auto" alt="">
        <br>
        <br>
        <br>
    </div>
@endsection