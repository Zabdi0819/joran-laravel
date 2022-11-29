@extends('layouts.front')

@section('title')
    Mi carrito de compras
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-blue border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Inicio</a> /
                <a href="{{ url('wishlist') }}">Favoritos</a>
            </h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                @if ($wishlists -> count() > 0)
                    @foreach ($wishlists as $item)
                        <div class="row product_data">
                            <div class="col-md-2 my-auto">
                                <img src="{{ asset('assets/uploads/product/'.$item->products->image) }}" height="90px" width="90px" alt="Image here">
                            </div>
                            <div class="col-md-2 my-auto">
                                <h5>{{ $item->products->name }}</h5>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h5>$ {{ $item->products->selling_price }}</h5>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                @if($item -> products -> qty >= $item -> prod_qty)
                                    <h5 style="font-weight: bold;">Producto disponible</h5>
                                    <label for="Quantity">Cantidad</label>
                                <div class="input-group text-center mb-3" style="width: 130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="1"/>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                                @else
                                    <h5 style="font-weight: bold;">Producto agotado</h5>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-success btn-sm addToCartBtn"><i class="fa fa-shopping-cart"></i> Agregar al carrito</button>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger btn-sm delete-wishlist-item"><i class="fa fa-trash"></i> Eliminar</button>
                            </div>
                        </div>
                        <hr>
                        
                    @endforeach
                </div>
                @else
                    <h4>No hay productos en tu lista de favoritos</h4>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.addToCartBtn').click(function(e){
                e.preventDefault();
                
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "{{ route('add-to-cart') }}",
                    data:{
                        'product_id': product_id,
                        'product_qty': product_qty,
                    },
                    success: function(response){
                        swal(response.status);
                    }
                });
            });
        });
        $('.delete-wishlist-item').click(function(e){
            e.preventDefault();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
    
            $.ajax({
                method: "POST",
                url: "delete-wishlist-item",
                data:{
                    'prod_id': prod_id
                },
                success: function(response){
                    swal(response.status).then(function() {
                        window.location.reload();
                    });
                }
            });
        });
    </script>
@endsection