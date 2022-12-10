@extends('layouts.admin')

@section('content')
<div class="py-3">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Bienvenido a tu panel de administrador</h1>
                <br>
                <br>
                <h3>En este panel es posible realizar lo siguiente:</h3>
                <br>
                <ul class="h4" style="text-align: justify;">
                    <li>Visualizar las categprías existentes.</li>
                    <li>Agregar categorías nuevas.</li>
                    <li>Visualizar los productos existentes.</li>
                    <li>Agregar productos nuevos.</li>
                    <li>Consultar el historial de las órdenes realizadas por parte de los usuarios.</li>
                    <li>Visualizar los usuarios que se han registrado en el sitio web.</li>
                </ul>
                <a href="{{ url('/') }}" class="btn btn-info btn-lg text-center float-end">
                    Ver tu sitio
                </a>
            </div>
        </div>
            
    </div>
</div>
    
@endsection