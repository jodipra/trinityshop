  {{-- Navbar yang dipake saat ini --}}
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center">

          <div class="logo me-auto">
              <h1><a href="{{ url('/') }}">Trinity House</a></h1>
              <!-- Uncomment below if you prefer to use an image logo -->
              <!-- <a href="index.html"><img src="landing_page/img/logo.png" alt="" class="img-fluid"></a>-->
          </div>

          <nav id="navbar" class="navbar order-last order-lg-0">
              <ul>
                  <div class="search-bar">
                      <form action="{{ url('searchunit') }}" method="POST">
                          @csrf
                          <div class="input-group">
                              <input type="search" class="form-control" id="search_unit" name="unit_name" required
                                  placeholder="Cari Rumah" aria-describedby="basic-addon1">
                              <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                          </div>
                      </form>
                  </div>
                  <li><a class="nav-link scrollto {{ Request::is('/') ? 'active' : '' }}"
                          href="{{ url('/') }}">Home</a></li>
                  <li><a class="nav-link scrollto {{ Request::is('listrumah') ? 'active' : '' }}"
                          href="{{ url('listrumah') }}">Daftar Perumahan</a></li>
                  <li><a class="nav-link scrollto {{ Request::is('cart') ? 'active' : '' }}"
                          href="{{ url('cart') }}">Cart</a></li>
                  <li><a class="nav-link scrollto {{ Request::is('wishlist') ? 'active' : '' }} "
                          href="{{ url('wishlist') }}">Wishlist</a></li>
                  @guest
                      @if (Route::has('login'))
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('login') ? 'active' : '' }} " href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                      @endif
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('register') ? 'active' : '' }} " href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i
                                  class="bi bi-chevron-down"></i></a>
                          <ul>
                              <li><a href="{{ url('my-order') }}">My Orders</a></li>
                              <li><a href="{{ route('logout') }}"
                                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </li>
                          </ul>
                      @endguest
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
      </div>
  </header><!-- End Header -->
