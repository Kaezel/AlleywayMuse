@extends('themes.alleywayMuse.layouts.app')

@section('content')
<section class="breadcrumb-section pb-4 pb-md-4 pt-4 pt-md-4">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('products') }} ">Products</a></li>
                <li class="breadcrumb-item"><a href="{{ url('orders/checkout') }} ">Checkout</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment</li>
            </ol>
        </nav>
    </div>
</section>
<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 shopping-cart">
                <div class="card mb-4 bg-light border-0 section-header">
                    <div class="card-body p-5">
                        <h2 class="mb-0">Order Summary</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h5 class="mb-0"><i class='bx bx-map'></i> Delivery Address</h5>
                        <address class="mt-3">
                            <strong>{{ $order->customer_first_name }} {{ $order->customer_last_name }}</strong><br>
                            {{ $order->customer_address1 }}<br>
                            {{ $order->customer_address2 }}<br>
                            <abbr title="Phone">P: {{ $order->customer_phone }}</abbr>
                        </address>
                        <h5>Delivery Service: <strong>{{ $order->courier_name }}</strong></h5>
                        <h5>Payment via QRIS</h5>
                        <h6>Please scan the QRIS below and confirm us via <a href="https://wa.me/+6289155528276" id="whatsapp-link" target="blank"><i class="bx bxl-whatsapp"></i>Whatsapp</a> with proof of this page and transfer screenshots, so we can make your order as soon as possible ^_^</h6><br>
                        <img src="{{ asset('themes/alleywayMuse/assets/img/qris.png') }}" alt="QRIS" style="height: 200px;">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h5 class="mb-0"><i class='bx bx-shopping-bag'></i> Order Details</h5>
                        <ul class="list-group mt-3">
                            @foreach ($order->items as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="my-0">{{ $item->name }}</h6>
                                    <small class="text-muted">Qty: {{ $item->qty }}</small>
                                </div>
                                <span class="text-muted">Rp {{ number_format($item->sub_total) }}</span>
                            </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Item Subtotal</span>
                                <strong>Rp {{ number_format($order->base_total_price) }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Discount</span>
                                <strong>Rp {{ number_format($order->discount_amount) }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tax ({{ $order->tax_percent }}%)</span>
                                <strong>Rp {{ number_format($order->tax_amount) }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Grand Total</span>
                                <strong>Rp {{ number_format($order->grand_total) }}</strong>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-end mt-4">
                            <form action="{{ url('orders/mark-as-paid', ['orderId' => $order->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-first" id="paid-button" disabled>Paid</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('whatsapp-link').addEventListener('click', function() {
        document.getElementById('paid-button').disabled = false;
    });
</script>
@endsection
