@extends('layouts.main')

@section('title', 'Voucher')

@section('content')
<div class="gambo-Breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Voucher</li>
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
                    {{-- <p>{{ $user->phone }}<a href="#"><i class="uil uil-edit"></i></a></p> --}}
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
                                <h4><i class="uil uil-box"></i>Voucher</h4>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mt-2">
                            <div class="tabs">
                                <a href="#" class="sort active" data-filter="all" id="showAll">Semua</a>
                                <a href="#" class="sort" data-filter="active" >Aktif</a>
                                <a href="#" class="sort" data-filter="expired" >Expired</a>
                            </div>
                            <div class="row">
                                <x-empty-view-voucher display="none"/>
                                @foreach ($vouchers as $key => $voucher)
                                <div class="col-md-6 mb-3">
                                    <div class="card voucher" data-category="{{ $voucher->expires_at->gt($dateNow) ? "active" : "expired" }}" data-key="{{ $key }}">
                                        <input type="hidden" value="{{ $voucher->code }}" id="voucher-code-{{ $key }}">
                                        <div class="card-body shadow-sm" style="padding: 0 !important">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <div class="coupon px-3 text-white text-center text-uppercase">
                                                        <h3>{{ $voucher->coupon_for }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="d-flex justify-content-between align-items-stretch">
                                                        <div>
                                                            <p><b>{{ $voucher->code }}</b></p>
                                                            <p>{!! $voucher->description !!}</p>
                                                            <p>Hingga : {{ $voucher->expires_at->format('d.m.Y') }}</p>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <div class="mb-auto"><p class="text-danger" style="cursor: pointer">Pakai <i class="uil uil-angle-right"></i></p></div>
                                                            
                                                            <a href="" class="text-primary">S&K</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    </div>
</div>

@endsection

@section('additionalScript')
<script type="text/javascript">
    $(document).on('click', '.voucher', function () { 
        const key = $(this).data('key')
        const code = $('#voucher-code-'+key)
        var aux = document.createElement("input");
        aux.setAttribute("value", code.val());
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);
        alert("Copied the text: " + code.val());
        // code.select();
        // code.setSelectionRange(0, 99999)
        // document.execCommand("copy");
        // alert("Copied the text: " + code.value);
    })

    let vouchers = $('.voucher');
    $(document).on('click', '.sort', function(e){
        e.preventDefault()
        let customType = $( this ).data('filter');
        if (customType == "all") {
            vouchers.show(50);    
        }else{
            vouchers.hide().filter(function () {
                return $(this).data('category') === customType;
            }).show(50);
        }
        let countVoucherShow = vouchers.filter(function() {
            return $(this).css('display') !== 'none';
        }).length;
        if (countVoucherShow == 0) {
            console.log(countVoucherShow);
            $('.empty-view').attr('display', 'block')
        }
    });

    $( ".sort" ).click(function() {
        $( this ).toggleClass( "active" ).siblings().removeClass("active");
    }).show(50);



</script>
@endsection