<nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">Trinity House</a>
      <div class="search-bar">
        <form action="{{ url('searchunit') }}" method="POST">
          @csrf
          <div class="input-group">
              <input type="search" class="form-control" id="search_unit" name="unit_name" required placeholder="Cari Rumah" aria-describedby="basic-addon1">
              <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
          </div> 
        </form>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active':'' }}" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ Request::is('listrumah') ? 'active':'' }}" href="{{ url('listrumah') }}">Daftar Perumahan</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ Request::is('cart') ? 'active':'' }}" href="{{ url('cart') }}">Cart
              <span class="badge badge pill bg-primary cartcount">0</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ Request::is('wishlist') ? 'active':'' }}" href="{{ url('wishlist') }}">Wishlist
              <span class="badge badge pill bg-success wishlistcount">0</span>
            </a>
          </li>
          @guest
          <li class="nav-item ">
            <a class="nav-link {{ Request::is('login') ? 'active':'' }}" href="{{ url('login') }}">Login</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ Request::is('register') ? 'active':'' }}" href="{{ url('register') }}">Register</a>
          </li>
          @else
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               {{ Auth::user()->name}}
              </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item" href="{{ url('my-order') }}">
                    My Orders
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                      My Profile
                </a>
            </li>
            <li>
               <a class="dropdown-item" href="{{ route('logout') }}" onclick ="event.preventDefault(); document.getElementById('logout-form').submit();" >
                    {{ __('Logout') }}
               </a>
               <form id="logout-form" action=" {{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form>
            </li>

            </ul>
          </li>   
              
          @endguest
        </ul>
      </div>
    </div>
  </nav>