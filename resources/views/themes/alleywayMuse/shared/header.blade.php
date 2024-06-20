<nav class="navbar navbar-expand-lg bg-white fixed-top py-4 shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="{{ ('/') }}">Alleyway<span>Muse</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="input-group mx-auto mt-5 mt-lg-0">
            <input type="text" class="form-control" placeholder="Ngopi apa hari ini?" aria-label="Ngopi apa hari ini?" aria-describedby="button-addon2">
            <button class="btn btn-outline-warning" type="button" id="button-addon2"><i class="bx bx-search" ></i></button>
          </div>
          <ul class="navbar-nav ms-auto mt-3 mt-sm-0">
            <li class="nav-item me-5">
              <a class="nav-link" href="{{ Route('carts.index') }}">
                <i class="bx bx-cart-alt"></i>
                <span class="badge text-bg-warning rounded-circle position-absolute">3</span>
              </a>
            </li>
            <!-- mobile menu -->
            <div class="dropdown mt-3 d-lg-none">
              <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Menu
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ ('/') }}">Home</a></li>
                <li><a class="dropdown-item" href="{{ url('products') }}">Products</a></li>
              </ul>
            </div>
            @guest
              @if (Route::has('login'))
                <li class="nav-item mt-5 mt-lg-0 text-center">
                    <a class="nav-link btn-second me-lg-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
              @endif
          
              @if (Route::has('register'))
                <li class="nav-item mt-3 mt-lg-0 text-center">
                    <a class="nav-link btn-first" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
        
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
        
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
              </li>
            @endguest
            </li>
          </ul>
        </div>
      </div>
  </nav>