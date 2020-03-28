@extends('front.layouts.app')

@section('pagelevel_css')
    <link rel="stylesheet" href="{{asset('assets/front/css/market-place-1.css')}}">
@endsection

@section('page_content')

<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </div>
    <div class="ps-my-account">
        <div class="container">
            <form style="max-width: 430px !important" class="ps-form--account ps-tab-root" action="{{route('user.login.submit')}}" method="post">
                @csrf
                <ul class="ps-tab-list">
                    <li class="active"><a href="#sign-in">Login</a></li>
                </ul>
                @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                @endif                    
                <div class="ps-tabs">
                    <div class="ps-tab active" id="sign-in">
                        <div class="ps-form__content" style="padding-bottom: 30px">
                            <h5>Log In Your Account</h5>
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" placeholder="Username or email address">
                            </div>
                            <div class="form-group form-forgot">
                                <input class="form-control" type="password" name="password" placeholder="Password"><a href="">Forgot?</a>
                            </div>
                            <div class="form-group">
                                <div class="ps-checkbox">
                                    <input class="form-control" type="checkbox" id="remember-me" name="remember-me">
                                    <label for="remember-me">Rememeber me</label>
                                </div>
                            </div>
                            <div class="form-group submtit">
                                <button class="ps-btn ps-btn--fullwidth">Login</button>
                            </div>
                            <p><span><strong>Don't Have an account! </strong><a href="{{route('user-register')}}"> Sign Up Now</a></span></p>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection  

    <!-- custom scripts-->
@section('pagelevel_scripts')    
   
@endsection    
