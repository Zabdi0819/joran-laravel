@extends('layouts.front')

@section('title')
    Bienvenido
@endsection

@section('content')
    <div class=" py-0 mb-6 shadow-lg">
        <div class="container-fluid" style="background-image: url('assets/images/fondoMadera.jpg');">
            <br>
            <br>
            <h1 class="text-white text-center">¿Quiénes somos?</h1>
            <div class="row">
                <div class="col-md-6 align-self-center text-white">
                    <p class="fs-3 " style="text-align: justify; padding: 20px">
                        Somos una empresa dedicada a la venta de marcos de madera. Trabajamos con material de la mejor calidad para garantizar los acabados de sus proyectos.
                        <br> En <B>Marcos JORAN</B>  ofrecemos excelentes precios, es por eso que nos hemos posicionado como una empresa líder en el estado de Aguascalientes.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/JORAN.png') }}" class="rounded mx-auto d-block" style="width: 400px" alt="LOGO">

                </div>
            </div>

            <p class="fs-3 text-white " style="text-align: justify; padding: 30px">
                Nuestro compromiso es satisfacer sus necesidades con soluciones óptimas que ayuden a mejorar sus procesos de producción. <br>
                Tenemos un amplio inventario con madera de diferentes medidas y origen, así que siempre podrá encontrar lo que necesite en un solo lugar.                        
            </p>
        </div>
        <div class=" py-2 mb-6">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 align-self-center text-white">
                        <img src="{{ asset('assets/images/marcos.jpg') }}" class="rounded mx-auto d-block" style="width: 400px" alt="LOGO">
                    </div>
                    <div class="col-md-6">
                        <p class="fs-3 " style="text-align: justify; padding: 20px">
                            Contamos con más de 15 molduras y distintos tipos de productos que encajen con lo que buscas.
                        </p>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <h1 class="text-center" style="font-weight:bold">!Hacemos tus ideas realidad!</h1>
            </div>
    </div>
        
@endsection