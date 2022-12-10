@extends('layouts.admin')

@section('content')
<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4>Detalles de usuario
                            <a href="{{ url('users') }}" class="btn btn-primary float-end">Regresar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="">Rol: </label>
                                <div class="border">{{ $users -> role_as == '0'? 'Usuario':'Administrador' }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Nombre: </label>
                                <div class="border">{{ $users -> name }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Apellidos: </label>
                                <div class="border">{{ $users -> lname }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Correo: </label>
                                <div class="border">{{ $users -> email }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Número de contacto: </label>
                                <div class="border">{{ $users -> phone }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Calle: </label>
                                <div class="border">{{ $users -> address1 }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Colonia: </label>
                                <div class="border">{{ $users -> address2 }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">C.P: </label>
                                <div class="border">{{ $users -> pincode }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Ciudad: </label>
                                <div class="border">{{ $users -> city }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Estado: </label>
                                <div class="border">{{ $users -> state }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">País: </label>
                                <div class="border">{{ $users -> country }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection