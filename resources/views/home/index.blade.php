@extends('layouts.main')

@section('title', 'Customer')

@section('slider')
<div class="main-banner-slider">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="owl-carousel offers-banner owl-theme">

              @foreach ($slides as $slide)
                <div class="item">
                  <div class="offer-item">
                    <div class="offer-item-img">
                      <div class="gambo-overlay"></div>
                      <img style="height: 205px; object-fit: {{ $slide->image_fit }}"
                      src="{{ env('IMAGE_URL'). '/storage/app/public/' . $slide->image->id. '/' . $slide->image->file_name }}">
                    </div>
                    <div class="offer-text-dt">
                      <div class="offer-top-text-banner" style="background: {{ $slide->background_color }}">
                        <p style="color: {{ $slide->text_color }}">{{ $slide->text }}</p>
                        {{-- <p>6% Off</p>
                        <div class="top-text-1">Buy More & Save More</div>
                        <span>Fresh Vegetables</span> --}}
                      </div>
                      <a href="#" class="Offer-shop-btn hover-btn" 
                      style="background: {{ $slide->button_color }}; color : {{ $slide->text_color }}">{{ $slide->button }}</a>
                    </div>
                  </div>
                </div>
              @endforeach
             
             {{-- <div class="item">
                <div class="offer-item">
                  <div class="offer-item-img">
                    <div class="gambo-overlay"></div>
                    <img src="{{ asset('assets/images/banners/offer-5.jpg') }}" alt="">
                  </div>
                  <div class="offer-text-dt">
                    <div class="offer-top-text-banner">
                      <p>3% Off</p>
                      <div class="top-text-1">Buy More & Save More</div>
                      <span>Nuts & Snacks</span>
                    </div>
                    <a href="#" class="Offer-shop-btn hover-btn">Shop Now</a>
                  </div>
                </div>
              </div> --}}
            </div>
        </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="section145">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="main-title-tt">
          <div class="main-title-left">
            <span>Hanya Sementara</span>
            <h2>Flash Sale!</h2>
          </div>
          {{-- <a href="#" class="see-more-btn">Lihat Semua</a> --}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="owl-carousel featured-slider owl-theme">
          @foreach($featured_products as $featured_product)
          <div class="item">
            <div class="product-item">
              <a href="{{url('/product/'.\Str::slug($featured_product['name'].'-'.$featured_product['id']))}}" class="product-img">
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
<div class="section145">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="main-title-tt">
          <div class="main-title-left">
            <span>Belanja Per</span>
            <h2>Kategori</h2>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="owl-carousel cate-slider owl-theme">
          @foreach($categories as $category)
            <div class="item">
              <a href="{{url('/category/'.\Str::slug($category['name'].'-'.$category['id']))}}" class="category-item">
                <div class="cate-img">
                  <img src="{{ env('IMAGE_URL').'/storage/app/public/'.$category['media']['id'].'/'.$category['media']['file_name'] }}" alt="">
                </div>
                <h4>{{$category['name']}}</h4>
              </a>
            </div>
          @endforeach
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
            <span>Spesial</span>
            <h2>Untuk Kamu Pengguna Baru!</h2>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <a href="#" class="code-offer-item">
        <img src="{{ asset('assets/images/best-offers/offer-4.jpg') }}" alt="">
        </a>
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
            <span>Untuk Kamu</span>
            <h2>Sajian Masakan</h2>
          </div>
          <a href="#" class="see-more-btn">Lihat Semua</a>
        </div>
      </div>
      <div class="col-md-12">
        <div class="owl-carousel featured-slider owl-theme">
          @foreach($cuisines as $cuisine)
          <div class="item">
            <div class="product-item">
              <a href="{{url('/cuisine/'.\Str::slug($cuisine['name'].'-'.$cuisine['id']))}}" class="product-img">
                <img src="{{ env('IMAGE_URL').'/storage/app/public/'.$cuisine['media']['id'].'/'.$cuisine['media']['file_name'] }}" alt="">
              </a>
              <div class="product-text-dt">
                <h4>{{$cuisine['name']}}</h4>
                {{-- <a href="{{url('/cuisine/'.\Str::slug($cuisine['name'].'-'.$cuisine['id']))}}">{{$cuisine['name']}}</a> --}}
                <p>{!! $cuisine['description'] !!}</p>
              </div>
            </div>
          </div>
          @endforeach
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
            <span>Untuk Kamu</span>
            <h2>Best Seller!</h2>
          </div>
          <a href="#" class="see-more-btn">Lihat Semua</a>
        </div>
      </div>
      <div class="col-md-12">
        <div class="owl-carousel featured-slider owl-theme">
          @foreach($featured_products as $featured_product)
          <div class="item">
            <div class="product-item">
              <a href="{{url('/product/'.\Str::slug($featured_product['name'].'-'.$featured_product['id']))}}" class="product-img">
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
<div class="section145">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="main-title-tt">
          <div class="main-title-left">
            <span>Promo</span>
            <h2>Hanya Untuk Minggu Ini!</h2>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <a href="#" class="best-offer-item">
        <img src="{{ asset('assets/images/best-offers/offer-1.jpg') }}" alt="">
        </a>
      </div>
      <div class="col-lg-4 col-md-6">
        <a href="#" class="best-offer-item">
        <img src="{{ asset('assets/images/best-offers/offer-2.jpg') }}" alt="">
        </a>
      </div>
      <div class="col-lg-4 col-md-6">
        <a href="#" class="best-offer-item offr-none">
          <img src="{{ asset('assets/images/best-offers/offer-3.jpg') }}" alt="">
          <div class="cmtk_dt">
            <div class="product_countdown-timer offer-counter-text" data-countdown="2021/01/30"></div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<div class="section145" style="margin-bottom: 50px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="main-title-tt">
          <div class="main-title-left">
            <span>Untuk Kamu</span>
            <h2>Produk Yang Baru Ditambahkan</h2>
          </div>
          <a href="#" class="see-more-btn">Lihat Semua</a>
        </div>
      </div>
      <div class="col-md-12">
        <div class="owl-carousel featured-slider owl-theme">
          @foreach($featured_products as $featured_product)
          <div class="item">
            <div class="product-item">
              <a href="{{url('/product/'.\Str::slug($featured_product['name'].'-'.$featured_product['id']))}}" class="product-img">
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
@endsection
