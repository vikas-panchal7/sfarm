@php
$userLoggedIn = session()->has('user_id');
$farmer_id = session()->has('farmer_id');
@endphp


<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="home">Smart Farm</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="home" class="nav-link {{ Request::is('home') ? 'active' : '' }}">Home</a></li>
                <li class="nav-item"><a href="/about" class="nav-link {{ Request::is('about') ? 'active' : '' }}">About</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
                @if ($farmer_id)
                    <li class="nav-item"><a href="/bills" class="nav-link {{ Request::is('bill') ? 'active' : '' }}">Bill</a></li>
                @endif
                @if ($userLoggedIn)
                    <li class="nav-item"><a href="/shop" class="nav-link {{ Request::is('shop') ? 'active' : '' }}">Shop</a></li>
                    <li class="nav-item cta cta-colored"><a href="/cart" class="nav-link {{ Request::is('cart') ? 'active' : '' }}"><span class="icon-shopping_cart"></span><span id="total-products-in-cart">[0]</span></a></li>
                    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MyAccount</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="/showprofile">Profile</a>
              <a class="dropdown-item" href="/orders">Orders</a>
              <a class="dropdown-item" href="/password">Change Password</a>
            <a class="dropdown-item" href="/logout">Logout</a>
          </div>
        </li>
                @endif
                {{-- Only show login when the user is not logged in --}}
                @if (!$userLoggedIn)
                    <li class="nav-item"><a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
