<div id="category_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
  <div class="modal-dialog category-area" role="document">
    <div class="category-area-inner">
      <div class="modal-header">
        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
        <i class="uil uil-multiply"></i>
        </button>
      </div>
      <div class="category-model-content modal-content">
        <div class="cate-header">
          <h4>Select Category</h4>
        </div>
        <ul class="category-by-cat">
          <li>
            <a href="#" class="single-cat-item">
              <div class="icon">
                <img src="{{ asset('assets/images/category/icon-1.svg') }}" alt="">
              </div>
              <div class="text"> Fruits and Vegetables </div>
            </a>
          </li>
          <li>
            <a href="#" class="single-cat-item">
              <div class="icon">
                <img src="{{ asset('assets/images/category/icon-2.svg') }}" alt="">
              </div>
              <div class="text"> Grocery & Staples </div>
            </a>
          </li>
          <li>
            <a href="#" class="single-cat-item">
              <div class="icon">
                <img src="{{ asset('assets/images/category/icon-3.svg') }}" alt="">
              </div>
              <div class="text"> Dairy & Eggs </div>
            </a>
          </li>
          <li>
            <a href="#" class="single-cat-item">
              <div class="icon">
                <img src="{{ asset('assets/images/category/icon-4.svg') }}" alt="">
              </div>
              <div class="text"> Beverages </div>
            </a>
          </li>
          <li>
            <a href="#" class="single-cat-item">
              <div class="icon">
                <img src="{{ asset('assets/images/category/icon-5.svg') }}" alt="">
              </div>
              <div class="text"> Snacks </div>
            </a>
          </li>
          <li>
            <a href="#" class="single-cat-item">
              <div class="icon">
                <img src="{{ asset('assets/images/category/icon-6.svg') }}" alt="">
              </div>
              <div class="text"> Home Care </div>
            </a>
          </li>
          <li>
            <a href="#" class="single-cat-item">
              <div class="icon">
                <img src="{{ asset('assets/images/category/icon-7.svg') }}" alt="">
              </div>
              <div class="text"> Noodles & Sauces </div>
            </a>
          </li>
          <li>
            <a href="#" class="single-cat-item">
              <div class="icon">
                <img src="{{ asset('assets/images/category/icon-8.svg') }}" alt="">
              </div>
              <div class="text"> Personal Care </div>
            </a>
          </li>
          <li>
            <a href="#" class="single-cat-item">
              <div class="icon">
                <img src="{{ asset('assets/images/category/icon-9.svg') }}" alt="">
              </div>
              <div class="text"> Pet Care </div>
            </a>
          </li>
        </ul>
        <a href="#" class="morecate-btn"><i class="uil uil-apps"></i>More Categories</a>
      </div>
    </div>
  </div>
