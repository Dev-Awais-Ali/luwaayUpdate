@extends('front.layouts.app')

@section('pagelevel_css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/login_form/css/opensans-font.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/login_form/fonts/line-awesome/css/line-awesome.min.css')}}">
    <!-- Jquery -->
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{asset('assets/front/login_form/css/custom.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/front/login_form/css/custom2.css')}}"/>


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
        <div class="page-content1 form-v4">
		    <div class="page-content">
		        <div class="form-v4-content">
		            <div class="form-left">
		                <div class="luwaay">
		                   <img src="{{asset('assets/front/login_form/images/Asset1.png')}}" />

		                    <div class="link_btn">
		                        <a href="#" style="color: white; text-decoration: none">Vendor Login</a><br />
		                        <a href="#" style="color:white; text-decoration:none">Vendor Registration</a><br />
		                    </div>
		                    <p class="thick">&copy; COPYRIGHTS 2020 LUWAAY.COM</></p>
		                </div>
		            </div>
		            <form class="form-detail" action="{{route('user.login.submit')}}" method="post" id="myform">
		            	@csrf
		                <h2 style="text-align: center;">Buyer Login</h2>

		                <div class="inputWithIcon">
		                    <input type="text" name="email" class="text" placeholder="Enter Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
		                    <i class="material-icons" aria-hidden="true">email</i>
		                </div>

		                <div class="inputWithIcon ">
		                    <input type="password" class="text" name="password"  id="password" placeholder="Password" required>
		                    <i class="material-icons" aria-hidden="false">lock</i>
		                </div>
		  

		                <div class="inputWithIcon">
		                    <input type="submit" name="register" class="btn btn-primary btn-lg  text-white" value="Login">
		                </div>

		                <div class="forgot_pwd">
		                    <a href="#"><b>Forgot Password</b></a>
		                    <p style="font-weight: bolder;">OR</b></p>
		                    <p><b>Login with</b></p>
		                    <a href="#" class="fa fa-facebook"></a>
		                    <a href="#" class="fa fa-google"></a>
		                </div>
		                <div class="already_account">
		                <p class="thin">Don't Have an Account? <a href="#">Sign up Now </a></p>

		                </div> 

		            </form>
		        </div>
		    </div>                 
        </div>
    </div>


@endsection  

    <!-- custom scripts-->
@section('pagelevel_scripts')    
   
@endsection  