<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng kí</title>

    <!-- Font Icon -->
    <link rel="stylesheet"
          href="{{asset('public/frontend/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
</head>
<body>
<a href="{{URL::to('/trangchu')}}">Trang Chủ</a>
<!-- Sign up form -->
<section class="signup" style="margin-top: 150px">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="teal text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <h2 class="form-title">Đăng Kí</h2>
                <form action="{{URL::to('/form-signup')}}" method="POST" class="register-form" id="register-form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Nhập email của bạn"/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="text" name="name" placeholder="Nhập họ và tên"/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" placeholder="Nhập mật khẩu"/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="enter_the_password" placeholder="Nhập lại mật khẩu"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý với tất cả
                            <a href="" class="term-service"> điều khoản và dịch vụ </a></label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" class="form-submit" value="Đăng kí"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{asset('public/frontend/images/signup-image.jpg')}}" alt="sing up image"></figure>
                <a href="{{URL::to('/show-login')}}" class="signup-image-link">Tôi đã có tài khoản</a>
            </div>
        </div>
    </div>
</section>
</body>
