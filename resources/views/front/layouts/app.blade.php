<!DOCTYPE html>
<html lang="en">

  <head>
    @include('front.layouts.head')
  </head>

  <body>
     
    @include('front.layouts.header')

    
    @section('page_content')
    @show

    <!----------Footer Section --------------------------------------->
    @include('front.layouts.footer')

{{--     <div class="ps-popup" id="subscribe" data-time="500">
      <div class="ps-popup__content bg--cover" data-background="img/bg/subscribe.jpg"><a class="ps-popup__close" href="#"><i class="icon-cross"></i></a>
        <form class="ps-form--subscribe-popup" action="index.html" method="get">
          <div class="ps-form__content">
            <h4>Get <strong>25%</strong> Discount</h4>
            <p>Subscribe to the Martfury mailing list <br /> to receive updates on new arrivals, special offers <br /> and our promotions.</p>
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Email Address" required>
              <button class="ps-btn">Subscribe</button>
            </div>
                        <div class="ps-checkbox">
                          <input class="form-control" type="checkbox" id="not-show" name="not-show">
                          <label for="not-show">Don't show this popup again</label>
                        </div>
          </div>
        </form>
      </div>
    </div>
    <div id="back2top"><i class="pe-7s-angle-up"></i></div>
    <div class="ps-site-overlay"></div>
    <div id="loader-wrapper">
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
      <div class="ps-search__content">
        <form class="ps-form--primary-search" action="do_action" method="post">
          <input class="form-control" type="text" placeholder="Search for...">
          <button><i class="aroma-magnifying-glass"></i></button>
        </form>
      </div>
     </div>
    --}}




     
      <!----------------------------  Scripts ------------------------->
      @include('front.layouts.scripts')

  </body>
</html>