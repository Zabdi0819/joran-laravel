@extends('layouts.front')

@section('title')
    Categorías
@endsection

@section('content')
    <div class="py-2 mb-2 shadow-sm bgCSubNav">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Inicio</a> /
                <a href="{{ url('category') }}">
                    Categorías
                </a> 
            </h6>
        </div>
    </div>
    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Todas nuestras categorías</h2>
                    <br>
                    <div class="row">
                        @foreach ($category as $cate)
                            <div class="col-md-3 mb-3">
                                <a href="{{ url('view-category/'.$cate->slug) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/category/'.$cate->image) }}" alt="Imagen de categoría">
                                        <div class="card-body">
                                            <h5>{{ $cate->name }}</h5>
                                            <p class="float-start">{{ $cate->description }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
@endsection