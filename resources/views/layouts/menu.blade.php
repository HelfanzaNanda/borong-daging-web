<div class="sub-header" style="height: 69px">
{{--     <div class="ui dropdown">
      <a href="#" class="category_drop hover-btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i><span class="cate__icon">Select Category</span></a>
    </div> --}}
  <div class="res_main_logo">
      <a href="{{url('/')}}"><img src="{{ asset('assets/images/BORONG-DAGING-LOGO.png') }}" alt=""></a>
  </div>
<div class="main_logo" id="logo" style="width: 300px;">
    <a href="{{url('/')}}"><img style="width: auto; height: 65px; float: right;" src="{{ asset('assets/images/BORONG-DAGING-LOGO.png') }}" alt=""></a>
    <a href="{{url('/')}}"><img style="width: auto; height: 65px; float: right;" class="logo-inverse" src="{{ asset('assets/images/BORONG-DAGING-LOGO.png') }}" alt=""></a>      
  </div>
    <nav class="navbar navbar-expand-lg navbar-light py-3">
      <div class="container-fluid">
        <button class="navbar-toggler menu_toggle_btn" type="button" data-target="#navbarSupportedContent"><i class="uil uil-bars"></i></button>
        <div class="collapse navbar-collapse d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end bg-dark1 p-3 p-lg-0 mt1-5 mt-lg-0 mobileMenu" id="navbarSupportedContent">
          <ul class="navbar-nav main_nav align-self-stretch">
            

            {{-- <li class="nav-item"><a href="{{url('/')}}" class="nav-link active" title="Home">Home</a></li> --}}
{{--             <li class="nav-item"><a href="#" class="nav-link new_item" title="New Products">New Products</a></li>
            <li class="nav-item"><a href="#" class="nav-link" title="Featured Products">Featured Products</a></li>
            <li class="nav-item">
              <div class="ui icon top left dropdown nav__menu">
                <a class="nav-link" title="Pages">Pages <i class="uil uil-angle-down"></i></a>
                <div class="menu dropdown_page">
                  <a href="#" class="item channel_item page__links">Account</a>
                  <a href="#" class="item channel_item page__links">About Us</a>
                  <a href="#" class="item channel_item page__links">Shop Grid</a>
                  <a href="#" class="item channel_item page__links">Single Product View</a>
                  <a href="#" class="item channel_item page__links">Checkout</a>
                  <a href="#" class="item channel_item page__links">Product Request</a>
                  <a href="#" class="item channel_item page__links">Order Placed</a>
                  <a href="#" class="item channel_item page__links">Bill Slip</a>
                  <a href="#" class="item channel_item page__links">Sign In</a>
                  <a href="#" class="item channel_item page__links">Sign Up</a>
                  <a href="#" class="item channel_item page__links">Forgot Password</a>
                  <a href="#" class="item channel_item page__links">Contact Us</a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="ui icon top left dropdown nav__menu">
                <a class="nav-link" title="Blog">Blog <i class="uil uil-angle-down"></i></a>
                <div class="menu dropdown_page">
                  <a href="#" class="item channel_item page__links">Our Blog</a>
                  <a href="#" class="item channel_item page__links">Our Blog Two No Sidebar</a>
                  <a href="#" class="item channel_item page__links">Our Blog with Left Sidebar</a>
                  <a href="#" class="item channel_item page__links">Our Blog with Right Sidebar</a>
                  <a href="#" class="item channel_item page__links">Blog Detail View</a>
                  <a href="#" class="item channel_item page__links">Blog Detail View with Sidebar</a>
                </div>
              </div>
            </li>
            <li class="nav-item"><a href="#" class="nav-link" title="Contact">Contact Us</a></li> --}}
          </ul>

        </div>
      </div>
    </nav>
    <div class="search120" style="width: 45%;">
        <div class="ui search">
            <div class="form-group ui left input swdh10 ">
              <input class="prompt srch10" autocomplete="off" id="search" type="text" name="search" placeholder="Search for products.." value="{{ old('search') }}">
                <div id="product-list"></div>
                @csrf  
              {{-- <input class="prompt srch10 d-none" type="text" id="select-search" name="search"> --}}
                {{-- <form method="post" action="{{ route('product.search') }}" class="ui left icon input swdh10">
                    @csrf
                    
                    <button type="submit" class="hover-btn" style="background-color: #f55d2c; outline: none; border: none; color: white; padding: 0 5px">
                        <i class='uil uil-search-alt icon icon1'></i>
                    </button>
                </form> --}}
                {{-- <i class='uil uil-search-alt icon icon1'></i> --}}
            </div>
        </div>
    </div>
    <div class="catey__icon">
      <a href="#" class="cate__btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i></a>
    </div>
    <div class="header_cart order-1">
      <a href="#" class="cart__btn hover-btn pull-bs-canvas-left" title="Cart"><i class="uil uil-shopping-cart-alt"></i><span>Cart</span><ins>{{App\Models\Carts::where('user_id', Session::get('_id'))->count()}}</ins><i class="uil uil-angle-down"></i></a>
    </div>
    <div class="search__icon order-1">
      <a href="#" class="search__btn hover-btn" data-toggle="modal" data-target="#search_model" title="Search"><i class="uil uil-search"></i></a>
    </div>
</div>

