@extends('layouts.front')

@section('title')
    Pagar ahora
@endsection

@section('content')
    <div class="container my-5">
        <form action="{{  url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Detalles</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">Nombre:</label>
                                    <br>
                                    <input type="text" class="form-control fname" value="{{ Auth::user()->name }}" placeholder="Ingresa tu nombre completo" name="fname">
                                    <span id="fname_error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Apellido:</label>
                                    <br>
                                    <input type="text" class="form-control lname" value="{{ Auth::user()->lname }}" placeholder="Ingresa tu apellido" name="lname">
                                    <span id="lname_error"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Correo:</label>
                                    <br>
                                    <input type="text" class="form-control email" value="{{ Auth::user()->email }}" placeholder="Ingresa tu correo electrónico" name="email">
                                    <span id="email_error"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Teléfono:</label>
                                    <br>
                                    <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" placeholder="Ingresa tu teléfono" name="phone">
                                    <span id="phone_error"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Dirección 1:</label>
                                    <br>
                                    <input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}" placeholder="Ingresa tu dirección 1" name="address1">
                                    <span id="address1_error"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Dirección 2:</label>
                                    <br>
                                    <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}" placeholder="Ingresa tu dirección 2" name="address2">
                                    <span id="address2_error"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Ciudad:</label>
                                    <br>
                                    <input type="text" class="form-control city" value="{{ Auth::user()->city }}" placeholder="Ingresa tu ciudad" name="city">
                                    <span id="city_error"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Estado:</label>
                                    <br>
                                    <input type="text" class="form-control state" value="{{ Auth::user()->state }}" placeholder="Ingresa tu estado" name="state">
                                    <span id="state_error"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">País:</label>
                                    <br>
                                    <input type="text" class="form-control country" value="{{ Auth::user()->country }}" placeholder="Ingresa tu país" name="country">
                                    <span id="country_error"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">C.P:</label>
                                    <br>
                                    <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}" placeholder="Ingresa tu C.P" name="pincode">
                                    <span id="pincode_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            @php $total = 0;@endphp
                            <h6>Detalles de compra</h6>
                            <hr>
                            @if ($caritems -> count() > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr style="font-weight: bold;">
                                        <td>Nombre</td>
                                        <td>Cantidad</td>
                                        <td>Precio</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($caritems as $item)
                                        <tr>
                                            <td>{{ $item -> products -> name }}</td>
                                            <td>{{ $item -> prod_qty }}</td>
                                            <td>{{ $item -> products -> selling_price }}</td>
                                        </tr>
                                        @php $total += $item->products->selling_price * $item->prod_qty; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <h6>Precio total: {{ $total }}</h6>
                            <hr>
                            <button type="submit" class="btn btn-primary">Confirmar orden</button>
                            <button type="button" class="btn btn-primary paypal_btn">Continuar con el pago</button>
                            <div id="paymentBtn" class="my-3" style="display: none">
                                <div id="paypal-button-container"></div>
                            </div>
                            @else
                            <div class="card-body text-center">
                                <h2>Tu <i class="fa fa-shopping-cart"></i>  está vacío</h2>
                            </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AaoGwFDLVN2klHuhegdJ9mghuXl-SGp4y_uSHR0XXk9C8RiSI6M1BB84esbxOsAesUVFqKvVSgqzQhKa&currency=MXN"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".paypal_btn").click(function (e) {
                e.preventDefault();
                var fname = $('.fname').val();
                var lname = $('.lname').val();
                var email = $('.email').val();
                var phone = $('.phone').val();
                var address1 = $('.address1').val();
                var address2 = $('.address2').val();
                var city = $('.city').val();
                var state = $('.state').val();
                var country = $('.country').val();
                var pincode = $('.pincode').val();
                var paymentBtn = document.getElementById("paymentBtn");
        
                if(!fname){
                    fname_error = "El nombre es requerido";
                    $('#fname_error').html(' ');
                    $('#fname_error').html(fname_error);
                }else{
                    fname_error = " ";
                            $('#fname_error').html(' ');
                }
            
                if(!lname){
                    lname_error = "El apellido es requerido";
                    $('#lname_error').html(' ');
                    $('#lname_error').html(lname_error);
                }else{
                    lname_error = " ";
                            $('#lname_error').html(' ');
                }
        
                if(!email){
                    email_error = "El correo es requerido";
                    $('#email_error').html(' ');
                    $('#email_error').html(email_error);
                }else{
                    email_error = " ";
                            $('#email_error').html(' ');
                }
        
                if(!phone){
                    phone_error = "El teléfono es requerido";
                    $('#phone_error').html(' ');
                    $('#phone_error').html(phone_error);
                }else{
                    phone_error = " ";
                    $('#phone_error').html(' ');
                }
        
                if(!address1){
                    address1_error = "La calle es requerido";
                    $('#address1_error').html(' ');
                    $('#address1_error').html(address1_error);
                }else{
                    address1_error = " ";
                    $('#address1_error').html(' ');
                }
        
                if(!address2){
                    address2_error = "La colonia es requerido";
                    $('#address2_error').html(' ');
                    $('#address2_error').html(address2_error);
                }else{
                    address2_error = " ";
                    $('#address2_error').html(' ');
                }
        
        
                if(!city){
                    city_error = "La ciudad es requerido";
                    $('#city_error').html(' ');
                    $('#city_error').html(city_error);
                }else{
                    city_error = " ";
                    $('#city_error').html(' ');
                }
        
        
                if(!state){
                    state_error = "El estado es requerido";
                    $('#state_error').html(' ');
                    $('#state_error').html(state_error);
                }else{
                    state_error = " ";
                    $('#state_error').html(' ');
                }
        
        
                if(!country){
                    country_error = "El país es requerido";
                    $('#country_error').html(' ');
                    $('#country_error').html(country_error);
                }else{
                    country_error = " ";
                    $('#country_error').html(' ');
                }
        
        
                if(!pincode){
                    pincode_error = "El C.P es requerido";
                    $('#pincode_error').html(' ');
                    $('#pincode_error').html(pincode_error);
                }else{
                    pincode_error = " ";
                    $('#pincode_error').html(' ');
                }
        
                if(fname_error != ' ' || lname_error  != ' ' || email_error  != ' ' || phone_error  != ' ' || address1_error  != ' ' || address2_error  != ' ' || city_error  != ' ' || state_error  != ' ' || country_error  != ' ' || pincode_error  != ' '){
                    return false;
                } else{
                    paymentBtn.style.display='block';
                    paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                          return actions.order.create({
                            purchase_units: [{
                              amount: {
                                value: '{{ $total }}' // Can also reference a variable or function
                              }
                            }]
                          });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                          return actions.order.capture().then(function(orderData) {
                            // Successful capture! For dev/demo purposes:
                            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                            const transaction = orderData.purchase_units[0].payments.captures[0];
                            //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                            // When ready to go live, remove the alert and show a success message within this page. For example:
                            // const element = document.getElementById('paypal-button-container');
                            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                            // Or go to another URL:  actions.redirect('thank_you.html');

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            }); 

                            $.ajax({
                                method: "POST",
                                url: "{{  route('place-order') }}",
                                data: {
                                    'fname': fname,
                                    'lname': lname,
                                    'email': email,
                                    'phone': phone,
                                    'address1': address1,
                                    'address2': address2,
                                    'city': city,
                                    'state': state,
                                    'country': country,
                                    'pincode': pincode,
                                    'payment_mode': "Pagado con Paypal",
                                    'payment_id': transaction.id,
                                },
                                success: function(responseb){
                                    swal(responseb.status).then(function() {
                                        window.location.href="my-orders";
                                    }); 
                                }
                            });
                                
                          });
                        }
                      }).render('#paypal-button-container');
                }
            });
        });
    </script>
@endsection