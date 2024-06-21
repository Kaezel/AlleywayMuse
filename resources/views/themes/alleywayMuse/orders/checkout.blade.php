@extends('themes.alleywayMuse.layouts.app')

@section('content')
<section class="breadcrumb-section pb-4 pb-md-4 pt-4 pt-md-4">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('products') }} ">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
</section>
<section class="main-content">
    <div class="container">
        <div class="row">
            <section class="col-lg-12 col-md-12 shopping-cart">
                <div class="card mb-4 bg-light border-0 section-header">
                    <div class="card-body p-5">
                        <h2 class="mb-0">Checkout</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <form id="order-form" action="{{ route('orders.store') }}" method="POST">
                            <input type="hidden" name="courier_name" id="courier-name">
                            @csrf
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0"><i class='bx bx-map'></i> Delivery Address</h5>
                                <a href="#" class="btn btn-outline-secondary btn-sm">Add a new address</a>
                            </div>
                            <div class="mt-3">
                                <div class="row">
                                    @forelse ($addresses as $address)
                                    <div class="col-lg-6 col-12 mb-4">
                                        <div class="card card-body p-6">
                                            <div class="form-check mb-4">
                                                <input class="form-check-input delivery-address" value="{{ $address->id }}" type="radio" name="address_id" id="addressRadio{{ $address->id }}">
                                                <label class="form-check-label text-dark" for="addressRadio{{ $address->id }}">{{ $address->label }}</label>
                                            </div>
                                            <!-- address -->
                                            <address>
                                                <strong>{{ $address->first_name }} {{ $address->last_name }}</strong>
                                                <br>
                        
                                                {{ $address->address1 }}
                                                <br>
                        
                                                {{ $address->address2 }}
                                                <br>
                        
                                                <abbr title="Phone">P: {{ $address->phone }}</abbr>
                                            </address>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12">
                                        <p>No address found</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <h5 class="mb-0"><i class='bx bxs-truck'></i> Delivery Service</h5>
                            <div class="mt-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input courier-code" type="radio" name="courier" id="inlineRadio1" value="kurir_toko" data-courier-name="Kurir Toko (Free, UNTAR Area, Max 2KM)">
                                    <label class="form-check-label" for="inlineRadio1">Kurir Toko (Free, UNTAR Area, Max 2KM)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <a href="https://wa.me/+6289155528276" target="_blank"><i class="bx bxl-whatsapp"></i>Whatsapp (Confirm first for 2KM+)</a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('carts.index') }}" class="btn btn-second">Back to Shopping Cart</a>
                                <button type="submit" class="btn btn-first" disabled>Place Order</button>
                            </div>
                        </form>                                              
                    </div>
                    <div class="col-12 col-lg-5 col-md-6">
                        <div class="mb-5 card mt-6 shadow">
                            <div class="card-body p-6">
                                <!-- heading -->
                                <h2 class="h5 mb-4">Order Details</h2>
                                <ul class="list-group list-group-flush">
                                    @foreach ($cart->items as $item)
                                    @php
                                        $price = $item->product->has_sale_price ? $item->product->sale_price : $item->product->price;
                                        $subtotal = $price * $item->qty;
                                    @endphp
                                    <li class="list-group-item py-3 {{ ($loop->index == 0) ? 'border-top' : '' }}">
                                        <div class="row align-items-center">
                                            <div class="col-6 col-md-6 col-lg-7">
                                                <div class="d-flex">
                                                    <img src="{{ asset('themes/alleywayMuse/assets/img/p1.jpg') }}" alt="Ecommerce" style="height: 70px;">
                                                    <div class="ms-3">
                                                        <a href="{{ shop_product_link($item->product) }}">
                                                            <h6 class="mb-0">{{ $item->product->name }}</h6>
                                                        </a>
                                                        <span>
                                                            @if ($item->product->has_sale_price)
                                                            <small>IDR {{ $item->product->sale_price_label }}</small>
                                                            <small class="text-muted text-decoration-line-through">{{ $item->product->price_label }}</small>
                                                            @else
                                                            <small>IDR {{ $item->product->price_label }}</small>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 col-md-2 col-lg-2">
                                                {{ $item->qty }}
                                            </div>
                                            <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                                <span class="fw-bold">IDR {{ number_format($subtotal) }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                    <li class="list-group-item py-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>Item Subtotal</div>
                                            <div class="fw-bold">IDR {{ $cart->base_total_price_label }}</div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>Discount</div>
                                            <div class="fw-bold">IDR {{ $cart->discount_amount_label }}</div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>Tax (10%)</div>
                                            <div class="fw-bold">IDR {{ $cart->tax_amount_label }}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item py-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2 fw-bold">
                                            <div>Grand Total</div>
                                            <div id="grand-total">IDR {{ $cart->grand_total_label }}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addressRadios = document.querySelectorAll('.delivery-address');
        const deliveryServiceRadios = document.querySelectorAll('.courier-code');
        const placeOrderButton = document.querySelector('button[type="submit"].btn-first');
        const courierNameInput = document.getElementById('courier-name');

        function enablePlaceOrderButton() {
            const addressSelected = document.querySelector('.delivery-address:checked');
            const deliveryServiceSelected = document.querySelector('.courier-code:checked');
            if (addressSelected && deliveryServiceSelected) {
                placeOrderButton.disabled = false;
                courierNameInput.value = deliveryServiceSelected.getAttribute('data-courier-name');
            } else {
                placeOrderButton.disabled = true;
                courierNameInput.value = '';
            }
        }

        // Check initially if the button should be enabled
        enablePlaceOrderButton();

        // Enable the "Place Order" button only when both an address and delivery service are selected
        addressRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                enablePlaceOrderButton();
            });
        });

        deliveryServiceRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                enablePlaceOrderButton();
            });
        });
    });
</script>
@endsection