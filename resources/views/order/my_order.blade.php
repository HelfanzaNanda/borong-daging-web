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
                        <li class="breadcrumb-item active" aria-current="page">Orderan Saya</li>
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
            <x-menu-user-login/>
            <div class="col-lg-9 col-md-8">
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title-tab">
                                <h4><i class="uil uil-box"></i>My Orders</h4>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mt-3">
                            @forelse ($orders as $key => $order)
                            <div class="pdpt-bg">
                                <div class="pdpt-title">
                                    <h6>{{ $order['id'] }}</h6>
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
                                                <h4>{{ $order['address_desc'] }}</h4>
                                                <p>{{ $order['address'] }}</p>
                                                {{-- <div class="order-title">{{ $order['count_items'] }} Items
                                                <span data-inverted="" data-tooltip="{{ $order['food_items'] }}"
                                                    data-position="top center">?</span>
                                            </div> --}}
                                            <div class="order-title">{{ $order['count_items'] }} Items
                                                <button type="button" class="btn btn-sm btn-items" id="btn-items"
                                                    data-key="{{ $key }}" data-items="{{ $order['food_items'] }}"
                                                    style="background-color: #f55d2c; color: white">
                                                    lihat items
                                                </button>
                                            </div>
                                            <p class="mt-2">{{ $order['hint'] }}</p>
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
                                        <div
                                            class="bs-wizard-step {{ $order['order_status'] >= $key+1 ? 'complete' : 'disabled'}}">
                                            <div class="text-center bs-wizard-stepnum">{{ $trak }}</div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <a href="#" class="bs-wizard-dot"></a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <x-empty-view-order/>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade show" id="myOrdersModal" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-light">
                    <thead class="thead-light"></thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody id="modal-tbody"></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('additionalScript')
<script type="text/javascript">
    $('.btn-items').on('click', (e) => {
    const items = $(e.currentTarget).data('items');
    let tr = ``;
    $.each(items, (key, item) => {
        tr +=   `<tr>`
        tr +=       `<td>${key+1}</td>`
        tr +=       `<td>${item.food.name}</td>`
        tr +=       `<td>${item.quantity}</td>`
        tr +=       `<td>Rp. ${parseInt(item.price).toLocaleString()}</td>`
        tr +=   `</tr>`
    });
    $('#modal-tbody').html(tr);
    $('#myOrdersModal').modal('show');
});
</script>
@endsection