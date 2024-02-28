<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="home">Smart Farm</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="home" class="nav-link {{ Request::is('home') ? 'active' : '' }}">Home</a></li>
          {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="shop.html">Shop</a>
              <a class="dropdown-item" href="wishlist.html">Wishlist</a>
            <a class="dropdown-item" href="product-single.html">Single Product</a>
            <a class="dropdown-item" href="cart.html">Cart</a>
            <a class="dropdown-item" href="checkout.html">Checkout</a>
          </div>
        </li> --}}
          <li class="nav-item"><a href="/about" class="nav-link {{ Request::is('about') ? 'active' : '' }}">About</a></li>
          <li class="nav-item"><a href="/contact" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
          <li class="nav-item"><a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }}">Login</a></li>
          {{-- <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li> --}}

        </ul>
      </div>
    </div>
  </nav>