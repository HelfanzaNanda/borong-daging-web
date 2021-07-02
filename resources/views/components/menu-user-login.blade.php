<div class="col-lg-3 col-md-4">
    <div class="left-side-tabs">
        <div class="dashboard-left-links">
            {{-- <a href="dashboard_overview.html" class="user-item {{ Request::is('') ? 'active' : '' }}"><i class="uil uil-apps"></i>Overview</a> --}}
            <a href="{{ url('/my-orders') }}" class="user-item {{ Request::is('my-orders') ? 'active' : '' }}"><i class="uil uil-box"></i>Orderan Saya</a>
            {{-- <a href="dashboard_my_rewards.html" class="user-item {{ Request::is('') ? 'active' : '' }}"><i class="uil uil-gift"></i>My
                Rewards</a> --}}
            {{-- <a href="dashboard_my_wallet.html" class="user-item {{ Request::is('') ? 'active' : '' }}"><i class="uil uil-wallet"></i>My
                Wallet</a> --}}
            <a href="{{ url('/voucher') }}" class="user-item {{ Request::is('voucher') ? 'active' : '' }}">
                <i class="uil uil-file-info-alt"></i>Voucher</a>
            <a href="{{ url('/delivery-address') }}" class="user-item {{ Request::is('delivery-address') ? 'active' : '' }}"><i class="uil uil-location-point"></i>Manajemen Lokasi</a>
            <a href="sign_in.html" class="user-item {{ Request::is('') ? 'active' : '' }}"><i class="uil uil-exit"></i>Logout</a>
        </div>
    </div>
</div>