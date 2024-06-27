{{-- TEMPLATE PRODUCT BOX --}}

<div class="col-lg-3 col-6">
    <div class="card card-product card-body p-lg-4 p3">
      <a href="{{ shop_product_link($product) }}"><img src={{ asset('themes/alleywayMuse/assets/img/' . $product->featured_image) }} alt="" class="img-fluid"></a>
      <h3 class="product-name mt-3">{{ $product->name }}</h3>
      <div class="detail d-flex justify-content-between align-items-center">
        <p class="price">Rp {{ $product->price_label }}</p>
      </div>
    </div>
  </div>