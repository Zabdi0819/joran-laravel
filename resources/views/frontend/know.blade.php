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
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">
                <div class="col align-self-center text-white">
                    <p class="fs-3 " style="text-align: justify; padding: 20px">
                        Somos una empresa dedicada a la venta de marcos de madera. Trabajamos con material de la mejor calidad para garantizar los acabados de sus proyectos.
                        <br> En <B>Marcos JORAN</B>  ofrecemos excelentes precios, es por eso que nos hemos posicionado como una empresa líder en el estado de Aguascalientes.
                    </p>
                </div>
                <div class="col">
                    <img src="{{ asset('assets/images/JORAN.png') }}" class="rounded mx-auto d-block" style="width: 70%; height: auto" alt="LOGO">

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
                        <img src="{{ asset('assets/images/marcos.jpg') }}" class="rounded mx-auto d-block" style="width: 60%; height: auto" alt="LOGO">
                    </div>
                    <div class="col-md-6 align-self-center">
                        <p class="fs-3 " style="text-align: justify; padding: 20px">
                            Contamos con más de 15 molduras y distintos tipos de productos que encajen con lo que buscas.
                        </p>
                    </div>
                </div>
                <br>
                <br>
                <h4 class="fs-3 " style="text-align: justify; padding: 20px">
                    Queremos que los espacios se vuelvan un lugar personal y que refleje el estilo de cada persona. Nos aseguramos que cada marco reciba la atención personalizada y sea de la mejor calidad. Somos una empresa a la vanguardia en decoración de interiores, manteniendo nuestro compromiso social.
                </h4>
                <br>
                <hr>
                <br>
                <h1 class="text-center" style="font-weight:bold">!Hacemos tus ideas realidad!</h1>
                <br>
                <img src="{{ asset('assets/images/collage.png') }}" class="rounded mx-auto d-block" style="width: 50%; height: auto" alt="COLLAGE">
                <br>
                <br>
            </div>
    </div>
        
@endsection