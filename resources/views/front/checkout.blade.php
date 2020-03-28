@extends('front.layouts.app')
@section('page_content')
  <div class="ps-page--simple">
    <div class="ps-breadcrumb">
      <div class="container">
        <ul class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li><a href="shop-default.html">Shop</a></li>
          <li>Checkout</li>
        </ul>
      </div>
    </div>
    <div class="ps-checkout ps-section--shopping">
      <div class="container">
        <div class="ps-section__header">
          <h1>Compare Product</h1>
        </div>
        <div class="ps-section__content">
          <form class="ps-form--checkout" action="do_action" method="post">
            <div class="row">
                          <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  ">
                            <div class="ps-form__billing-info">
                              <h3 class="ps-form__heading">Billing Details</h3>
                                    <div class="form-group">
                                      <label>First Name<sup>*</sup>
                                      </label>
                                      <div class="form-group__content">
                                        <input class="form-control" type="text">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label>Last Name<sup>*</sup>
                                      </label>
                                      <div class="form-group__content">
                                        <input class="form-control" type="text">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label>Company Name<sup>*</sup>
                                      </label>
                                      <div class="form-group__content">
                                        <input class="form-control" type="text">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label>Email Address<sup>*</sup>
                                      </label>
                                      <div class="form-group__content">
                                        <input class="form-control" type="email">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label>Country<sup>*</sup>
                                      </label>
                                      <div class="form-group__content">
                                        <input class="form-control" type="text">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label>Phone<sup>*</sup>
                                      </label>
                                      <div class="form-group__content">
                                        <input class="form-control" type="text">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label>Address<sup>*</sup>
                                      </label>
                                      <div class="form-group__content">
                                        <input class="form-control" type="text">
                                      </div>
                                    </div>
                              <div class="form-group">
                                <div class="ps-checkbox">
                                  <input class="form-control" type="checkbox" id="create-account">
                                  <label for="create-account">Create an account?</label>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="ps-checkbox">
                                  <input class="form-control" type="checkbox" id="cb01">
                                  <label for="cb01">Ship to a different address?</label>
                                </div>
                              </div>
                              <h3 class="mt-40"> Addition information</h3>
                              <div class="form-group">
                                <label>Order Notes</label>
                                <div class="form-group__content">
                                  <textarea class="form-control" rows="7" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12  ">
                            <div class="ps-form__total">
                              <h3 class="ps-form__heading">Your Order</h3>
                              <div class="content">
                                <div class="ps-block--checkout-total">
                                  <div class="ps-block__header">
                                    <p>Product</p>
                                    <p>Total</p>
                                  </div>
                                  <div class="ps-block__content">
                                    <table class="table ps-block__products">
                                      <tbody>
                                        <tr>
                                          <td><a href="#"> MVMTH Classical Leather Watch In Black ×1</a>
                                            <p>Sold By:<strong>YOUNG SHOP</strong></p>
                                          </td>
                                          <td>$57.99</td>
                                        </tr>
                                        <tr>
                                          <td><a href="#"> Apple Macbook Retina Display 12” 	× 1</a>
                                            <p>Sold By:<strong>ROBERT’S STORE</strong></p>
                                          </td>
                                          <td>$625.50</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <h4 class="ps-block__title">Subtotal <span>$863.49</span></h4>
                                    <div class="ps-block__shippings">
                                      <figure>
                                        <h4>YOUNG SHOP Shipping</h4>
                                        <p>Free shipping</p><a href="#"> MVMTH Classical Leather Watch In Black ×1</a>
                                      </figure>
                                      <figure>
                                        <h4>ROBERT’S STORE Shipping</h4>
                                        <p>Free shipping</p><a href="#">Apple Macbook Retina Display 12” ×1</a>
                                      </figure>
                                    </div>
                                    <h3>Total <span>$683.49</span></h3>
                                  </div>
                                </div><a class="ps-btn ps-btn--fullwidth" href="checkout.html">Proceed to checkout</a>
                              </div>
                            </div>
                          </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @if(isset($checked))

<!-- LOGIN MODAL -->
<div class="modal fade" id="comment-log-reg1" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="comment-log-reg-Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" aria-label="Close">
          <a href="{{ url()->previous() }}"><span aria-hidden="true">&times;</span></a>
        </button>
      </div>
      <div class="modal-body">
        <nav class="comment-log-reg-tabmenu">
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link login active" id="nav-log-tab" data-toggle="tab" href="#nav-log" role="tab" aria-controls="nav-log" aria-selected="true">
              {{ $langg->lang197 }}
            </a>
            <a class="nav-item nav-link" id="nav-reg-tab" data-toggle="tab" href="#nav-reg" role="tab" aria-controls="nav-reg" aria-selected="false">
              {{ $langg->lang198 }}
            </a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-log" role="tabpanel" aria-labelledby="nav-log-tab">
                <div class="login-area">
                  <div class="header-area">
                    <h4 class="title">{{ $langg->lang172 }}</h4>
                  </div>
                  <div class="login-form signin-form">
                        @include('includes.admin.form-login')
                    <form id="loginform" action="{{ route('user.login.submit') }}" method="POST">
                      {{ csrf_field() }}
                      <div class="form-input">
                        <input type="email" name="email" placeholder="{{ $langg->lang173 }}" required="">
                        <i class="icofont-user-alt-5"></i>
                      </div>
                      <div class="form-input">
                        <input type="password" class="Password" name="password" placeholder="{{ $langg->lang174 }}" required="">
                        <i class="icofont-ui-password"></i>
                      </div>
                      <div class="form-forgot-pass">
                        <div class="left">
                      <input type="hidden" name="modal" value="1">
                          <input type="checkbox" name="remember"  id="mrp" {{ old('remember') ? 'checked' : '' }}>
                          <label for="mrp">{{ $langg->lang175 }}</label>
                        </div>
                        <div class="right">
                          <a href="{{ route('user-forgot') }}">
                            {{ $langg->lang176 }}
                          </a>
                        </div>
                      </div>
                      <input id="authdata" type="hidden"  value="{{ $langg->lang177 }}">
                      <button type="submit" class="submit-btn">{{ $langg->lang178 }}</button>
                        @if(App\Models\Socialsetting::find(1)->f_check == 1 || App\Models\Socialsetting::find(1)->g_check == 1)
                        <div class="social-area">
                            <h3 class="title">{{ $langg->lang179 }}</h3>
                            <p class="text">{{ $langg->lang180 }}</p>
                            <ul class="social-links">
                              @if(App\Models\Socialsetting::find(1)->f_check == 1)
                              <li>
                                <a href="{{ route('social-provider','facebook') }}"> 
                                  <i class="fab fa-facebook-f"></i>
                                </a>
                              </li>
                              @endif
                              @if(App\Models\Socialsetting::find(1)->g_check == 1)
                              <li>
                                <a href="{{ route('social-provider','google') }}">
                                  <i class="fab fa-google-plus-g"></i>
                                </a>
                              </li>
                              @endif
                            </ul>
                        </div>
                        @endif
                    </form>
                  </div>
                </div>
          </div>
          <div class="tab-pane fade" id="nav-reg" role="tabpanel" aria-labelledby="nav-reg-tab">
                <div class="login-area signup-area">
                    <div class="header-area">
                        <h4 class="title">{{ $langg->lang181 }}</h4>
                    </div>
                    <div class="login-form signup-form">
                       @include('includes.admin.form-login')
                        <form id="registerform" action="{{route('user-register-submit')}}" method="POST">
                          {{ csrf_field() }}

                            <div class="form-input">
                                <input type="text" class="User Name" name="name" placeholder="{{ $langg->lang182 }}" required="">
                                <i class="icofont-user-alt-5"></i>
                            </div>

                            <div class="form-input">
                                <input type="email" class="User Name" name="email" placeholder="{{ $langg->lang183 }}" required="">
                                <i class="icofont-email"></i>
                            </div>

                            <div class="form-input">
                                <input type="text" class="User Name" name="phone" placeholder="{{ $langg->lang184 }}" required="">
                                <i class="icofont-phone"></i>
                            </div>

                            <div class="form-input">
                                <input type="text" class="User Name" name="address" placeholder="{{ $langg->lang185 }}" required="">
                                <i class="icofont-location-pin"></i>
                            </div>

                            <div class="form-input">
                                <input type="password" class="Password" name="password" placeholder="{{ $langg->lang186 }}" required="">
                                <i class="icofont-ui-password"></i>
                            </div>

                            <div class="form-input">
                                <input type="password" class="Password" name="password_confirmation" placeholder="{{ $langg->lang187 }}" required="">
                                <i class="icofont-ui-password"></i>
                            </div>

@if($gs->is_capcha == 1)

                                    <ul class="captcha-area">
                                        <li>
                                            <p><img class="codeimg1" src="{{asset("assets/images/capcha_code.png")}}" alt=""> <i class="fas fa-sync-alt pointer refresh_code "></i></p>
                                        </li>
                                    </ul>

                            <div class="form-input">
                                <input type="text" class="Password" name="codes" placeholder="{{ $langg->lang51 }}" required="">
                                <i class="icofont-refresh"></i>
                            </div>

@endif

                            <input id="processdata" type="hidden"  value="{{ $langg->lang188 }}">
                            <button type="submit" class="submit-btn">{{ $langg->lang189 }}</button>
                        
                        </form>
                    </div>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- LOGIN MODAL ENDS -->
@endif
@endsection
@section('pagelevel_scripts')    
    <script>
      var coup = 0;
var pos = {{ $gs->currency_format }};

@if(isset($checked))

  $('#comment-log-reg1').modal('show');

@endif
    </script>
@endsection