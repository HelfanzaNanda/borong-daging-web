@extends('layouts.main')

@section('title', 'Customer')

@section('slider')
<div class="main-banner-slider">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="owl-carousel offers-banner owl-theme">
              <div class="item">
                <div class="offer-item">
                  <div class="offer-item-img">
                    <div class="gambo-overlay"></div>
                    <img src="{{ asset('assets/images/banners/offer-1.jpg') }}" alt="">
                  </div>
                  <div class="offer-text-dt">
                    <div class="offer-top-text-banner">
                      <p>6% Off</p>
                      <div class="top-text-1">Buy More & Save More</div>
                      <span>Fresh Vegetables</span>
                    </div>
                    <a href="#" class="Offer-shop-btn hover-btn">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="offer-item">
                  <div class="offer-item-img">
                    <div class="gambo-overlay"></div>
                    <img src="{{ asset('assets/images/banners/offer-2.jpg') }}" alt="">
                  </div>
                  <div class="offer-text-dt">
                    <div class="offer-top-text-banner">
                      <p>5% Off</p>
                      <div class="top-text-1">Buy More & Save More</div>
                      <span>Fresh Fruits</span>
                    </div>
                    <a href="#" class="Offer-shop-btn hover-btn">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="offer-item">
                  <div class="offer-item-img">
                    <div class="gambo-overlay"></div>
                    <img src="{{ asset('assets/images/banners/offer-3.jpg') }}" alt="">
                  </div>
                  <div class="offer-text-dt">
                    <div class="offer-top-text-banner">
                      <p>3% Off</p>
                      <div class="top-text-1">Hot Deals on New Items</div>
                      <span>Daily Essentials Eggs & Dairy</span>
                    </div>
                    <a href="#" class="Offer-shop-btn hover-btn">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="offer-item">
                  <div class="offer-item-img">
                    <div class="gambo-overlay"></div>
                    <img src="{{ asset('assets/images/banners/offer-4.jpg') }}" alt="">
                  </div>
                  <div class="offer-text-dt">
                    <div class="offer-top-text-banner">
                      <p>2% Off</p>
                      <div class="top-text-1">Buy More & Save More</div>
                      <span>Beverages</span>
                    </div>
                    <a href="#" class="Offer-shop-btn hover-btn">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="item">
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
              </div>
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
            <span>Shop By</span>
            <h2>Categories</h2>
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
            <span>Untuk Kamu</span>
            <h2>Top Featured Products</h2>
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
            <span>Offers</span>
            <h2>Best Values</h2>
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
            <div class="product_countdown-timer offer-counter-text" data-countdown="2021/01/06"></div>
          </div>
        </a>
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