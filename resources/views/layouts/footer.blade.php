<div class="footer-first-row">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <ul class="call-email-alt">
          <li><a href="#" class="callemail"><i class="uil uil-dialpad-alt"></i>1800-000-000</a></li>
          <li><a href="#" class="callemail"><i class="uil uil-envelope-alt"></i><span class="__cf_email__" data-cfemail="0e676068614e696f636c617d7b7e6b7c636f7c656b7a206d6163">[email&#160;protected]</span></a></li>
        </ul>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="social-links-footer">
          <ul>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="footer-second-row">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="second-row-item">
          <h4>Info Borong Daging</h4>
          <ul>
            <li><a href="#">Tentang Borong Daging</a></li>
            <li><a href="#">Karir</a></li>
            <li><a href="#">Kabar Terbaru</a></li>
          </ul>
          <h4>Kerjasama Dengan Borong Daging</h4>
          <ul>
            <li><a href="#">Ingin Penghasilan Tambahan?</a></li>
            <li><a href="#">Bergabung di Mitra Borong Daging</a></li>
            <li><a href="#">Berjualan di Borong Daging</a></li>
            <li><a href="#">Kolaborasi</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="second-row-item">
          <h4>Layanan Borong Daging</h4>
          <ul>
            <li><a href="about_us.html">FAQ</a></li>
            <li><a href="shop_grid.html">Gratis Ongkir</a></li>
            <li><a href="offers.html">Hubungi Kami</a></li>
            <li><a href="our_blog.html">Cara Pemesanan</a></li>
            <li><a href="faq.html">Cara Pembayaran</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="second-row-item">
          <h4>Kategori Produk</h4>
            @php
                $categories = App\Models\Categories::get()
            @endphp
            <ul>
              @foreach ($categories as $category)
                <li><a href="{{url('/category/'.\Str::slug($category['name'].'-'.$category['id']))}}">{{ $category->name }}</a></li>
              @endforeach
            </ul>
            <h4>Kategori Berdasarkan Masakan</h4>
            @php
                $cuisines = App\Models\Cuisines::get()
            @endphp
            <ul>
              @foreach ($cuisines as $cuisine)
                <li><a href="{{url('/cuisine/'.\Str::slug($cuisine['name'].'-'.$cuisine['id']))}}">{{ $cuisine->name }}</a></li>
              @endforeach
            </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="second-row-item-app">
          <h4>Download App</h4>
          <ul>
            <li><a href="#"><img class="download-btn" src="{{ asset('assets/images/download-1.svg') }}" alt=""></a></li>
            <li><a href="#"><img class="download-btn" src="{{ asset('assets/images/download-2.svg') }}" alt=""></a></li>
          </ul>
        </div>
        <div class="second-row-item-payment">
          <h4>Payment Method</h4>
          <div class="footer-payments">
            <ul id="paypal-gateway" class="financial-institutes">
              <li class="financial-institutes__logo">
                <img alt="Visa" title="Visa" src="{{ asset('assets/images/footer-icons/pyicon-6.svg') }}">
              </li>
              <li class="financial-institutes__logo">
                <img alt="Visa" title="Visa" src="{{ asset('assets/images/footer-icons/pyicon-1.svg') }}">
              </li>
              <li class="financial-institutes__logo">
                <img alt="MasterCard" title="MasterCard" src="{{ asset('assets/images/footer-icons/pyicon-2.svg') }}">
              </li>
              <li class="financial-institutes__logo">
                <img alt="American Express" title="American Express" src="{{ asset('assets/images/footer-icons/pyicon-3.svg') }}">
              </li>
              <li class="financial-institutes__logo">
                <img alt="Discover" title="Discover" src="{{ asset('assets/images/footer-icons/pyicon-4.svg') }}">
              </li>
            </ul>
          </div>
        </div>
        <div class="second-row-item-payment">
          <h4>Newsletter</h4>
          <div class="newsletter-input">
            <input id="email" name="email" type="text" placeholder="Email Address" class="form-control input-md" required="">
            <button class="newsletter-btn hover-btn" type="submit"><i class="uil uil-telegram-alt"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="footer-last-row">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="footer-bottom-links">
          <ul>
            <li><a href="about_us.html">About</a></li>
            <li><a href="contact_us.html">Contact</a></li>
            <li><a href="privacy_policy.html">Privacy Policy</a></li>
            <li><a href="term_and_conditions.html">Term & Conditions</a></li>
            <li><a href="refund_and_return_policy.html">Refund & Return Policy</a></li>
          </ul>
        </div>
        <div class="copyright-text">
          <i class="uil uil-copyright"></i>Copyright {{date('Y')}} <b>Borong Daging</b> . All rights reserved
        </div>
      </div>
    </div>
  </div>
</div>