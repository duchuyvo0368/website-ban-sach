<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('public/frontend/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
</head>
<body>
<a href="{{URL::to('/trangchu')}}">Trang Chủ</a>
<div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{('public/frontend/images/signin-image.jpg')}}" alt="sing up image"></figure>
                    <a href="{{URL::to('/show-signup')}}" class="signup-image-link">Tạo một tài khoản</a>
                </div>

                <div class="signin-form">
                    <?php
                    $message=Session::get('message');
                    if ($message){
                        echo '<span class="teal text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    <h2 class="form-title">Đăng nhập</h2>
                    <form action="{{URL::to('/form-login')}}" method="POST" class="register-form" id="login-form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" name="email" id="your_name" placeholder="Nhập email của bạn"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="your_pass" placeholder="Nhập mật khẩu của bạn"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Nhớ mật khẩu</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập"/>
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Hoặc đăng nhập bằng</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



</div>

<!-- JS -->
<script src="{{asset('public/frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/frontend/js/main1.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
