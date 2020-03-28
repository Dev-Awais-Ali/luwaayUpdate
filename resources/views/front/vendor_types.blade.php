@extends('front.layouts.app')

@section('page_content')

<div class="container-fluid vendor-type">
	<div class="container">
    	<h3 style="text-align: center;margin-bottom: 20px">Vendor Types</h3>	
     	<div class="row ">
	          <div class="col-sm-6 col-md-4 vendor-type-padding">
	              <div class="card">
	                  <div class="card-img-top card-img-top-200 img-hover-zoom">
	                      <img class="img-fluid" src="{{asset('assets/front/images/botique.jpg')}}" alt="Carousel 1">
	                      <div class="centered">Food & Recipe</div>
	                  </div>
	              </div>
	              <h4 class="link-vendor"><a href="{{route('vendor.login.botique')}}">Login! Your Botique Store</a></h4>	              
	              <h4 class="link-vendor"><a href="{{route('vendor.reg.botique')}}">Register Your Botique Store</a></h4>
	          </div>
	          <div class="col-sm-6 col-md-4 vendor-type-padding">
	              <div class="card">
	                  <div class="card-img-top card-img-top-200 img-hover-zoom">
	                      <img class="img-fluid" src="{{asset('assets/front/images/Supermarkt.jpg')}}" alt="Carousel 1">
	                      <div class="centered">Pro Services</div>
	                  </div>
	              </div>
	              <h4 class="link-vendor"><a href="{{route('vendor.login.food')}}">Login ! Your Food Store</a></h4>	              
	              <h4 class="link-vendor"><a href="{{route('vendor.reg.food')}}">Register Your Food Store</a></h4>
	          </div> 
	          <div class="col-sm-6 col-md-4 vendor-type-padding">
	              <div class="card">
	                  <div class="card-img-top card-img-top-200 img-hover-zoom">
	                      <img class="img-fluid" src="{{asset('assets/front/images/logo-design-500x500.jpg')}}" alt="Carousel 1">
	                      <div class="centered">Grocery</div>
	                  </div>
	              </div>
	              <h4 class="link-vendor"><a href="{{route('vendor.reg.botique')}}">Register Your Botique Store</a></h4>	              
	              <h4 class="link-vendor"><a href="{{route('vendor.reg.service-provider')}}">Register As a Service Provider</a></h4>
	          </div>                           
	    </div>	
	</div>
</div>


@endsection