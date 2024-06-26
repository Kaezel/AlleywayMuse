@extends('themes.alleywayMuse.layouts.app')
@include('themes.alleywayMuse.shared.slider')
@section('content')

<section class="popular">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-6">
          <h1>Popular</h1>
        </div>
        <div class="col-6 text-end">
          <a href="{{ url('products') }}" class="btn-first">View All</a>
        </div>
      </div>
      <div class="row mt-5">
        @foreach ($popularProducts as $product)
          <div class="col-lg-3 col-6">
              <div class="card card-product card-body p-lg-4 p3">
                  <a href="{{ shop_product_link($product) }}">
                      <img src="{{ asset('themes/alleywayMuse/assets/img/' . $product->featured_image) }}" alt="" class="img-fluid"> <!-- Modifikasi -->
                  </a>
                  <h3 class="product-name mt-3">{{ $product->name }}</h3> <!-- Modifikasi -->
                  <div class="rating">
                      <i class="bx bxs-star"></i>
                      <i class="bx bxs-star"></i>
                      <i class="bx bxs-star"></i>
                      <i class="bx bxs-star"></i>
                      <i class="bx bxs-star"></i>
                  </div>
                  <div class="detail d-flex justify-content-between align-items-center mt-4">
                      <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p> <!-- Modifikasi -->
                  </div>
              </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Subscribe  -->
  <section class="subscribe">
    <div class="container">
      <div class="subscribe-wrapper">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6 col-md-7 col-10 col-sub">
            <h1>Subscribe to get latest updates!</h1>
            <form action="#" class="mt-5" id="subscribe-form">
              <div class="input-group w-100">
                <input type="email" class="form-control" id="email-input" placeholder="Type your email ..">
                <button class="btn btn-outline-warning" id="subscribe-button" disabled>Subscribe</button>
              </div>
            </form>
            <p id="thank-you-message" style="display:none; color: green; margin-top: 20px;"></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const emailInput = document.getElementById('email-input');
      const subscribeButton = document.getElementById('subscribe-button');
      const thankYouMessage = document.getElementById('thank-you-message');
      const form = document.getElementById('subscribe-form');
  
      emailInput.addEventListener('input', function() {
        if (emailInput.value.trim() !== "") {
          subscribeButton.disabled = false;
        } else {
          subscribeButton.disabled = true;
        }
      });
  
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        const emailValue = emailInput.value.trim();
        thankYouMessage.textContent = `Thank you for subscribing, ${emailValue}!`;
        thankYouMessage.style.display = 'block';
        emailInput.value = '';
        subscribeButton.disabled = true;
      });
    });
  </script>  
@endsection
