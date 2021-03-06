@extends('layouts.main')

@section('title', 'Checkout')

@section('content')
 <div class="gambo-Breadcrumb">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
             </nav>
          </div>
       </div>
    </div>
 </div>
 <div class="all-product-grid">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 col-md-7">
             <div id="checkout_wizard" class="checkout accordion left-chck145">
                <div class="checkout-step">
                   <div class="checkout-card" id="headingOne">
                      <span class="checkout-step-number">1</span>
                      <h4 class="checkout-step-title">
                         <button class="wizard-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> Delivery Address</button>
                      </h4>
                   </div>
                   <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#checkout_wizard">
                      <div class="checkout-step-body">
                         <div class="checout-address-step">
                            <div class="row">
                               <div class="col-lg-12">
                                 <input type="hidden" name="" id="weight" value="{{ $weight }}">
                                  <form class="">
                                     {{-- <div class="form-group">
                                        <div class="product-radio">
                                           <ul class="product-now">
                                              <li>
                                                 <input type="radio" id="ad1" name="address_description" {{(isset($delivery_address['description']) && $delivery_address['description']) == 'Home' ? 'checked' : ''}} value="Home">
                                                 <label for="ad1">Home</label>
                                              </li>
                                              <li>
                                                 <input type="radio" id="ad2" name="address_description" {{(isset($delivery_address['description']) && $delivery_address['description']) == 'Office' ? 'checked' : ''}} value="Office">
                                                 <label for="ad2">Office</label>
                                              </li>
                                              <li>
                                                 <input type="radio" id="ad3" name="address_description" {{(isset($delivery_address['description']) && $delivery_address['description']) == 'Other' ? 'checked' : ''}} value="Other">
                                                 <label for="ad3">Other</label>
                                              </li>
                                           </ul>
                                        </div>
                                     </div> --}}
                                     <div class="address-fieldset">
                                        <div class="row">
                                           <div class="col-lg-12 col-md-12">
                                              <div class="form-group">
                                                 <label class="control-label">Alamat*</label>
                                                 <select name="" id="delivery_address_id" class="form-control">
                                                    <option value="" selected disabled>-- Pilih Alamat --</option>
                                                    @foreach ($delivery_addresses as $address)
                                                        <option value="{{ $address->id }}">{{ $address->address }}</option>
                                                    @endforeach
                                                 </select>
                                                 
                                                 {{-- <input id="address-street" name="address_street" type="text" placeholder="Street Address" class="form-control input-md" value="{{isset($delivery_address['address']) && $delivery_address['address'] ? $delivery_address['address'] : '-'}}"> --}}
                                                 {{-- <input type="hidden" id="address-id" value="{{$delivery_address ? $delivery_address['id'] : '0'}}"> --}}
                                                 {{-- <input id="address-street" name="address_street" type="text" placeholder="Street Address" class="form-control input-md" value="{{$delivery_address['address']}}"> --}}
                                              </div>
                                           </div>
                                           <div class="col-lg-12 col-md-12">
                                              <div class="form-group">
                                                 <div class="address-btns">
                                                    <a href="{{ url('delivery-address') }}" class="btn btn-primary">Tambah atau Update Alamat</a>
                                                    <a class="collapsed ml-auto next-btn16 hover-btn" role="button" data-toggle="collapse" data-parent="#checkout_wizard" href="#collapseTwo"> Next </a>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                  </form>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="checkout-step">
                   <div class="checkout-card" id="headingTwo">
                      <span class="checkout-step-number">2</span>
                      <h4 class="checkout-step-title">
                         <button class="wizard-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Delivery Time & Date </button>
                      </h4>
                   </div>
                   <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#checkout_wizard">
                      <div class="checkout-step-body">
                         <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                  <label class="control-label">Select Date and Time*</label>
                                  <div class="date-slider-group">
                                     <div class="owl-carousel date-slider owl-theme">
                                        <div class="item">
                                           <div class="date-now">
                                              <input type="radio" id="dd1" name="hint" value="{{date('d M Y')}}">
                                              <label for="dd1">Today</label>
                                           </div>
                                        </div>
                                        <div class="item">
                                           <div class="date-now">
                                              <input type="radio" id="dd2" name="hint" value="{{date('d M Y', strtotime("+1 day"))}}">
                                              <label for="dd2">Tomorrow</label>
                                           </div>
                                        </div>
                                        @for($i=2;$i<7;$i++)
                                        <div class="item">
                                           <div class="date-now">
                                              <input type="radio" id="dd{{$i+1}}" name="hint" value="{{date('d M Y', strtotime("+".$i." day"))}}">
                                              <label for="dd{{$i+1}}">{{date('d M Y', strtotime("+".$i." day"))}}</label>
                                           </div>
                                        </div>
                                        @endfor
                                     </div>
                                  </div>
                                  <div class="time-radio">
                                     <div class="ui form">
                                        <div class="grouped fields">
                                           <div class="field">
                                              <div class="ui radio checkbox chck-rdio">
                                                 <input type="radio" name="deliver_time" checked tabindex="0" class="" id="deliver_time1" value="08.00 - 10.00">
                                                 <label for="deliver_time1">08.00 - 10.00</label>
                                              </div>
                                           </div>
                                           <div class="field">
                                              <div class="ui radio checkbox chck-rdio">
                                                 <input type="radio" name="deliver_time" tabindex="0" class="" id="deliver_time2" value="10.00 - 12.00">
                                                 <label for="deliver_time2">10.00 - 12.00</label>
                                              </div>
                                           </div>
                                           <div class="field">
                                              <div class="ui radio checkbox chck-rdio">
                                                 <input type="radio" name="deliver_time" tabindex="0" class="" id="deliver_time3" value="12.00 - 14.00">
                                                 <label for="deliver_time3">12.00 - 14.00</label>
                                              </div>
                                           </div>
                                           <div class="field">
                                              <div class="ui radio checkbox chck-rdio">
                                                 <input type="radio" name="deliver_time" tabindex="0" class="" id="deliver_time4" value="14.00 - 16.00">
                                                 <label for="deliver_time4">14.00 - 16.00</label>
                                              </div>
                                           </div>
                                           <div class="field">
                                              <div class="ui radio checkbox chck-rdio">
                                                 <input type="radio" name="deliver_time" tabindex="0" class="" id="deliver_time5" value="16.00 - 18.00">
                                                 <label for="deliver_time5">16.00 - 18.00</label>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <a class="collapsed next-btn16 hover-btn" role="button" data-toggle="collapse" href="#collapseThree"> Proccess to payment </a>
                      </div>
                   </div>
                </div>
                <div class="checkout-step">
                   <div class="checkout-card" id="headingThree">
                      <span class="checkout-step-number">3</span>
                      <h4 class="checkout-step-title">
                         <button class="wizard-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Payment</button>
                      </h4>
                   </div>
                   <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#checkout_wizard">
                      <div class="checkout-step-body">
                         <div class="payment_method-checkout">
                            <div class="row">
                               <div class="col-md-12">
                                  <div class="rpt100">
                                     <ul class="radio--group-inline-container_1">
                                        <li>
                                           <div class="radio-item_1">
                                              <input id="cashondelivery1" value="cashondelivery" name="paymentmethod" type="radio" data-minimum="50.0">
                                              <label for="cashondelivery1" class="radio-label_1">Cash on Delivery</label>
                                           </div>
                                        </li>
                                        <li>
                                           <div class="radio-item_1">
                                              <input id="card1" value="ipaymu" name="paymentmethod" type="radio" data-minimum="50.0">
                                              <label for="card1" class="radio-label_1">Virtual Account/QRIS</label>
                                           </div>
                                        </li>
                                     </ul>
                                  </div>
                                  <div class="form-group return-departure-dts" data-method="cashondelivery">
                                     <div class="row">
                                        <div class="col-lg-12">
                                           <div class="pymnt_title">
                                              <h4>Cash on Delivery</h4>
                                              {{-- <p>Cash on Delivery will not be available if your order value exceeds $10.</p> --}}
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="form-group return-departure-dts" data-method="card">
                                     <div class="row">
                                        <div class="col-lg-12">
                                           <div class="pymnt_title mb-4">
                                              <h4>Virtual Account/QRIS</h4>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                                  <button type="button" class="next-btn16 hover-btn" id="place-order">Place Order</button>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-4 col-md-5">
             <div class="pdpt-bg mt-0">
                <div class="pdpt-title">
                   <h4>Order Summary</h4>
                </div>
                <div class="right-cart-dt-body">
					@php
						$total_price = 0;
					@endphp
                	@foreach($carts as $cart)
					@php
						$total_price = $total_price + $cart['meat_for_sale']['discount_price'] * ($cart['quantity']/100);
					@endphp
	                   <div class="cart-item border_radius">
	                      <div class="cart-product-img">
	                         <img src="{{ env('IMAGE_URL').'/storage/app/public/'.$cart['meat_for_sale']['media']['id'].'/'.$cart['meat_for_sale']['media']['file_name'] }}" alt="">
	                         {{-- <div class="offer-badge">4% OFF</div> --}}
	                      </div>
	                      <div class="cart-text">
	                         <h4>{{$cart['meat_for_sale']['name']}}</h4>
	                         <div class="cart-item-price">Rp {{number_format($cart['meat_for_sale']['discount_price'] * ($cart['quantity']/100), 0, '.', '.')}} <span>Rp {{number_format($cart['meat_for_sale']['price'] * ($cart['quantity']/100), 0, '.', '.')}}</span></div>
	                         <button type="button" class="cart-close-btn" id="delete-cart" data-id="{{$cart['id']}}"><i class="uil uil-multiply"></i></button>
	                      </div>
	                   </div>
                   @endforeach
                </div>
                <div class="total-checkout-group">
                   <div class="cart-total-dil pt-3">
                      <h4>Delivery Charges</h4>
                      <span id="lable-fee">-</span>
                   </div>
                   <h4>Discount</h4>
                   <div class="panel-voucher"></div>
                   <input type="hidden" id="coupon_codes" class="coupon-code">
                </div>
                <div class="main-total-cart total">
                   <h2>Total</h2>
                   {{-- <span>Rp {{number_format(($total_price - $discount_prices))}}</span> --}}
                   {{-- <span id="lable-total">{{number_format(($total_price - $discount_prices))}}</span> --}}
				   <span id="total-price" data-total-price="{{ $total_price }}">Rp {{number_format($total_price, 0, '.', '.')}}</span>
                </div>
                <div class="payment-secure">
                   <i class="uil uil-padlock"></i>Secure checkout
                </div>
             </div>
             <div class="total-checkout-group">
               <h4>Masukkan Kode Voucher</h4>
               <div class="d-flex justify-content-between align-items-center">
                  <div><input type="text" class="form-control" id="input-code-voucher"></div>
                  <div><button type="button" id="btn-use-voucher" class="btn text-white" style="background: #2b2f4c">Pakai</button></div>
                </div>
             </div>
             
             {{-- <a href="#" class="promo-link45">Have a promocode?</a> --}}
             <div class="checkout-safety-alerts">
                <p><i class="uil uil-sync"></i>100% Replacement Guarantee</p>
                <p><i class="uil uil-check-square"></i>100% Genuine Products</p>
                <p><i class="uil uil-shield-check"></i>Secure Payments</p>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection

