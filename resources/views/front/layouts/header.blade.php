<header class="header header--organic" data-sticky="true">
  <div class="header__top">
    <div class="container">
      <div class="header__left">
        <div class="menu--product-categories">
          <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
        </div><a class="ps-logo" href="{{url('/')}}"><img src="{{asset('assets/images/'.$gs->logo)}}" height="42px" alt=""></a>
      </div>
      <div class="header__center">
        <form class="ps-form--quick-search" action="index.html" method="get">
          <div class="form-group--icon"><i class="icon-chevron-down"></i>
            <select class="form-control">
              <option value="1">All</option>
              <option value="1">Bags</option>
              <option value="1">Shoes</option>
              <option value="1">Men</option>
              <option value="1">Women</option>
              <option value="1">Sunglasses</option>
            </select>
          </div>
          <input class="form-control" type="text" placeholder="I'm shopping for...">
          <button>Search</button>
        </form>
      </div>
      <div class="header__right">
        <div class="header__actions">
          <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span class="cart-quantity" id="cart-count">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span></a>
            <div class="ps-cart__content">
              @include('load.cart')
            </div>
          </div>
          <div class="ps-block--user-header">
            <div class="ps-block__left"><i class="icon-user"></i></div>
            @if(!Auth::guard('web')->check())
            <div class="ps-block__right"><a href="{{route('user.login')}}">Login</a><a href="{{route('user-register')}}">Register</a>
            </div>
            @else
              <div class="ps-block__right">
                <a href="{{ route('user-dashboard') }}"><i class="fas fa-angle-double-right"></i> {{ $langg->lang221 }}</a>
                  @if(Auth::user()->IsVendor())
                    <a href="{{ route('vendor-dashboard') }}"><i class="fas fa-angle-double-right"></i> {{ $langg->lang222 }}</a>
                  @endif
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navigation">
    <div class="container">

      <div class="navigation__right">
        <ul class="menu menu--organic">
        </ul>
        <div class="ps-block--header-hotline inline">
          <p><i class="icon-menu"></i><a href="#">Food</a>  &nbsp;</p>
          <p><i class="icon-star"></i><a href="{{route('vendor.store.list')}}">Stores List</a> &nbsp;</p>
          <p><i class="icon-bag2"></i> <strong><a href="{{route('vendor.types')}}">Sell On Martfury</a></strong> </p>
        </div>
      </div>
    </div>
  </nav>
</header>
<header class="header header--mobile" data-sticky="true">
  <div class="header__top">
    <div class="header__left">
      <p>Welcome to Martfury Online Shopping Store !</p>
    </div>
    <div class="header__right">
      <ul class="navigation__extra">
        <li><a href="#">Sell on Martfury</a></li>
        <li><a href="#">Tract your order</a></li>
        <li>
          <div class="ps-dropdown"><a href="#">US Dollar</a>
            <ul class="ps-dropdown-menu">
              <li><a href="#">Us Dollar</a></li>
              <li><a href="#">Euro</a></li>
            </ul>
          </div>
        </li>
        <li>
          <div class="ps-dropdown language"><a href="#"><img src="{{asset('assets/front/img/flag/en.png')}}" alt="">English</a>
            <ul class="ps-dropdown-menu">
              <li><a href="#"><img src="{{asset('assets/front/img/flag/germany.png')}}" alt=""> Germany</a></li>
              <li><a href="#"><img src="{{asset('assets/front/img/flag/fr.png')}}" alt=""> France</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="navigation--mobile">
    <div class="navigation__left"><a class="ps-logo" href="index.html"><img src="{{asset('assets/front/img/logo_light.png')}}" alt=""></a></div>
    <div class="navigation__right">
      <div class="header__actions">
        <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>0</i></span></a>
          <div class="ps-cart__content">
            <div class="ps-cart__items">
              <div class="ps-product--cart-mobile">
                <div class="ps-product__thumbnail"><a href="#"><img src="{{asset('assets/front/img/products/clothing/7.jpg')}}" alt=""></a></div>
                <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                  <p><strong>Sold by:</strong>  YOUNG SHOP</p><small>1 x $59.99</small>
                </div>
              </div>
              <div class="ps-product--cart-mobile">
                <div class="ps-product__thumbnail"><a href="#"><img src="{{asset('assets/front/img/products/clothing/5.jpg')}}" alt=""></a></div>
                <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                  <p><strong>Sold by:</strong>  YOUNG SHOP</p><small>1 x $59.99</small>
                </div>
              </div>
            </div>
            <div class="ps-cart__footer">
              <h3>Sub Total:<strong>$59.99</strong></h3>
              <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
            </div>
          </div>
        </div>
        <div class="ps-block--user-header">
          <div class="ps-block__left"><i class="icon-user"></i></div>
          <div class="ps-block__right"><a href="my-account.html">Login</a><a href="my-account.html">Register</a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="ps-search--mobile">
    <form class="ps-form--search-mobile" action="index.html" method="get">
      <div class="form-group--nest">
        <input class="form-control" type="text" placeholder="Search something...">
        <button><i class="icon-magnifier"></i></button>
      </div>
    </form>
  </div>
</header>