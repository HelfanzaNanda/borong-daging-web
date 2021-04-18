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
                     <li class="breadcrumb-item active" aria-current="page">{{$cuisine->name}}</li>
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
                              <img src="{{ env('IMAGE_URL').'/storage/app/public/'.$cuisine->media->id.'/'.$cuisine->media->file_name }}" alt="">
                           </div>
                        </div>
                        <div id="sync2" class="owl-carousel owl-theme">
                           <div class="item">
                              <img src="{{ env('IMAGE_URL').'/storage/app/public/'.$cuisine->media->id.'/'.$cuisine->media->file_name }}" alt="">
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-8 col-md-8">
                        <div class="product-dt-right">
                           <h2>{{$cuisine->name}}</h2>
                           <div class="pdp-text-dt mb-3">
                              <h4 class="m-0">Description</h4>
                              <p >{!! $cuisine->description !!}</p>
                           </div>
                           <div class="pdp-text-dt">
                              <h4 class="m-0">Komposisi</h4>
                              <p>{!! $cuisine->ingredient ?? '-' !!}</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12 col-md-12">
               <div class="pdpt-title">
                  <h4>Bahan Yang di Gunakan</h4>
               </div>
               <div class="col-md-12">
                  <div class="owl-carousel featured-slider owl-theme">
                     @foreach($products as $product)
                     <div class="item">
                        <div class="product-item">
                           <a href="{{url('/product/'.\Str::slug($product['name'].'-'.$product['id']))}}" class="product-img">
                              {{-- <img src="{{ env('IMAGE_URL').'/storage/app/public/'.$product['media']['id'].'/'.$product['media']['file_name'] }}" alt=""> --}}
                              <img src="{{ env('IMAGE_URL').'/storage/app/public/'.$product['media']['id'].'/'.$product['media']['file_name'] }}" alt="">
                              <div class="product-absolute-options">
                                 <span class="offer-badge-1">6% off</span>
                                 <span class="like-icon" title="wishlist"></span>
                              </div>
                           </a>
                           <div class="product-text-dt">
                              <p>Available<span>(In Stock)</span></p>
                              <h4>{{$product['name']}}</h4>
                              <div class="product-price">{{'Rp '. number_format(floatval($product['discount_price']))}} <span>{{'Rp '. number_format(floatval($product['price']))}}</span></div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection