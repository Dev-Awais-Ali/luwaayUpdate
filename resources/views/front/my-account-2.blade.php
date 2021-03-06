@extends('front.layouts.app')

@section('pagelevel_css')
    <link rel="stylesheet" href="css/market-place-1.css">
@endsection

@section('page_content')
    <div class="ps-block--promotion-header bg--cover" data-background="{{asset('assets/front/img/promotions/header-promotion.jpg')}}">
      <div class="container">
        <div class="ps-block__left">
          <h3>20%</h3>
          <figure>
            <p>Discount</p>
            <h4>For Books Of March</h4>
          </figure>
        </div>
        <div class="ps-block__center">
          <p>Enter Promotion<span>Sale2019</span></p>
        </div><a class="ps-btn ps-btn--sm" href="#">Shop now</a>
      </div>
    </div>

    <div class="ps-page--my-account">
      <div class="ps-breadcrumb">
        <div class="container">
          <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li>My account</li>
          </ul>
        </div>
      </div>
      <div class="ps-my-account-2">
        <div class="container">
          <div class="ps-section__wrapper">
            <div class="ps-section__left">
              <form class="ps-form--account ps-tab-root" action="link.html" method="get">
                <ul class="ps-tab-list">
                  <li class="active"><a href="#sign-in">Login</a></li>
                  <li><a href="#register">Register</a></li>
                </ul>
                <div class="ps-tabs">
                  <div class="ps-tab active" id="sign-in">
                    <div class="ps-form__content">
                      <h5>Log In Your Account</h5>
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Username or email address">
                      </div>
                      <div class="form-group form-forgot">
                        <input class="form-control" type="text" placeholder="Password"><a href="">Forgot?</a>
                      </div>
                      <div class="form-group">
                                    <div class="ps-checkbox">
                                      <input class="form-control" type="checkbox" id="remember-me" name="remember-me">
                                      <label for="remember-me">Rememeber me</label>
                                    </div>
                      </div>
                      <div class="form-group submit">
                        <button class="ps-btn ps-btn--fullwidth">Login</button>
                      </div>
                    </div>
                  </div>
                  <div class="ps-tab" id="register">
                    <div class="ps-form__content">
                      <h5>Register An Account</h5>
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Username or email address">
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Password">
                      </div>
                      <div class="ps-form__decs">
                                    <div class="ps-radio">
                                      <input class="form-control" type="radio" id="user-type-1" name="user-type">
                                      <label for="user-type-1">I am a customer</label>
                                    </div>
                                    <div class="ps-radio">
                                      <input class="form-control" type="radio" id="user-type-2" name="user-type">
                                      <label for="user-type-2">I am a vendor</label>
                                    </div>
                        <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our<a href="#">privacy policy.</a></p>
                      </div>
                      <div class="form-group submit">
                        <button class="ps-btn ps-btn--fullwidth">Register</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="ps-section__right">
              <figure class="ps-section__desc">
                <figcaption>Sign up today and you will be able to:</figcaption>
                <p>MartFury Buyer Protection has you covered from click to delivery. Sign up or sign in and you will be able to:</p>
                <ul class="ps-list">
                  <li><i class="icon-credit-card"></i><span>SPEED YOUR WAY THROUGH CHECKOUT</span></li>
                  <li><i class="icon-clipboard-check"></i><span>TRACK YOUR ORDERS EASILY</span></li>
                  <li><i class="icon-bag2"></i><span>KEEP A RECORD OF ALL YOUR PURCHASES</span></li>
                </ul>
              </figure>
              <div class="ps-section__coupon"><span>$25</span>
                <aside>
                  <h5>A small gift for your first purchase</h5>
                  <p>Martfury give $25 as a small gift for your first purchase. Welcome to Martfury!</p>
                </aside>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection  

    <!-- custom scripts-->
@section('pagelevel_scripts')    
  
@endsection    