<div class="top-header-group">
  <div class="top-header" style="height: 45px">
    {{-- <div class="res_main_logo">
      <a href="index.html"><img src="{{ asset('assets/images/BORONG-DAGING-LOGO.png') }}" alt=""></a>
    </div>
    <div class="main_logo" id="logo">
      <a href="index.html"><img src="{{ asset('assets/images/BORONG-DAGING-LOGO.png') }}" alt=""></a>
      <a href="index.html"><img class="logo-inverse" src="{{ asset('assets/images/BORONG-DAGING-LOGO.png') }}" alt=""></a>
    </div> --}}
    {{-- <div class="search120">
      <div class="ui search">
        <div class="ui left icon input swdh10">
          <input class="prompt srch10" type="text" placeholder="Search for products..">
          <i class='uil uil-search-alt icon icon1'></i>
        </div>
      </div>
    </div> --}}
    <div class="header_right">
      <ul>
        <li> <a href="#" class="offer-link"><i class="uil uil-phone-alt"></i>1800-000-000</a> </li>
        <li> <a href="#" class="offer-link"><i class="uil uil-gift"></i>Offers</a> </li>
        <li> <a href="{{ route('faq') }}" class="offer-link"><i class="uil uil-question-circle"></i>Help</a> </li>
        {{-- <li> <a href="#" class="option_links" title="Wishlist"><i class='uil uil-heart icon_wishlist'></i><span class="noti_count1">3</span></a> </li> --}}
        @if(!Session::get('_login'))
        <li> <a href="javascript:void(0)" data-toggle="modal" data-target="#login_modal" class="offer-link"><i class="uil uil-padlock"></i>Login</a> </li>
        <li> <a href="javascript:void(0)" data-toggle="modal" data-target="#register_modal" class="offer-link"><i class="uil uil-padlock"></i>Register</a> </li>
        @else
        <li class="ui dropdown">
          <a href="#" class="opts_account">
          <img src="{{ asset('assets/images/avatar/img-5.jpg') }}" alt="">
          <span class="user__name">{{Session::get('_name')}}</span>
          <i class="uil uil-angle-down"></i>
          </a>
          <div class="menu dropdown_account">
            <div class="night_mode_switch__btn">
              <a href="#" id="night-mode" class="btn-night-mode">
              <i class="uil uil-moon"></i> Night mode
              <span class="btn-night-mode-switch">
              <span class="uk-switch-button"></span>
              </span>
              </a>
            </div>
            {{-- <a href="dashboard_overview.html" class="item channel_item"><i class="uil uil-apps icon__1"></i>Dashbaord</a> --}}
            <a href="{{ route('myorders') }}" class="item channel_item"><i class="uil uil-box icon__1"></i>My Orders</a>
            <a href="{{ url('/delivery-address') }}" class="item channel_item"><i class="uil uil-home-alt icon__1"></i>Shipping Management</a>
            {{-- <a href="dashboard_my_wishlist.html" class="item channel_item"><i class="uil uil-heart icon__1"></i>My Wishlist</a>
            <a href="dashboard_my_wallet.html" class="item channel_item"><i class="uil uil-usd-circle icon__1"></i>My Wallet</a>
            <a href="dashboard_my_addresses.html" class="item channel_item"><i class="uil uil-location-point icon__1"></i>My Address</a>
            <a href="offers.html" class="item channel_item"><i class="uil uil-gift icon__1"></i>Offers</a>
            <a href="faq.html" class="item channel_item"><i class="uil uil-info-circle icon__1"></i>Faq</a> --}}
            <a href="{{url('/logout')}}" class="item channel_item"><i class="uil uil-lock-alt icon__1"></i>Logout</a>
          </div>
        </li>
        @endif
      </ul>
    </div>
  </div>
</div>
<div class="sub-header-group">
  @include('layouts.menu')
</div>
