$(document).ready(function(){

    loadcart();
    loadwish()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 

    function loadcart(){
        $.ajax({
            method: "GET",
            url: "load-cart-data",
            success: function(response){
                //$('.cart-count').html('');
                $('.cart-count').html(response.count);
                //console.log(response.count);
            }
        });
    };

    function loadwish(){
        $.ajax({
            method: "GET",
            url: "load-wishlist-data",
            success: function(response){
                $('.cart-count').html('');
                $('.wishlist-count').html(response.count);
                //console.log(response.count);
            }
        });
    };

    $('.increment-btn').click(function(e){
        e.preventDefault();
        //var inc_value = $('.qty-input').val();
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            //$('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.decrement-btn').click(function(e){
        e.preventDefault();
        //var dec_value = $('.qty-input').val();
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            //$('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.delete-cart-item').click(function(e){
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method: "POST",
            url: "delete-cart-item",
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

    $('.changeQuantity').click(function(e){
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajax({
            method: "POST",
            url: "update-cart",
            data: {
                'prod_id': prod_id,
                'prod_qty': qty,
            },
            success: function(response){
                window.location.reload();
            }
        });
    });

});