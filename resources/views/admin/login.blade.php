<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
       
         <!-- Bootstrap Core CSS -->
    <link href="{{url('public/admin2/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/admin2/css/style.css')}}" rel="stylesheet">
    <link href="{{url('public/admin2/js/bootstrap.min.js')}}" rel="stylesheet">
    <style>
    #center{
        margin: auto;
        text-align: center;
        width: 40%;
        margin-left: 30%;
        margin-right: 30%;
        margin-bottom: 20px;
    }
    </style>
    </head>
    <body>
        <div class="container">
            <div class="card card-container">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card"></p>
                 <form  method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter username" required="">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <button type="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3  px-4" id="center">Đăng nhập</button>
                </form>
                 @if(session('alert'))
                <div class="alert alert-danger" style="margin-top: 10px;">
                    {{session('alert')}}
                </div>
                @endif
               
                <!-- /form -->
                <a href="#" class="forgot-password">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="paragraph-agileits-w3layouts mt-2">
                                <a href="{{url('/')}}">Back to Home</a>
                            </h6>
                        </div>
                         <div class="col-md-6">
                            <h6 class="paragraph-agileits-w3layouts mt-2">
                                <a href="{{url('/')}}">Forgot the password?</a>
                            </h6>
                        </div>
                    </div>
                   
                </a>
            </div>
            <!-- /card-container -->
        </div>
        <!-- /container -->
    </body>
</html>
