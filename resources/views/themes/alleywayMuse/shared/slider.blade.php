{{-- TEMPLATE SLIDER HOME PAGE --}}

<div class="container menu-wrapper fixed-top d-none d-lg-block">
  <div class="menu d-flex justify-content-center align-items-center">
      <li><a class="nav-link active" href="#" id="scrollToTop">Home</a></li>
      <li><a class="nav-link" href="{{ url('products') }}">Products</a></li>
  </div>
</div>

<!-- Header -->
<section class="header">
  <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          </div>
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="{{ asset('themes/alleywayMuse/assets/img/slidecoffee0.jpg') }}" class="d-block w-100" alt="slide 1">
              </div>
              <div class="carousel-item">
                  <img src="{{ asset('themes/alleywayMuse/assets/img/slidecoffee1.jpg') }}" class="d-block w-100" alt="slide 2">
              </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
      </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#scrollToTop').on('click', function(event) {
      event.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, 'smooth');
  });
</script>