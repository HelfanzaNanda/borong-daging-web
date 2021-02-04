@extends('layouts.main')

@section('title', 'My Order')

@section('content')
<div class="gambo-Breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Orders</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="dashboard-group">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="user-dt">
                    <div class="user-img">
                        <img src="images/avatar/img-5.jpg" alt="">
                        <div class="img-add">
                            <input type="file" id="file">
                            <label for="file"><i class="uil uil-camera-plus"></i></label>
                        </div>
                    </div>
                    <h4>{{ $user->name }}</h4>
                    <p>{{ $user->phone }}<a href="#"><i class="uil uil-edit"></i></a></p>
                    {{-- <div class="earn-points"><img src="images/Dollar.svg" alt="">Points : <span>20</span></div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="left-side-tabs">
                    <div class="dashboard-left-links">
                        <a href="dashboard_overview.html" class="user-item"><i class="uil uil-apps"></i>Overview</a>
                        <a href="dashboard_my_orders.html" class="user-item active"><i class="uil uil-box"></i>My
                            Orders</a>
                        <a href="dashboard_my_rewards.html" class="user-item"><i class="uil uil-gift"></i>My
                            Rewards</a>
                        <a href="dashboard_my_wallet.html" class="user-item"><i class="uil uil-wallet"></i>My
                            Wallet</a>
                        <a href="dashboard_my_wishlist.html" class="user-item"><i class="uil uil-heart"></i>Shopping
                            Wishlist</a>
                        <a href="dashboard_my_addresses.html" class="user-item"><i
                                class="uil uil-location-point"></i>My Address</a>
                        <a href="sign_in.html" class="user-item"><i class="uil uil-exit"></i>Logout</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title-tab">
                                <h4><i class="uil uil-box"></i>My Orders</h4>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            @forelse ($orders as $order)
                                <div class="pdpt-bg">
                                    <div class="pdpt-title">
                                        <h6>{{ $order['hint'] }}</h6>
                                    </div>
                                    <div class="order-body10">
                                        <ul class="order-dtsll">
                                            {{-- <li>
                                                <div class="order-dt-img">
                                                    <img src="images/groceries.svg" alt="">
                                                </div>
                                            </li> --}}
                                            <li>
                                                <div class="order-dt47">
                                                    <h4>{{ $order['phone'] }}</h4>
                                                    <p>{{ $order['address'] }}</p>
                                                    <div class="order-title">{{ $order['count_items'] }} Items
                                                         <span data-inverted="" data-tooltip="{{ $order['food_items'] }}"
                                                            data-position="top center">?</span></div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="total-dt">
                                            <div class="total-checkout-group">
                                                <div class="cart-total-dil">
                                                    <h4>Sub Total</h4>
                                                    <span>{{ 'Rp. '.number_format(floatval($order['sub_total'])) }}</span>
                                                </div>
                                                <div class="cart-total-dil pt-3">
                                                    <h4>Delivery Charges</h4>
                                                    <span>{{ 'Rp. '.number_format(floatval($order['delivery_fee'])) }}</span>
                                                </div>
                                            </div>
                                            <div class="main-total-cart">
                                                <h2>Total</h2>
                                                <span>{{ 'Rp. '.number_format(floatval($order['total'])) }}</span>
                                            </div>
                                        </div>
                                        <div class="track-order">
                                            <h4>Track Order</h4>
                                            <div class="bs-wizard" style="border-bottom:0;">
                                                @foreach ($traks as $key => $trak)
                                                <div class="bs-wizard-step {{ $order['order_status'] >= $key+1 ? 'complete' : 'disabled'}}">
                                                    <div class="text-center bs-wizard-stepnum">{{ $trak }}</div>
                                                    <div class="progress">
                                                        <div class="progress-bar"></div>
                                                    </div>
                                                    <a href="#" class="bs-wizard-dot"></a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{-- <div class="alert-offer">
                                            <img src="images/ribbon.svg" alt="">
                                            Cashback of $2 will be credit to Gambo Super Market wallet 6-12 hours of
                                            delivery.
                                        </div>
                                        <div class="call-bill">
                                            <div class="delivery-man">
                                                Delivery Boy - <a href="#"><i class="uil uil-phone"></i> Call Us</a>
                                            </div>
                                            <div class="order-bill-slip">
                                                <a href="#" class="bill-btn5 hover-btn">View Bill</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            @empty
                                <h5>tidak ada orderan</h5>
                            @endforelse
{{--
                            <div class="pdpt-bg">
                                <div class="pdpt-title">
                                    <h6>Delivery Timing 10 May, 3.00PM - 6.00PM</h6>
                                </div>
                                <div class="order-body10">
                                    <ul class="order-dtsll">
                                        <li>
                                            <div class="order-dt-img">
                                                <img src="images/groceries.svg" alt="">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="order-dt47">
                                                <h4>Gambo - Ludhiana</h4>
                                                <p>Delivered - Gambo</p>
                                                <div class="order-title">2 Items <span data-inverted=""
                                                        data-tooltip="2kg broccoli, 1kg Apple"
                                                        data-position="top center">?</span></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="total-dt">
                                        <div class="total-checkout-group">
                                            <div class="cart-total-dil">
                                                <h4>Sub Total</h4>
                                                <span>$25</span>
                                            </div>
                                            <div class="cart-total-dil pt-3">
                                                <h4>Delivery Charges</h4>
                                                <span>Free</span>
                                            </div>
                                        </div>
                                        <div class="main-total-cart">
                                            <h2>Total</h2>
                                            <span>$25</span>
                                        </div>
                                    </div>
                                    <div class="track-order">
                                        <h4>Track Order</h4>
                                        <div class="bs-wizard" style="border-bottom:0;">
                                            <div class="bs-wizard-step complete">
                                                <div class="text-center bs-wizard-stepnum">Placed</div>
                                                <div class="progress">
                                                    <div class="progress-bar"></div>
                                                </div>
                                                <a href="#" class="bs-wizard-dot"></a>
                                            </div>
                                            <div class="bs-wizard-step complete">
                                                <div class="text-center bs-wizard-stepnum">Packed</div>
                                                <div class="progress">
                                                    <div class="progress-bar"></div>
                                                </div>
                                                <a href="#" class="bs-wizard-dot"></a>
                                            </div>
                                            <div class="bs-wizard-step complete">
                                                <div class="text-center bs-wizard-stepnum">Arrived</div>
                                                <div class="progress">
                                                    <div class="progress-bar"></div>
                                                </div>
                                                <a href="#" class="bs-wizard-dot"></a>
                                            </div>
                                            <div class="bs-wizard-step complete">
                                                <div class="text-center bs-wizard-stepnum">Delivered</div>
                                                <div class="progress">
                                                    <div class="progress-bar"></div>
                                                </div>
                                                <a href="#" class="bs-wizard-dot"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="call-bill">
                                        <div class="delivery-man">
                                            <a href="#"><i class="uil uil-rss"></i>Feedback</a>
                                        </div>
                                        <div class="order-bill-slip">
                                            <a href="#" class="bill-btn5 hover-btn">View Bill</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection