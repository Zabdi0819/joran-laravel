<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">

    {{--Owl Carousel--}}
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

    {{--GOOGLE AWESOME--}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Source+Serif+Pro&display=swap" rel="stylesheet">
    
    {{--FONT AWESOME--}}
    <script src="https://kit.fontawesome.com/2c8d3254b0.js" crossorigin="anonymous"></script>
    <style>
        a{
            text-decoration: none !important;
            color: #000;
        }
    </style>
</head>

<body>

    <div class="container py-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark bg-gradient">
                        <h3 class="text-white">Folio: {{ $orders -> tracking_no }}
                        </h3>
                    </div>
                </div>
                <div class="card-body border" style="background-color:antiquewhite">
                    <div class="row">
                        <div class="col-6 order-details">
                            <h4><strong> Detalles de envío</strong></h4>
                            <hr>
                            <label for="">Nombre: </label>
                            <div class="border border-dark bg-light">{{ $orders -> fname }}</div>
                            <label for="">Apellido: </label>
                            <div class="border border-dark bg-light">{{ $orders -> lname }}</div>
                            <label for="">Correo: </label>
                            <div class="border border-dark bg-light">{{ $orders -> email }}</div>
                            <label for="">Número de contacto: </label>
                            <div class="border border-dark bg-light">{{ $orders -> phone }}</div>
                            <label for="">Dirección de entrega: </label>
                            <div class="border border-dark bg-light">
                                {{ $orders -> address1 }} <br>
                                {{ $orders -> address2 }} <br>
                                {{ $orders -> city }} <br>
                                {{ $orders -> state }} <br>
                                {{ $orders -> country }}
                            </div>
                            <label for="">C.P: </label>
                            <div class="border border-dark bg-light">{{ $orders -> pincode }}</div>
                        </div>
                        <br>
                        <div class="col-6 order-details border-dark">
                            <h4><strong>Detalles de la orden</strong> </h4>
                            <hr>
                            <table class="table table-bordered border-dark bg-light">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>imagen</th>
                                </thead>
                                <tbody>
                                    @foreach ($orders ->orderitems as $item)
                                        <tr>
                                            <td>{{ $item -> products -> name }}</td>
                                            <td>{{ $item -> qty }}</td>
                                            <td>{{ $item -> price }}</td>
                                            <td>
                                                <img src="{{ asset('assets/uploads/product/'.$item -> products -> image) }}" width="80px" alt="Producto">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <h3 class="px-2">Total:  <span  class= "float-end">${{ $orders -> total_price }}</span></h3>
                            <h4 class="px-2">{{ $orders -> payment_mode }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="{{ asset('frontend/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    @yield('scripts')
</body>

</html>