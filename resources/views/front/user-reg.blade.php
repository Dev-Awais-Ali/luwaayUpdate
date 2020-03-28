@extends('front.layouts.app')

@section('pagelevel_css')
    <link rel="stylesheet" href="{{asset('assets/front/css/market-place-1.css')}}">
    <style type="text/css">
      .ps-form--account .ps-form__content{
        padding-bottom: 30px;
      }
     label{
           display: block;
     }
    </style>
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

          <form class="ps-form--account ps-tab-root" action="{{route('user-register-submit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <ul class="ps-tab-list">
              <li class="active"><a href="#register">Register</a></li>
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
              <div class="ps-tab active" id="register">
                <div class="ps-form__content">
                  <h5>Register An Account</h5>
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                             <input class="form-control" name="name" type="text" value="{{old('fname')}}" placeholder="First name">
                        </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                            <input class="form-control" name="email" type="Email" placeholder="Email address" value="{{old('email')}}">
                          </div>                        
                      </div>                      
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                             <input class="form-control" name="phone" type="Phone" placeholder="Phone No" value="{{old('phone')}}">
                        </div>
                      </div>

                      <div class="col-md-12">
                          <div class="form-group">
                            <input class="form-control" name="address" type="text" placeholder="Address" value="{{old('address')}}">
                          </div>                        
                      </div>                      
                  </div>  
                    
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                             <input class="form-control" name="password" type="password" placeholder="Password">
                        </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group" >
                            <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Pasword">
                          </div>                        
                      </div>
                  </div>    
                  <div class="form-group submtit">
                    <button class="ps-btn ps-btn--fullwidth">Register</button>
                  </div>
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
