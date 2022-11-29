@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-weight: 900; font-size:24px;">{{ __('Registro exitoso') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h4 style="font-size: 22px">{{ __('Bienvenido!') }}
                    
                    <a href="{{ url('/') }}" class="btn btn-primary float-end">Comenzar</a></h4>
            </div>
        </div>
    </div>
</div>
@endsection
