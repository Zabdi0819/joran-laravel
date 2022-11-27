@extends('layouts.front')

@section('title')
    {{ $category -> name }}
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-blue border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('category') }}">Colecciones</a> /
            <a href="{{ url('view-category/'.$category -> slug) }}">{{ $category -> name }}</a>
        </h6>
    </div>
</div>
    <div class="py-5">
        <div class="container">
            <h2>{{ $category -> name }}</h2>
            <br>
            <div class="row">
                @foreach ($products as $prod)
                    <div class="col-md-3 mb-3">
                        <a href="{{ url('category/'.$category -> name.'/'.$prod -> slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/product/'.$prod->image) }}" alt="Imagen de producto">
                                <div class="card-body">
                                    <h5>{{ $prod->name }}</h5>
                                    <span class="float-start">{{ $prod->selling_price }}</span>
                                    <span class="float-end"><s>{{ $prod->original_price }}</s></span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection