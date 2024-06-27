{{-- SEARCH PAGE --}}

@extends('themes.alleywayMuse.layouts.app')

@section('content')
<section class="breadcrumb-section pb-4 pb-md-4 pt-4 pt-md-4">
  <div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('products') }} ">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Search</li>
      </ol>
    </nav>
  </div>
</section>
<section class="main-content">
  <div class="container">
    <div class="row">
      <aside class="col-lg-3 col-md-4 mb-6 mb-md-0">
        @include('themes.alleywayMuse.products.sidebarSearch', ['categories' => $categories])
      </aside>
      <section class="col-lg-9 col-md-12 products">
        <div class="card mb-4 bg-light border-0 section-header">
          <div class="card-body p-5">
            <h2 class="mb-0">Search</h2>
            <p>Search for "{{ $query }}" found {{ $resultCount }}</p>
          </div>
        </div>
        <div class="row">
          @forelse ($products as $product)
            @include('themes.alleywayMuse.products.product_box', ['product'=> $product])
          @empty
            <p>No products found.</p>
          @endforelse
        </div>
        <div class="row mt-5">
          <div class="col-12">
            {!! $products->links() !!}
          </div>
        </div>
      </section>
    </div>
  </div>
</section>
@endsection
