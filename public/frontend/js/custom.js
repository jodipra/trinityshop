$(document).ready(function (){

    loadcart();
    loadwishlist();
    
    function loadcart()
    {
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            success: function (response) {
                $('.cartcount').html('');
                $('.cartcount').html(response.count);
                // console.log(response.count)
            }
        });
    }

    function loadwishlist()
    {
        $.ajax({
            method: "GET",
            url: "/load-wishlist-count",
            success: function (response) {
                $('.wishlistcount').html('');
                $('.wishlistcount').html(response.count);
                // console.log(response.count)
            }
        });
    }


    $('.addtocartbtn').click(function (e) {
        e.preventDefault();

        var unit_id = $(this).closest('.unit_data').find('.unit_id').val();
        var unit_qty = $(this).closest('.unit_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'unit_id' : unit_id, 
                'unit_qty' : unit_qty,
            },
            success: function(response) {
                swal(response.status);
                loadcart();
            }
        });

    });

    $('.addtowishlist').click(function (e) {
        e.preventDefault();
        var unit_id = $(this).closest('.unit_data').find('.unit_id').val();

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'unit_id' : unit_id, 
            },
            success: function(response) {
                swal(response.status);
                loadwishlist();
            }
        });

    });

    // $('.increament-btn').click(function (e) {
    $(document).on('click','.increament-btn', function(e) {
        e.preventDefault();
        
        //  var inc_value = $('.qty-input').val();
         var inc_value = $(this).closest('.unit_data').find('.qty-input').val();
         var value = parseInt(inc_value,10);
         value = isNaN(value) ? 0 : value;
         if(value < 10)
         {
            value++;
            // $('.qty-input').val(value);
            $(this).closest('.unit_data').find('.qty-input').val(value);
         }
    });

    // $('.decrement-btn').click(function (e) {
    $(document).on('click','.decrement-btn', function(e) {
    
        e.preventDefault();
        
        //  var dec_value = $('.qty-input').val();
         var dec_value = $(this).closest('.unit_data').find('.qty-input').val();
         var value = parseInt(dec_value,10);
         value = isNaN(value) ? 0 : value;
         if(value > 1)
         {
            value--;
            // $('.qty-input').val(value);
            $(this).closest('.unit_data').find('.qty-input').val(value);
         }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $('.delete-cart-item').click(function (e) {
    $(document).on('click','.delete-cart-item', function(e) {
        e.preventDefault();
        var unit_id = $(this).closest('.unit_data').find('.unit_id').val();
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'unit_id':unit_id,
            },
            success: function (response) {
                // window.location.reload();
                loadcart();
                $('.cartitem').load(location.href + " .cartitem");
                swal("", response.status, "success");
            }

        });
    });  

    // $('.remove-wishlist-item').click(function (e){
    $(document).on('click','.remove-wishlist-item', function(e) {
        e.preventDefault();
        var unit_id = $(this).closest('.unit_data').find('.unit_id').val();
        $.ajax({
            method: "POST",
            url: "delete-wishlist-item",
            data: {
                'unit_id':unit_id,
            },
            success: function (response) {
                // window.location.reload();
                loadwishlist();
                $('.wishlistitem').load(location.href + " .wishlistitem");
                swal("", response.status, "success");
            }

        });
    });

    // $('.ubahqty').click(function (e) {
    $(document).on('click','.ubahqty', function(e) {
        e.preventDefault();

        var unit_id = $(this).closest('.unit_data').find('.unit_id').val();
        var qty = $(this).closest('.unit_data').find('.qty-input').val();
        data = {
            'unit_id' : unit_id,
            'unit_qty' : qty,
        }
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                $('.cartitem').load(location.href + " .cartitem");
                // window.location.reload();
            }
        });
    });

});

