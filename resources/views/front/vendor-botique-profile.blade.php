
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

          <form class="ps-form--account ps-tab-root" action="{{route('vendor-profile-update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <ul class="ps-tab-list">
              <li class="active"><a href="#register">Edit Your Profile</a></li>
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
              @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
              @endif
            <div class="ps-tabs">
              <div class="ps-tab active" id="register">
                <div class="ps-form__content">
                  <h5>Register An Account</h5>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <label style="font-weight: 500" >First name</label>
                             <input class="form-control" name="fname" type="text"  value="{{$data->fname}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                           <label style="font-weight: 500" >User Name</label>
                            <input class="form-control" name="lname" type="text" value="{{$data->lname}}" >
                          </div>                        
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <label style="font-weight: 500" >Phone No</label>
                             <input class="form-control"   name="phone" type="Phone" value="{{$data->phone_no}}" >
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label style="font-weight: 500" >Email Address</label>
                            <input class="form-control"  name="email" type="Email" value="{{$data->email}}" >
                          </div>                        
                      </div>
                  </div>  
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <label style="font-weight: 500" >Shop Name</label>
                             <input class="form-control"   name="shop_name" type="text" value="{{$data->shop_name}}" >
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group" >
                            <label style="font-weight: 500" >Owner Name</label>
                            <input class="form-control"  name="owner_name" type="text" value="{{$data->owner_name}}" >
                          </div>                        
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <label style="font-weight: 500" >Shop No</label>
                             <input class="form-control" name="shop_number" type="text" value="{{$data->shop_no}}" >
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group" >
                            <label style="font-weight: 500" >Shop Address</label>
                            <input class="form-control"  name="shop_address" type="text" value="{{$data->shop_address}}">
                          </div>                        
                      </div>
                  </div>                                                    
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <label style="font-weight: 500" >User Favicon</label>
                             <input class="form-control" name="vendor_img" type="file">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                             <label style="font-weight: 500" >Shop Image/Banner</label>
                             <input class="form-control" name="shop_img" type="file">
                        </div>
                      </div>                      
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <label style="font-weight: 500" >Select Country</label>
                             <select class="form-control" id="country" name="country_id" type="text" >
                               <option selected="" disabled="">Select Country</option>
                               @foreach($countries as $country)   
                               <option value="{{$country->id}}" {{($data->country_id==$country->id)?'selected':''}}>{{$country->name}}</option>
                               @endforeach
                             </select>  
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                             <label style="font-weight: 500" >Select State</label>
                             <select class="form-control" id="state" name="state_id" type="text" >
                                @foreach($states as $state)
                                    <option value="{{$state->id}}" {{ ($state->id == $data->state_id) ? 'selected' : '' }}>{{ $state->name }}</option>
                                @endforeach                              
                             </select>
                          </div>                        
                      </div>
                  </div> 
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                             <label style="font-weight: 500" >Select City</label>
                             <select class="form-control" id="city" name="city_id" type="text" >
                              @foreach($cities as $city)
                                  <option value="{{$city->id}}" {{ ($city->id == $data->city_id) ? 'selected' : '' }}>{{ $city->name }}</option>
                              @endforeach

                             </select>  
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label style="font-weight: 500" >Zip Code</label>
                            <input class="form-control" name="zip_code" type="text" value="{{$data->zip_code}}" >
                          </div>                        
                      </div>
                  </div>                     
                  <div class="row">    
                      <div class="col-md-12">
                          <div class="form-group" >
                            <label style="font-weight: 500" >Registration No</label>
                            <input class="form-control" name="reg_no"  type="text" value="{{$data->reg_no}}">
                          </div>                        
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                           <label style="font-weight: 500" >Description</label>
                           <textarea class="form-control" name="desc" rows="4" cols="50" value="">{{$data->description}}</textarea>
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
           url:"{{url('vendor/get-state-list')}}?country_id="+countryID,
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
           url:"{{url('vendor/get-city-list')}}?state_id="+stateID,
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