@section('additionalScript')
<script type="text/javascript">
var deliveryFee = 0;
   $(document).on('click', '#place-order', function(e){
      	$.ajax({
          url: BASE_URL+'/order',
          type: 'POST',
          data: {
             'coupon_codes[]' : $(".coupon-code").val().split(','),
             'delivery_address_id' : $('#delivery_address_id').val(),
             'hint': $("input[name='hint']:checked").val(), 
             'deliver_time': $("input[name='deliver_time']:checked").val(), 
             'payment_method': $("input[name='paymentmethod']:checked").val(), 
             'delivery_fee': deliveryFee,
             '_token': '{{ csrf_token() }}'
         },
          dataType: 'json',
          success: function( data ) {
            console.log(data);
            if(data.status == 'success'){
             setTimeout(function() {
               swal({
                   title: "Sukses",
                   text: data.message,
                   type:"success",
                   html: true
               }, function() {
                 window.location.href = data.url;
               });
             }, 500);
            } else {
             swal({
               title: "Gagal",
               text: data.message,
               showConfirmButton: true,
               confirmButtonColor: '#0760ef',
               type:"error",
               html: true
             });
            }
          }       
      	});
   });

   $(document).on('click', '#address-save', function(e){
   		var addressDescription = $("input[name='address_description']:checked").val();

      	$.ajax({
          url: BASE_URL+'/delivery_address',
          type: 'POST',
          data: {
            description : addressDescription, 
            address: $('#address-street').val(), 
            id: $('#address-id').val(),
            '_token': '{{ csrf_token() }}'
         },
          dataType: 'json',
          success: function( data ) {
            if(data.status == 'success'){
             setTimeout(function() {
               swal({
                   title: "Sukses",
                   text: data.message,
                   type:"success",
                   html: true
               }, function() {
                 window.location.reload();
               });
             }, 500);
            } else {
             swal({
               title: "Gagal",
               text: data.message,
               showConfirmButton: true,
               confirmButtonColor: '#0760ef',
               type:"error",
               html: true
             });
            }
          }       
      	});
   });

   $(document).on('click', "input[name='address_description']:checked", function(e){
      var desc = $(this).val();
      $.ajax({
          url: BASE_URL+'/delivery_address-change',
          type: 'POST',
          data: { description : desc, '_token': '{{ csrf_token() }}' },
          dataType: 'json',
          success: function( res ) {
             if (res.data == null) {
                $('#address-street').val('')
                $('#address-id').val('0')
                $('#address-save').text('Save');
             }else{
               $('#address-street').val(res.data.address)
               $('#address-id').val(res.data.id)
               $('#address-save').text('Update');
             }
          }       
      });
   })

   $(document).on('click', '#btn-use-voucher', function (e) { 
     e.preventDefault()
     const voucher = $('#input-code-voucher').val()
     let couponSame = $('.coupons').filter(function () { 
        return $(this).text() === voucher
     })
     if (couponSame.length > 0) {
       $('#input-code-voucher').val('')
       swal({
             title: "Gagal",
             text: "voucher sudah di tambahkan",
             showConfirmButton: true,
             confirmButtonColor: '#0760ef',
             type:"error",
             html: true
         });
     }else{
         $.ajax({
               type: 'get',
               url: BASE_URL+'/use-voucher/'+voucher,
               cache: false,
               contentType: false,
               processData: false,
               dataType: 'json',
               beforeSend: function() {
                  
               },
               success: function(res) {
                  if (res.status) {
                     $('#input-code-voucher').val('')
                     const total_price = $('#total-price').data('total-price');
                     const discount = total_price * (res.data.discount / 100)
                     const total = total_price - discount
                     $('.panel-voucher').append(showDiscount(res.data.code, discount))
                     $('span#total-price').text('Rp '+convertRupiah(total))
                     $('span#total-price').data('total-price', total)
                     let coupon_code = $('.coupon-code').val()
                     $('.coupon-code').val(coupon_code ? coupon_code + ','+ res.data.code : res.data.code)
                  }else{
                     swal({
                        title: "Gagal",
                        text: res.message,
                        showConfirmButton: true,
                        confirmButtonColor: '#0760ef',
                        type:"error",
                        html: true
                     });
                  }
               }
         })
     }
   })

     function showDiscount(code, discount) { 
       let cols = '';
           cols += '<div class="cart-total-dil pt-3">'
           cols +=   '<h4 class="coupons">'+code+'</h4>'
           cols +=   '<span data-disc-price="'+discount+'">'
           cols +=   'Rp. - '+convertRupiah(discount)+''
           cols +=   '</span>'
           cols += '</div>'
       return cols
     }
     
     function convertRupiah(number) { 
         let number_string = number.toString(),
            sisa 	= number_string.length % 3,
            rupiah 	= number_string.substr(0, sisa),
            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);   
         if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
         }
         return rupiah
     }
   //   function convertRupiah(number) { 
   //       return (number/1000).toFixed(3)
   //   }

   $('#delivery_address_id').on('change', function(){
      var addressText = $(this).find(":selected", this).text()
      $.ajax({
         type: 'POST',
         url: "{{ asset('api/get-price') }}",
         data: JSON.stringify({
            weight: {{ $weight }},
            address: $(this).find(":selected", this).text()
         }),
         headers: {
            "Content-Type":"application/json",
            "Accept":"application/json",
         },
         success : function(data){
            if(data.status == 'success'){
				const subtotal = $('#total-price').data('total-price');
               $('#lable-fee').empty()
               $('#lable-fee').text('Rp '+convertRupiah(data.price))
               //deliveryFee = data.price
               var total = subtotal + data.price

			    $('span#total-price').text('Rp '+convertRupiah(total))
				$('span#total-price').data('total-price', total)

               
            }else{
               swal(
                  'Maaf !',
                  data.message,
                  'error'
               )
            }
         }
      })
   })

   function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split   		= number_string.split(','),
      sisa     		= split[0].length % 3,
      rupiah     		= split[0].substr(0, sisa),
      ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
   
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
         separator = sisa ? '.' : '';
         rupiah += separator + ribuan.join(',');
      }
   
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
   }
</script>
@endsection