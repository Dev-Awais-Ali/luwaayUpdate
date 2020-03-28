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

          <form class="ps-form--account ps-tab-root" action="{{route('vendor.reg.botique.submit')}}" method="post" enctype="multipart/form-data">
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
                      <div class="col-md-6">
                        <div class="form-group">
                             <input class="form-control" name="fname" type="text" value="{{old('fname')}}" placeholder="First name">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <input class="form-control" name="lname" type="text" placeholder="Last name" value="{{old('lname')}}">
                          </div>                        
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <input class="form-control" name="phone" type="Phone" placeholder="Phone No" value="{{old('phone')}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <input class="form-control" name="email" type="Email" placeholder="Email address" value="{{old('email')}}">
                          </div>                        
                      </div>
                  </div>  
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <input class="form-control" name="shop_name" type="text" placeholder="Shop Name" value="{{old('shop_name')}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group" >
                            <input class="form-control" name="owner_name" type="text" placeholder="Onwer Name" value="{{old('owner_name')}}">
                          </div>                        
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <input class="form-control" name="shop_number" type="text" placeholder="Shop Number" value="{{old('shop_number')}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group" >
                            <input class="form-control" name="shop_address" type="text" placeholder="Shop Address" value="{{old('shop_address')}}">
                          </div>                        
                      </div>
                  </div>                                                    
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <input class="form-control" name="shop_img" type="file">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group" >
                            <input class="form-control" name="reg_no" value="{{old('reg_no')}}" type="text" placeholder="Registration no">
                          </div>                        
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <select class="form-control" id="country" name="country_id" type="text" >
                               <option selected="" disabled="">Select Country</option>
                               @foreach($countries as $country)   
                               <option value="{{$country->id}}">{{$country->name}}</option>
                               @endforeach
                             </select>  
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                             <select class="form-control" id="state" name="state_id" type="text" >
                             </select>
                          </div>                        
                      </div>
                  </div> 
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <select class="form-control" id="city" name="city_id" type="text" >
                             </select>  
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <input class="form-control" name="zip_code" type="text" placeholder="Zip code" value="{{old('zip_code')}}">
                          </div>                        
                      </div>
                  </div>                     
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <input class="form-control" name="password" type="password" placeholder="Password">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group" >
                            <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Pasword">
                          </div>                        
                      </div>
                  </div>    

                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                           <textarea class="form-control" name="desc" rows="4" cols="50" placeholder="Shop Description here..."></textarea>
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

<script >
    $('#country').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('get-state-list')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $("#state").empty();
                 $("#state").html(res);
                $("#state").append('<option selected disabled>Select State</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });
    $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
              console.log(res);
                $("#city").empty();
                $("#city").append('<option selected disabled>Select City</option>');
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
</script>

   
@endsection    
