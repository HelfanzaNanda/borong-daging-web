@extends('layouts.main')

@section('title', 'Detail')

@section('content')
{{-- <div class="wrapper"> --}}
   <div class="gambo-Breadcrumb">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                     <li class="breadcrumb-item"><a href="shop_grid.html">{{$product['category_name']}}</a></li>
                     <li class="breadcrumb-item active" aria-current="page">{{$product['name']}}</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <div class="all-product-grid">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="product-dt-view">
                  <div class="row">
                     <div class="col-lg-4 col-md-4">
                        <div id="sync1" class="owl-carousel owl-theme">
                           <div class="item">
                              <img src="{{ env('IMAGE_URL').'/storage/app/public/'.$product['media']['id'].'/'.$product['media']['file_name'] }}" alt="">
                           </div>
{{--                            <div class="item">
                              <img src="{{ asset('assets/images/product/big-2.jpg') }}" alt="">
                           </div>
                           <div class="item">
                              <img src="{{ asset('assets/images/product/big-3.jpg') }}" alt="">
                           </div>
                           <div class="item">
                              <img src="{{ asset('assets/images/product/big-4.jpg') }}" alt="">
                           </div> --}}
                        </div>
                        <div id="sync2" class="owl-carousel owl-theme">
                           <div class="item">
                              <img src="{{ env('IMAGE_URL').'/storage/app/public/'.$product['media']['id'].'/'.$product['media']['file_name'] }}" alt="">
                           </div>
{{--                            <div class="item">
                              <img src="{{ asset('assets/images/product/big-2.jpg') }}" alt="">
                           </div>
                           <div class="item">
                              <img src="{{ asset('assets/images/product/big-3.jpg') }}" alt="">
                           </div>
                           <div class="item">
                              <img src="{{ asset('assets/images/product/big-4.jpg') }}" alt="">
                           </div> --}}
                        </div>
                     </div>
                     <div class="col-lg-8 col-md-8">
                        <div class="product-dt-right">
                           <h2>{{$product['name']}}</h2>
                           <div class="no-stock">
                              <p class="pd-no">Product No.<span>12345</span></p>
                              <p class="stock-qty">Available<span>(Instock)</span></p>
                           </div>
                           <div class="product-radio">
                              <ul class="product-now">
                                 <li>
                                    <input type="radio" id="p1" name="qty" value="100">
                                    <label for="p1">100g</label>
                                 </li>
                                 <li>
                                    <input type="radio" id="p2" name="qty" value="200">
                                    <label for="p2">200g</label>
                                 </li>
                                 <li>
                                    <input type="radio" id="p3" name="qty" value="500">
                                    <label for="p3">500g</label>
                                 </li>
                                 <li>
                                    <input type="radio" id="p4" name="qty" value="1000">
                                    <label for="p4">1kg</label>
                                 </li>
                              </ul>
                           </div>
                           <p class="pp-descp">{!! $product['description'] !!}</p>
                           <div class="product-group-dt">
                              <ul>
                                 <li>
                                    <div class="main-price color-discount">Harga Diskon<span>Rp {{number_format($product['discount_price'])}}/100g</span></div>
                                 </li>
                                 <li>
                                    <div class="main-price mrp-price">Harga Normal<span>Rp {{number_format($product['price'])}}</span></div>
                                 </li>
                              </ul>
                              <ul class="ordr-crt-share">
                                 <li>
                                    <div class="main-price">Total<span id="total-price">Rp {{number_format($product['discount_price'])}}</span></div>
                                 </li>
                              </ul>
                              <ul class="ordr-crt-share">
                                 <li><button  class="add-cart-btn hover-btn {{ $isAddCart ? 'd-none' : 'd-block' }}" id="add-to-cart"><i class="uil uil-shopping-cart-alt"></i>Add to Cart</button></li>
                                 <li><button class="order-btn hover-btn  {{ $isAddCart ? 'd-block' : 'd-none' }}" id="checkout"></i>Check Out</button></li>
                                 <li><button class="order-btn hover-btn" id="directly-shopping">Langsung Belanja</button></li>
                                 {{-- <li><button class="order-btn hover-btn">Order Now</button></li> --}}
                              </ul>
                           </div>
                           <div class="pdp-details">
                              <ul>
                                 <li>
                                    <div class="pdp-group-dt">
                                       <div class="pdp-icon"><i class="uil uil-usd-circle"></i></div>
                                       <div class="pdp-text-dt">
                                          <span>Lowest Price Guaranteed</span>
                                          <p>Get difference refunded if you find it cheaper anywhere else.</p>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="pdp-group-dt">
                                       <div class="pdp-icon"><i class="uil uil-cloud-redo"></i></div>
                                       <div class="pdp-text-dt">
                                          <span>Easy Returns & Refunds</span>
                                          <p>Return products at doorstep and get refund in seconds.</p>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12 col-md-12">
               <div class="pdpt-bg">
                  <div class="pdpt-title">
                     <h4>Product Details</h4>
                  </div>
                  <div class="pdpt-body scrollstyle_4">
                     <div class="pdct-dts-1">
                        <div class="pdct-dt-step">
                           <h4>Description</h4>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere nunc in condimentum maximus. Integer interdum sem sollicitudin, porttitor felis in, mollis quam. Nunc gravida erat eu arcu interdum eleifend. Cras tortor velit, dignissim sit amet hendrerit sed, ultricies eget est. Donec eget urna sed metus dignissim cursus.</p>
                        </div>
                        <div class="pdct-dt-step">
                           <h4>Benefits</h4>
                           <div class="product_attr">
                              Aliquam nec nulla accumsan, accumsan nisl in, rhoncus sapien.<br>
                              In mollis lorem a porta congue.<br>
                              Sed quis neque sit amet nulla maximus dignissim id mollis urna.<br>
                              Cras non libero at lorem laoreet finibus vel et turpis.<br>
                              Mauris maximus ligula at sem lobortis congue.<br>
                           </div>
                        </div>
                        <div class="pdct-dt-step">
                           <h4>How to Use</h4>
                           <div class="product_attr">
                              The peeled, orange segments can be added to the daily fruit bowl, and its juice is a refreshing drink.
                           </div>
                        </div>
                        <div class="pdct-dt-step">
                           <h4>Seller</h4>
                           <div class="product_attr">
                              Gambolthemes Pvt Ltd, Sks Nagar, Near Mbd Mall, Ludhana, 141001
                           </div>
                        </div>
                        <div class="pdct-dt-step">
                           <h4>Disclaimer</h4>
                           <p>Phasellus efficitur eu ligula consequat ornare. Nam et nisl eget magna aliquam consectetur. Aliquam quis tristique lacus. Donec eget nibh et quam maximus rutrum eget ut ipsum. Nam fringilla metus id dui sollicitudin, sit amet maximus sapien malesuada.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="section145">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="main-title-tt">
                  <div class="main-title-left">
                     <span>For You</span>
                     <h2>Top Featured Products</h2>
                  </div>
                  <a href="#" class="see-more-btn">See All</a>
               </div>
            </div>
            <div class="col-md-12">
               <div class="owl-carousel featured-slider owl-theme">
                  @foreach($featured_products as $featured_product)
                  <div class="item">
                     <div class="product-item">
                        <a href="{{url('/product/'.\Str::slug($featured_product['name'].'-'.$featured_product['id']))}}" class="product-img">
                           {{-- <img src="{{ env('IMAGE_URL').'/storage/app/public/'.$featured_product['media']['id'].'/'.$featured_product['media']['file_name'] }}" alt=""> --}}
                           <img src="{{ env('IMAGE_URL').'/storage/app/public/'.$featured_product['media']['id'].'/'.$featured_product['media']['file_name'] }}" alt="">
                           <div class="product-absolute-options">
                              <span class="offer-badge-1">6% off</span>
                              <span class="like-icon" title="wishlist"></span>
                           </div>
                        </a>
                        <div class="product-text-dt">
                           <p>Available<span>(In Stock)</span></p>
                           <h4>{{$featured_product['name']}}</h4>
                           <div class="product-price">{{'Rp '. number_format(floatval($featured_product['discount_price']))}} <span>{{'Rp '. number_format(floatval($featured_product['price']))}}</span></div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
{{-- </div> --}}
@endsection
@section('additionalScript')
<script type="text/javascript">
   let meatPrice = '{{$product['discount_price']}}';
   let totalPrice = 0;
   let meatId = '{{$id}}';
   let meatQty = 0;

   $(document).on('change', 'input[name="qty"]', function(e){
      meatQty = $(this).val();

      totalPrice = ($(this).val()/100) * parseInt(meatPrice);
      $('#total-price').text('Rp '+totalPrice);
   });

   $(document).on('click', '#add-to-cart', function(e){
      $.ajax({
          url: BASE_URL+'/cart',
          type: 'POST',
          data: {food_id : meatId, quantity: meatQty, '_token': '{{ csrf_token() }}'},
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
      })
   });
</script>
@endsection
