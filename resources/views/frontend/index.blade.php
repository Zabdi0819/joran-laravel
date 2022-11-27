@extends('layouts.front')

@section('title')
    Bienvenido
@endsection

@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <h2>Productos destacados</h2>
                <br>
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <a href="{{ url('category/'.$prod->category->name.'/'.$prod->slug) }}">
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
    </div>

    <div class="py-5">
        <div class="container">
            <h2>Categorías más populares</h2>
                <br>
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($trending_categories as $cate)
                        <div class="item">
                            <a href="{{ url('view-category/'.$cate->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/'.$cate->image) }}" alt="Imagen de producto">
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
    </script>
@endsection