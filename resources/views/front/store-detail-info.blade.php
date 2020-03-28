@include('front.layouts.app')
@section('page_content')
    <header class="header header--standard header--autopart" data-sticky="true">
      <div class="header__top">
        <div class="container">
          <div class="header__left">
            <p><strong>FREE SHIPPING</strong> for all orders over $100</p>
          </div>
          <div class="header__right">
            <ul class="header__top-links">
              <li><a href="#">Store Location</a></li>
              <li><a href="#">Track Your Order</a></li>
              <li>
                <div class="ps-dropdown"><a href="#">US Dollar</a>
                  <ul class="ps-dropdown-menu">
                    <li><a href="#">Us Dollar</a></li>
                    <li><a href="#">Euro</a></li>
                  </ul>
                </div>
              </li>
              <li>
                <div class="ps-block--user-header">
                  <div class="ps-block__left"><i class="icon-user"></i></div>
                  <div class="ps-block__right"><a href="my-account.html">Login</a><a href="my-account.html">Register</a></div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="header__content">
        <div class="container">
          <div class="header__content-left"><a class="ps-logo" href="index.html"><img{{asset('assets/front/ src="img/logo-autopart.png')}}" alt=""></a>
            <div class="menu--product-categories">
              <div class="menu__toggle"><i class="icon-menu"></i><span>Shop by Department</span></div>
              <div class="menu__content">
                <ul class="menu--dropdown">
                  <li class="current-menu-item "><a href="#">Interior</a>
                  </li>
                  <li class="current-menu-item "><a href="#">Wheels &amp; Tires</a>
                  </li>
                  <li class="current-menu-item "><a href="#">Exterior</a>
                  </li>
                  <li class="current-menu-item "><a href="#">Performance</a>
                  </li>
                  <li class="current-menu-item "><a href="#">Body parts</a>
                  </li>
                  <li class="current-menu-item "><a href="#">Lighting</a>
                  </li>
                  <li class="current-menu-item "><a href="#">Accessories</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="header__content-center">
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
          <div class="header__content-right">
            <div class="header__actions">
              <div class="ps-block--header-hotline">
                <div class="ps-block__left"><i class="icon-telephone"></i></div>
                <div class="ps-block__right">
                  <p>Hotline<strong>1-800-234-5678</strong></p>
                </div>
              </div>
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
            </div>
          </div>
        </div>
      </div>
      <nav class="navigation">
        <div class="container">
          <ul class="menu menu--technology">
            <li class="current-menu-item "><a href="homepage-2.html">Interior</a>
            </li>
            <li class="current-menu-item "><a href="homepage-2.html">Exterior</a>
            </li>
            <li class="current-menu-item "><a href="homepage-2.html">Body parts</a>
            </li>
            <li class="current-menu-item "><a href="homepage-2.html">Wheels &amp; Tires</a>
            </li>
            <li class="current-menu-item "><a href="homepage-2.html">Lighting</a>
            </li>
            <li class="current-menu-item "><a href="homepage-2.html">Performance</a>
            </li>
            <li class="current-menu-item "><a href="homepage-2.html">Repare part</a>
            </li>
            <li class="current-menu-item "><a href="homepage-2.html">Tools &amp; Garage</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <header class="header header--mobile autopart" data-sticky="true">
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
              <div class="ps-dropdown language"><a href="#"><img src="img/flag/en.png" alt="">English</a>
                <ul class="ps-dropdown-menu">
                  <li><a href="#"><img src="img/flag/germany.png" alt=""> Germany</a></li>
                  <li><a href="#"><img src="img/flag/fr.png" alt=""> France</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="navigation--mobile">
        <div class="navigation__left"><a class="ps-logo" href="index.html"><img src="img/logo-autopart.png" alt=""></a></div>
        <div class="navigation__right">
          <div class="header__actions">
            <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>0</i></span></a>
              <div class="ps-cart__content">
                <div class="ps-cart__items">
                  <div class="ps-product--cart-mobile">
                    <div class="ps-product__thumbnail"><a href="#"><img src="img/products/clothing/7.jpg" alt=""></a></div>
                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                      <p><strong>Sold by:</strong>  YOUNG SHOP</p><small>1 x $59.99</small>
                    </div>
                  </div>
                  <div class="ps-product--cart-mobile">
                    <div class="ps-product__thumbnail"><a href="#"><img src="img/products/clothing/5.jpg" alt=""></a></div>
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

    <div class="ps-page--single ps-page--vendor">
      <section class="ps-store-list">
        <div class="container">
          <aside class="ps-block--store-banner">
            <div class="ps-block__content bg--cover" data-background="img/vendor/store/default_banner.jpg">
              <h3>Go Pro</h3><a class="ps-block__inquiry" href="#"><i class="fa fa-question"></i> Inquiry</a>
            </div>
            <div class="ps-block__user">
              <div class="ps-block__user-avatar"><img src="img/vendor/store/user/5.jpg" alt="">
                <select class="ps-rating" data-read-only="true">
                  <option value="1">1</option>
                  <option value="1">2</option>
                  <option value="1">3</option>
                  <option value="1">4</option>
                  <option value="2">5</option>
                </select>
              </div>
              <div class="ps-block__user-content">
                <p><i class="icon-map-marker"></i> 326 Orchard Str, Riau, Riau Indonesia</p>
                <p><i class="icon-envelope"></i>  gopro@gmail.com</p>
              </div>
            </div>
          </aside>
          <div class="ps-section__wrapper">
            <div class="ps-section__left">
              <aside class="widget widget--vendor">
                <h3 class="widget-title">Product Search</h3>
                <div class="form-group--icon">
                  <input class="form-control" type="text" placeholder="Search..."><i class="icon-magnifier"></i>
                </div>
              </aside>
              <aside class="widget widget--vendor">
                <h3 class="widget-title">Store Categories</h3>
                <ul class="ps-list--arrow">
                  <li><a href="#">Interior</a></li>
                  <li><a href="#">Lighting</a></li>
                  <li class="menu-item-has-children"><a href="#">Exterior</a>
                    <ul class="sub-menu ps-list--arrow">
                      <li><a href="#"> Custom Grilles</a></li>
                    </ul>
                  </li>
                  <li class="menu-item-has-children"><a href="#">Wheels & Tires</a>
                    <ul class="sub-menu ps-list--categories">
                      <li><a href="#"> Custom Grilles</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Factory Wheels</a></li>
                </ul>
              </aside>
              <aside class="widget widget--vendor widget--open-time">
                <h3 class="widget-title"><i class="icon-clock3"></i> Store Hours</h3>
                <ul>
                  <li><strong>Monday:</strong><span>8:00 am - 6:00 pm</span></li>
                  <li><strong>Monday:</strong><span>8:00 am - 6:00 pm</span></li>
                  <li><strong>Monday:</strong><span>8:00 am - 6:00 pm</span></li>
                  <li><strong>Monday:</strong><span>8:00 am - 6:00 pm</span></li>
                  <li><strong>Monday:</strong><span>8:00 am - 6:00 pm</span></li>
                </ul>
              </aside>
            </div>
            <div class="ps-section__right">
              <nav class="ps-store-link">
                <ul>
                  <li><a href="store-detail.html">Products</a></li>
                  <li class="active"><a href="store-detail-info.html">About</a></li>
                  <li><a href="store-detail.html">Policies</a></li>
                  <li><a href="store-detail.html">Reviews(0)</a></li>
                </ul>
              </nav>
              <div class="ps-document">
                <p>We connect millions of buyers and sellers around the world, empowering people & creating economic opportunity for all. Within our markets, millions of people around the world connect, both online and offline, to make, sell and buy unique goods. We also offer a wide range of Seller Services and tools that help creative entrepreneurs start, manage and scale their businesses. Our mission is to reimagine commerce in ways that build a more fulfilling and lasting world, and we’re committed to using the power of business to strengthen communities and empower people.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection    
    <!-- custom scripts-->
@section('pagelevel_scripts')    
 
@endsection     