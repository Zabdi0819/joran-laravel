@extends('layouts.front')

@section('title')
    Mi carrito de compras
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-blue border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Inicio</a> /
                <a href="{{ url('cart') }}">Carrito de compras</a>
            </h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
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
                            <label for="Quantity">Cantidad</label>
                            <div class="input-group text-center mb-3" style="width: 130px;">
                                <button class="input-group-text changeQuantity decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}"/>
                                <button class="input-group-text changeQuantity increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Eliminar</button>
                        </div>
                    </div>
                    <hr>
                    @php $total += $item->products->selling_price * $item->prod_qty; @endphp
                @endforeach
            </div>
            <div class="card-footer">
                <h6 class="my-1">Precio Total : {{ $total }}
                    <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end my-3">Pagar ahora</a>
                </h6>
            </div>
        </div>
    </div>
@endsection