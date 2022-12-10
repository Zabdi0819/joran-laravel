@extends('layouts.front')

@section('title')
    Bienvenido
@endsection

@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <h1 class="text-center"> <strong>¿Qué quieres enmarcar?</strong> </h1>
            <br>
            <h3 class="text-center">En seguida se muestran algunos de nuestros productos terminados</h6>
            <br>
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    <div class="item">
                        <div class="card">
                            <img src="{{ asset('assets/images/pt1.png') }}" style="width:100%;" alt="Imagen de producto">
                            <div class="card-body">
                                <h5>BABY BLUE</h5>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{ asset('assets/images/pt2.png') }}" style="width:100%;" alt="Imagen de producto">
                            <div class="card-body">
                                <h5>INSTAGRAMIC</h5>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{ asset('assets/images/pt3.png') }}" style="width:100%;" alt="Imagen de producto">
                            <div class="card-body">
                                <h5>PARTY OF 2</h5>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{ asset('assets/images/pt4.png') }}" style="width:100%;" alt="Imagen de producto">
                            <div class="card-body">
                                <h5>PARTY OF 3</h5>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{ asset('assets/images/pt5.png') }}" style="width:100%;" alt="Imagen de producto">
                            <div class="card-body">
                                <h5>FRAME LOVE</h5>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <img src="{{ asset('assets/images/pt6.png') }}" style="width:100%;" alt="Imagen de producto">
                            <div class="card-body">
                                <h5>FOCUS</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-center">Contamos con envío GRATIS a toda la Repúlica Mexicana.</h6>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <h1 class="text-center"> <strong>Productos destacados</strong> </h1>
                <br>
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <a href="{{ url('category/'.$prod->category->name.'/'.$prod->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/product/'.$prod->image) }}" style="width:100%; height: auto" alt="Imagen de producto">
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
    </div>

    <div class="py-5">
        <div class="container">
            <h1 class="text-center"> <strong>Nuestras categorías</strong> </h1>
                <br>
            <div class="row">
                <div class="owl-carousel featured-carousel2 owl-theme">
                    @foreach ($trending_categories as $cate)
                        <div class="col-sm-6 mx-auto d-block">
                            <div class="item ">
                                <a href="{{ url('view-category/'.$cate->slug) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/category/'.$cate->image) }}"style="width:100%; height: auto" alt="Imagen de producto">
                                        <div class="card-body">
                                            <h5>{{ $cate->name }}</h5>
                                            <p class="float-start">{{ $cate->description }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
              <div class="col">
                <h5><strong> <i class="fa-solid fa-shop"></i>Compra segura</strong></h5>
                <h6 style="text-align: justify">Haz tus compras sin preocuparte, nuestro sitio es confiable y respaldamos a nuestros clientes.</h6>
                
              </div>
              <div class="col">
                <h5><strong><i class="fa-solid fa-truck-fast"></i> Envíos rápidos y seguros</strong></h5>
                <h6 style="text-align: justify">Cuando confirmes tu compra tendrás un número de guía para monitorear tu paquete con un tiempo estimado de entrega.</h6>
              </div>
              <div class="col">
                <h5><strong><i class="fa-solid fa-rotate-left"></i>Cambios y devoluciones</strong></h5>
                <h6 style="text-align: justify">Ofrecemos un servicio completo. Visita nuestra políticas de devoluciones.</h6>
              </div>
              <div class="col">
                <h5><strong><i class="fa-solid fa-credit-card"></i>Métodos de pago</strong></h5>
                <h6 style="text-align: justify">Contamos con PayPal plus, puedes pagar sin cuenta y con tarjeta de débito o crédito.</h6>
              </div>
            </div>
          </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })

        $('.featured-carousel2').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:2
                }
            }
        })
    </script>
@endsection