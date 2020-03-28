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
          <form class="ps-form--account ps-tab-root" action="link.html" method="get">
            <ul class="ps-tab-list">
              <li class="active"><a href="#register">Register</a></li>
            </ul>
            <div class="ps-tabs">
              <div class="ps-tab active" id="register">
                <div class="ps-form__content">
                  <h5>Register An Account</h5>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group"> 
                             <input class="form-control" type="text" placeholder="First name">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Last name">
                          </div>                        
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <input class="form-control" type="Phone" placeholder="Phone No">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <input class="form-control" type="Email" placeholder="Email address">
                          </div>                        
                      </div>
                  </div>     
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <input class="form-control" type="Password" placeholder="Password">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <input class="form-control" type="Password" placeholder="Confirm Password">
                          </div>                        
                      </div>
                  </div>                                 
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <input class="form-control" type="file">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group" >
                            <input class="form-control" type="text" placeholder="Zip Code">
                          </div>                        
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <select class="form-control" type="text" >
                               <option selected="" disabled="">Select State</option>
                               <option>USA</option>
                             </select>  
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                             <select class="form-control" type="text" >
                               <option selected="" disabled="">Select City</option>
                               <option>USA</option>
                             </select>
                          </div>                        
                      </div>
                  </div> 
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <input class="form-control" type="text" placeholder="Open Hours">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group" >
                            <input class="form-control" type="text" placeholder="Chef/Restaurant Name">
                          </div>                        
                      </div>
                  </div>                  
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <input class="form-control" type="text" placeholder="Floor/Suite(Optional)">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group" >
                             <select class="form-control" type="text" >
                               <option selected="" disabled="">Select Cuisine Type</option>
                               <option>Togo</option>
                             </select>                            
                          </div>                        
                      </div>
                  </div>                  
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="display-block">Delivery Method</label>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="delivery_optional" value="1" checked>
                            <label class="form-check-label" for="delivery_optional">
                            Optional
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="delivery_only" value="0">
                            <label class="form-check-label" for="delivery_only">
                            Only
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group" >
                            <label class="display-block">Pickup Method</label>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="pickup_optional" value="1" checked>
                              <label class="form-check-label" for="pickup_optional">
                              Optional
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="pickup_only" value="0">
                              <label class="form-check-label" for="pickup_only">
                              Only
                              </label>
                            </div>                          
                          </div>                        
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                           <textarea class="form-control" rows="4" cols="50" placeholder="Shop Description here..."></textarea>
                        </div>
                      </div>
                  </div>

                  <div class="form-group submtit">
                    <button class="ps-btn ps-btn--fullwidth">Register</button>
                  </div>
                </div>
{{--                 <div class="ps-form__footer">
                  <p>Connect with:</p>
                  <ul class="ps-list--social">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                  </ul>
                </div> --}}
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
