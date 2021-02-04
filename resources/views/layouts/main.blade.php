<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, shrink-to-fit=9">
  <meta name="description" content="Gambolthemes">
  <meta name="author" content="Gambolthemes">
  <title>Borong Daging</title>

  <link rel="icon" type="image/png" href="images/fav.png">

  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/vendor/unicons-2.0.1/css/unicons.css') }}">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/night-mode.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/step-wizard.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/semantic/semantic.min.css') }}">
  <link href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}" rel="stylesheet">
</head>
<script type="text/javascript">
  let BASE_URL = '{{env('APP_URL')}}';
</script>
  <body>
    @include('layouts.main_modal')
    @yield('modal')
    <header class="clearfix header">
      @include('layouts.header')
    </header>
    <div class="wrapper">
      @yield('slider')
      @yield('content')
    </div>
    <footer class="footer">
      @include('layouts.footer')
    </footer>
      <script data-cfasync="false" src="https://gambolthemes.net/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
      <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/OwlCarousel/owl.carousel.js') }}"></script>
      <script src="{{ asset('assets/vendor/semantic/semantic.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
      <script src="{{ asset('assets/js/custom.js') }}"></script>
      <script src="{{ asset('assets/js/offset_overlay.js') }}"></script>
      <script src="{{ asset('assets/js/night-mode.js') }}"></script>
      <script src="{{ asset('assets/js/product.thumbnail.slider.js') }}"></script>
      <script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
      <script type="text/javascript">
        $('form#form-login').submit( function( e ) {
          e.preventDefault();
          var form_data = new FormData( this );

          $.ajax({
            type: 'post',
            url: BASE_URL+'/login',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(msg) {
              if(msg.status == 'success'){
                setTimeout(function() {
                  swal({
                      title: "Sukses",
                      text: msg.message,
                      type:"success",
                      html: true
                  }, function() {
                    window.location.reload();
                  });
                }, 500);
              } else {
                swal({
                  title: "Gagal",
                  text: msg.message,
                  showConfirmButton: true,
                  confirmButtonColor: '#0760ef',
                  type:"error",
                  html: true
                });
              }
            }
          })
        });

        $('form#form-register').submit( function( e ) {
          e.preventDefault();
          var form_data = new FormData( this );

          $.ajax({
            type: 'post',
            url: BASE_URL+'/register',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(msg) {
              if(msg.status == 'success'){
                setTimeout(function() {
                  swal({
                      title: "Sukses",
                      text: msg.message,
                      type:"success",
                      html: true
                  }, function() {
                    window.location.reload();
                  });
                }, 500);
              } else {
                swal({
                  title: "Gagal",
                  text: msg.message,
                  showConfirmButton: true,
                  confirmButtonColor: '#0760ef',
                  type:"error",
                  html: true
                });
              }
            }
          })
        });

        $(document).on('click', '#delete-cart', function(e){
          event.preventDefault()
          var id = $(this).data("id")

          swal({
                  title: 'Apakah kamu yakin untuk menghapus?',
                  text: 'Anda dapat memilih product kembali',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#800000',
                  cancelButtonColor: '#d33',
                  cancelButtonText: 'Batal',
                  confirmButtonText: 'Hapus'
              }, function(){
                $.ajax({
                  type: 'DELETE',
                  url: BASE_URL+'/cart/'+id,
                  data: {'_token': '{{ csrf_token() }}'},
                  dataType: 'json',
                  beforeSend: function() {

                  },
                  success: function(msg) {
                    if(msg.status == 'success'){
                        setTimeout(function() {

                            swal({
                                title: "sukses",
                                text: msg.message,
                                type:"success",
                                html: true
                            }, function() {
                                window.location.reload();
                            });
                        }, 500);
                    } else {
                        swal({
                            title: "Gagal",
                            text: msg.message,
                            showConfirmButton: true,
                            confirmButtonColor: '#0760ef',
                            type:"error",
                            html: true
                        });
                    }
                  }
                })
              })
        });
      </script>
      @yield('additionalScript')
    </div>
  </body>
</html>
