$(document).ready(function (){
    $('.razorpay_btn').click(function (e){
        e.preventDefault();
       
       var name = $('.name').val();
       var lname = $('.lname').val();
       var email = $('.email').val();
       var phone = $('.phone').val();
       var alamat = $('.alamat').val();
       var kota = $('.kota').val();
       var provinsi = $('.provinsi').val();
     //   var negara = $('.negara').val();
       var kodepos = $('.kodepos').val();

       if(!name)
       {
            name_error = "Nama depan harus diisi";
            $('#name_error').html('');
            $('#name_error').html(name_error);
       }
       else{
            name_error = "";
            $('#name_error').html('');
       }
       
       if(!lname)
       {
            lname_error = "Nama belakang harus diisi";
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
       }
       else{
            lname_error = "";
            $('#lname_error').html('');
       }

       if(!email)
       {
            email_error = "Email harus diisi";
            $('#email_error').html('');
            $('#email_error').html(email_error);
       }
       else{
            email_error = "";
            $('#email_error').html('');
       }

       if(!phone)
       {
            phone_error = "Nomor Handphone harus diisi";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
       }
       else{
            phone_error = "";
            $('#phone_error').html('');
       }

       if(!alamat)
       {
            alamat_error = "Alamat harus diisi";
            $('#alamat_error').html('');
            $('#alamat_error').html(alamat_error);
       }
       else{
            alamat_error = "";
            $('#alamat_error').html('');
       }

       if(!kota)
       {
            kota_error = "Kota harus diisi";
            $('#kota_error').html('');
            $('#kota_error').html(kota_error);
       }
       else{
            kota_error = "";
            $('#kota_error').html('');
       }

       if(!provinsi)
       {
            provinsi_error = "Provinsi harus diisi";
            $('#provinsi_error').html('');
            $('#provinsi_error').html(provinsi_error);
       }
       else{
            provinsi_error = "";
            $('#provinsi_error').html('');
       }

     //   if(!negara)
     //   {
     //        negara_error = "Negara harus diisi";
     //        $('#negara_error').html('');
     //        $('#negara_error').html(negara_error);
     //   }
     //   else{
     //        negara_error = "";
     //        $('#negara_error').html('');
     //   }

       if(!kodepos)
       {
            kodepos_error = "Kodepos harus diisi";
            $('#kodepos_error').html('');
            $('#kodepos_error').html(kodepos_error);
       }
       else{
            kodepos_error = "";
            $('#kodepos_error').html('');
       }

       // 'hizkia' != '' => true
       if(name_error != '' || lname_error != '' || email_error != '' || phone_error != '' || alamat_error != '' || kota_error != '' || provinsi_error != '' || kodepos_error != '')
       {
            return false;
       }
       else
       {
            var data = {
               'name': name,   
               'lname': lname, 
               'email': email, 
               'phone': phone, 
               'alamat': alamat, 
               'kota': kota, 
               'provinsi': provinsi, 
               // 'negara': negara, 
               'kodepos': kodepos
            }

            $.ajax({
                method: "POST",
                url: "/proced-to-pay",
                data: data,
                success: function (response) {
                    // alert(response.total_price)
                    var options = {
                         "key": "rzp_test_DgNMJKMeWIMZ02", // Enter the Key ID generated from the Dashboard
                         "amount": 1*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                         "currency": "INR",
                         "name": response.name+' '+response.lname,
                         "description": "Thank You sudah memilih kami",
                         "image": "https://example.com/your_logo",
                         // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                         "handler": function (responsea){
                              // alert(responsea.razorpay_payment_id);
                              $.ajax({
                                   method: "POST",
                                   url: "/bayar-sekarang",
                                   data: {
                                        'name':response.name,
                                        'lname':response.lname,
                                        'email':response.email,
                                        'phone':response.phone,
                                        'alamat':response.alamat,
                                        'kota':response.kota,
                                        'provinsi':response.provinsi,
                                        'negara':response.negara,
                                        'kodepos':response.kodepos,
                                        'payment_mode':"paid by razorpay",
                                        'payment_id':responsea.razorpay_payment_id,
                                   },
                                   success: function (responseb) {
                                        swal(responseb.status)
                                        .then((value) => {
                                             window.location.href = "/my-order";
                                        });
                                   }
                              });
                         },
                         // "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
                         "prefill": {
                             "name":  response.name+' '+response.lname,
                             "email": response.email,
                             "contact": response.phone
                         },
                         "theme": {
                             "color": "#3399cc"
                         }
                     };
                     var rzp1 = new Razorpay(options);
                         rzp1.open();                     
                }
            });
       }
    });
});