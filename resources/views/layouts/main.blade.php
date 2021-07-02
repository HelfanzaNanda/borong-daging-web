<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, shrink-to-fit=9">
  <meta name="description" content="Gambolthemes">
  <meta name="author" content="Gambolthemes">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Borong Daging</title>

  <link rel="icon" type="image/png" href="images/fav.png">

  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/vendor/unicons-2.0.1/css/unicons.css') }}">
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/semantic/semantic.min.css') }}">
  <link href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/style-me.css') }}">
  <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/night-mode.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/step-wizard.css') }}" rel="stylesheet">
  {{-- mapbox --}}
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css">
  @yield('style')
</head>
<script type="text/javascript">
  let BASE_URL = '{{env('APP_URL')}}';
</script>
  <body>
    <style type="text/css">
      ul.dropdown-menu {
        padding: 0.5rem 0.5rem;
        width: 100%;
      }
    </style>
    @include('layouts.main_modal')
    @yield('modal')
    <header class="clearfix header">
      @include('layouts.header')
    </header>
    <div class="wrapper" style="padding-top: 115px!important">
      @yield('slider')
      @yield('content')
    </div>
    <footer class="footer">
      @include('layouts.footer')
    </footer>
      <script data-cfasync="false" src="https://gambolthemes.net/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
      <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      {{-- mapbox --}}
      <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
      <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      
      <script src="{{ asset('assets/vendor/OwlCarousel/owl.carousel.js') }}"></script>
      <script src="{{ asset('assets/vendor/semantic/semantic.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
      <script src="{{ asset('assets/js/custom.js') }}"></script>
      <script src="{{ asset('assets/js/offset_overlay.js') }}"></script>
      <script src="{{ asset('assets/js/night-mode.js') }}"></script>
      <script src="{{ asset('assets/js/product.thumbnail.slider.js') }}"></script>
      <script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
      <x-ajax/>

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



      <script type="text/javascript">
      $(document).ready(function() {
        $('#search').keyup(function() {
          var query = $(this).val();
          if(query != '' || query != null) {
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{ route('product.autocomplete') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data) {
                //$('#product-list').hide();
                $('#product-list').fadeIn();
                $('#product-list').html(showProductList(data));
              }
            });
          }else{
            $('#product-list').fadeOut();
            $('#product-list').hide();
          }
        })

        $('#search').keypress(function(e){
          if (e.which == 13) {
            var query = $(this).val();
            if(query != '' || query != null) {
              location.href = BASE_URL+"/product/search/"+query;
            } 
          }
        })
      })
      
      function showProductList(data) {
        if (JSON.parse(data).length < 1) {
          return '';
        }
        let html = `<ul class="dropdown-menu" style="display:block; position:absolute">`
        $.each(JSON.parse(data), function(idx, val){
          html += `<li><a href="${BASE_URL}/product/search/${val.name}" class="text-black"><p>${val.name}</p></a></li>`
        });
        html += `</ul>`
        return html
      }

      </script>

      {{-- use voucher code --}}
      
      
      @yield('additionalScript')
    </div>
  </body>
</html>
