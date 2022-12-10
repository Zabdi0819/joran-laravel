@extends('layouts.front')

@section('title')
    Mi carrito de compras
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bgCSubNav">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Inicio</a> /
                <a href="{{ url('cart') }}">Carrito de compras</a>
            </h6>
        </div>
    </div>
    <div class="container py-3 my-0">
        <div class="card shadow">
            <div class="card-body">
                @if ($caritems -> count() > 0)
                <h3>Total de artículos: <span class="badge badge-pill bg-dark cart-count">0</span></h3>
                <hr>
                @php $total = 0;@endphp
                @foreach ($caritems as $item)
                    <div class="row product_data">
                        <div class="col-md-2 my-auto">
                            <img src="{{ asset('assets/uploads/product/'.$item->products->image) }}" height="90px" width="90px" alt="Image here">
                        </div>
                        <div class="col-md-2">
                            <h3>{{ $item->products->name }}</h3>
                        </div>
                        <div class="col-md-3">
                            <h6>$ {{ $item->products->selling_price }}</h6>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                            @if($item -> products -> qty >= $item -> prod_qty)
                                <label for="Quantity">Cantidad</label>
                                <div class="input-group text-center mb-3" style="width: 130px;">
                                    <button class="input-group-text changeQuantity decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}"/>
                                    <button class="input-group-text changeQuantity increment-btn">+</button>
                                </div>
                                @php $total += $item->products->selling_price * $item->prod_qty; @endphp
                            @else
                                <h6 style="font-weight: bold;">Cantidad insuficiente en stock</h6>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Eliminar</button>
                        </div>
                    </div>
                    <hr>
                    
                @endforeach
            </div>
            <div class="card-footer">
                <h6 class="my-1">Precio Total : {{ $total }}
                    <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end my-3">Pagar ahora</a>
                </h6>
            </div>
            @else
                <div class="card-body text-center">
                    <h2>Tu <i class="fa fa-shopping-cart"></i>  está vacío</h2>
                    <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continúa comprando</a>
                </div>
            @endif
        </div>
    </div>
    <br> <br>
@endsection