</div>
<div id="search_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
  <div class="modal-dialog search-ground-area" role="document">
    <div class="category-area-inner">
      <div class="modal-header">
        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
        <i class="uil uil-multiply"></i>
        </button>
      </div>
      <div class="category-model-content modal-content">
        <div class="search-header">
          <form action="#">
            <input type="search" placeholder="Search for products...">
            <button type="submit"><i class="uil uil-search"></i></button>
          </form>
        </div>
        <div class="search-by-cat">
          <a href="#" class="single-cat">
            <div class="icon">
              <img src="{{ asset('assets/images/category/icon-1.svg') }}" alt="">
            </div>
            <div class="text">
              Fruits and Vegetables
            </div>
          </a>
          <a href="#" class="single-cat">
            <div class="icon">
              <img src="{{ asset('assets/images/category/icon-2.svg') }}" alt="">
            </div>
            <div class="text"> Grocery & Staples </div>
          </a>
          <a href="#" class="single-cat">
            <div class="icon">
              <img src="{{ asset('assets/images/category/icon-3.svg') }}" alt="">
            </div>
            <div class="text"> Dairy & Eggs </div>
          </a>
          <a href="#" class="single-cat">
            <div class="icon">
              <img src="{{ asset('assets/images/category/icon-4.svg') }}" alt="">
            </div>
            <div class="text"> Beverages </div>
          </a>
          <a href="#" class="single-cat">
            <div class="icon">
              <img src="{{ asset('assets/images/category/icon-5.svg') }}" alt="">
            </div>
            <div class="text"> Snacks </div>
          </a>
          <a href="#" class="single-cat">
            <div class="icon">
              <img src="{{ asset('assets/images/category/icon-6.svg') }}" alt="">
            </div>
            <div class="text"> Home Care </div>
          </a>
          <a href="#" class="single-cat">
            <div class="icon">
              <img src="{{ asset('assets/images/category/icon-7.svg') }}" alt="">
            </div>
            <div class="text"> Noodles & Sauces </div>
          </a>
          <a href="#" class="single-cat">
            <div class="icon">
              <img src="{{ asset('assets/images/category/icon-8.svg') }}" alt="">
            </div>
            <div class="text"> Personal Care </div>
          </a>
          <a href="#" class="single-cat">
            <div class="icon">
              <img src="{{ asset('assets/images/category/icon-9.svg') }}" alt="">
            </div>
            <div class="text"> Pet Care </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bs-canvas bs-canvas-left position-fixed bg-cart h-100">
  <div class="bs-canvas-header side-cart-header p-3 ">
    <div class="d-inline-block  main-cart-title">Keranjang <span>{{App\Models\Carts::where('user_id', Session::get('_id'))->count()}} Barang</span></div>
    <button type="button" class="bs-canvas-close close" aria-label="Close"><i class="uil uil-multiply"></i></button>
  </div>
  <div class="bs-canvas-body">
    <div class="side-cart-items">
      @php
        $total_price = 0;
      @endphp

      @foreach(App\Models\Carts::where('user_id', Session::get('_id'))->get() as $row)
      @php
        $total_price = $total_price + $row['meat_for_sale']['discount_price'] * ($row['quantity']/100);
      @endphp

      <div class="cart-item">
        <div class="cart-product-img">
          <img src="{{ env('IMAGE_URL').'/storage/app/public/'.$row['meat_for_sale']['media']['id'].'/'.$row['meat_for_sale']['media']['file_name'] }}" alt="">
          {{-- <div class="offer-badge">6% OFF</div> --}}
        </div>
        <div class="cart-text">
          <h4>{{$row['meat_for_sale']['name']}}</h4>
{{--           <div class="cart-radio">
            <ul class="kggrm-now">
              <li>
                <input type="radio" id="a1" name="cart1">
                <label for="a1">0.50</label>
              </li>
              <li>
                <input type="radio" id="a2" name="cart1">
                <label for="a2">1kg</label>
              </li>
              <li>
                <input type="radio" id="a3" name="cart1">
                <label for="a3">2kg</label>
              </li>
              <li>
                <input type="radio" id="a4" name="cart1">
                <label for="a4">3kg</label>
              </li>
            </ul>
          </div> --}}
          <div class="qty-group">
{{--             <div class="quantity buttons_added">
              <input type="button" value="-" class="minus minus-btn">
              <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
              <input type="button" value="+" class="plus plus-btn">
            </div> --}}
            <div class="cart-item-price">Rp {{number_format($row['meat_for_sale']['discount_price'] * ($row['quantity']/100))}} <span>Rp {{number_format($row['meat_for_sale']['price'] * ($row['quantity']/100))}}</span></div>
          </div>
          <button type="button" class="cart-close-btn" id="delete-cart" data-id="{{$row['id']}}"><i class="uil uil-multiply"></i></button>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="bs-canvas-footer">
    <div class="cart-total-dil saving-total ">
      <h4>Ongkos Kirim</h4>
      <span>Rp 10,000</span>
    </div>
    <div class="main-total-cart">
      <h2>Total</h2>
      <span>Rp {{number_format($total_price + 10000)}}</span>
    </div>
    <div class="checkout-cart">
      {{-- <a href="#" class="promo-code">Have a promocode?</a> --}}
      <a href="{{url('/')}}/checkout" class="cart-checkout-btn hover-btn">Proceed to Checkout</a>
    </div>
  </div>
</div>
<div id="login_modal" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
  <div class="modal-dialog category-area" role="document">
    <div class="category-area-inner">
      <div class="modal-header">
        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
        <i class="uil uil-multiply"></i>
        </button>
      </div>
      <div class="category-model-content modal-content">
        <div class="sign-inup">
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-12">
        <div class="sign-form">
        <div class="sign-inner">
        <div class="sign-logo" id="logo">
        <a href="index.html"><img src="{{ asset('assets/images/BORONG-DAGING-LOGO.png') }}" alt=""></a>
        <a href="index.html"><img class="logo-inverse" src="{{ asset('assets/images/BORONG-DAGING-LOGO.png') }}" alt=""></a>
        </div>
        <div class="form-dt">
        <div class="form-inpts checout-address-step">
        <form id="form-login">
          {!! csrf_field() !!}
        <div class="form-title"><h6>Sign In</h6></div>
        <div class="form-group pos_rel">
        <input id="email" name="email" type="text" placeholder="Enter Email" class="form-control lgn_input" required="">
        <i class="uil uil-mobile-android-alt lgn_icon"></i>
        </div>
        <div class="form-group pos_rel">
        <input id="password" name="password" type="password" placeholder="Enter Password" class="form-control lgn_input" required="">
        <i class="uil uil-padlock lgn_icon"></i>
        </div>
        <button class="login-btn hover-btn" type="submit">Sign In Now</button>
        </form>
        </div>
        <div class="password-forgor">
        <a href="forgot_password.html">Forgot Password?</a>
        </div>
        <div class="signup-link">
        <p>Don't have an account? - <a href="{{url('/signup')}}">Sign Up Now</a></p>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>