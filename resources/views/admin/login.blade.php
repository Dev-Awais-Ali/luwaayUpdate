<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <!-- Font-->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/login_form/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/login_form/css/opensans-font.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/login_form/fonts/line-awesome/css/line-awesome.min.css')}}">
    <!-- Jquery -->
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <!-- Main Style Css -->
    <!-- Jquery -->
    <link rel="stylesheet" href="{{asset('assets/admin/login_form/style.css')}}"/>
    <style type="text/css">

        .inputWithIcon input[type="text"] {
            padding-left: 40px;
        }

        .inputWithIcon input[type="password"] {
            padding-left: 40px;
        }
        .form-v4-content .form-detail {
          overflow-y:hidden;
         }

        .already_account{
            margin-top:20px;
        }
        .already_account p.thin {
            font-weight: bold;
            text-align: center;
        }

        .forgot_pwd{
            margin-bottom: 10px;
            text-align: end;
        } 
        .forgot_pwd a{
            text-decoration: none;
        }
        .fa{
          padding: 8px;
          font-size: 30px;
          width: 40px;
          text-align: center;
          text-decoration: none;
          margin: 5px 2px;
          border-radius: 50%;
        }   
        .fa:hover {
            opacity: 0.9;
        }

        .fa-facebook {
          background: #3B5998;
          color: white;

        }

        .fa-google {
          background: #dd4b39;
          color: white;
        }
        .btn-primary{
            background: #3786bd;
        }
        .btn-primary:hover{
            background:#007bff;
        }

    </style>

</head>
<body class="form-v4">

    <div class="page-content">
        <div class="form-v4-content">
            <div class="form-left">
                <div class="luwaay">
                   <img src="{{asset('assets/front/login_form/images/Asset1.png')}}" />

  
                    <p class="thick">&copy; COPYRIGHTS 2020 LUWAAY.COM</></p>
                </div>



            </div>
            <form class="form-detail" action="{{route('admin.login.submit')}}" method="post" id="myform">
                @csrf
                <h2 style="text-align: center;">Login</h2>

                <div class="inputWithIcon">
                    <input type="text" name="email" placeholder="Enter Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                    <i class="material-icons" aria-hidden="true">email</i>
                </div>

                <div class="inputWithIcon ">
                    <input type="password" name="password"  id="password" placeholder="Password" required>
                    <i class="material-icons" aria-hidden="false">lock</i>
                </div>

                <div class="forgot_pwd">
                    <a href="{{route('admin.forgot')}}">Forgot Password ?</a>
 
                </div>
 

                <div class="inputWithIcon">
                    <input type="submit" name="register" class="btn btn-primary btn-lg btn-block text-white" value="Login">
                </div>



            </form>
        </div>
    </div>
        <script src="{{asset('assets/admin/js/myscript.js')}}"></script>
            <script src="{{asset('assets/admin/js/custom.js')}}"></script>

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

</body>
</html>








