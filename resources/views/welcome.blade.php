<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Books-Mua sách trực tuyến giá rẻ nhất</title>
    <meta name="description"
          content="Mua sách online hay, giá tốt nhất, combo sách hot bán chạy, giảm giá cực khủng cùng với những ưu đãi như miễn phí giao hàng, quà tặng miễn phí, đổi trả nhanh chóng. Đa dạng sản phẩm, đáp ứng mọi nhu cầu.">
    <meta name="keywords" content="nhà sách online, mua sách hay, sách hot, sách bán chạy, sách giảm giá nhiều">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset("public/frontend/css/home.css")}}">
    <script type="text/javascript" src="{{asset("public/frontend/js/main.js")}}"></script>
    <link rel="stylesheet" href="{{asset("public/frontend/fontawesome_free_5.13.0/css/all.css")}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset("public/frontend/slick/slick.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset("public/frontend/slick/slick-theme.css")}}"/>
    <script type="text/javascript" src="{{asset("public/frontend/slick/slick.min.js")}}"></script>
    <script type="text/javascript"
            src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    <meta name="google-site-verification" content="urDZLDaX8wQZ_-x8ztGIyHqwUQh2KRHvH9FhfoGtiEw"/>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("public/frontend/favicon_io/apple-touch-icon.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("public/frontend/favicon_io/favicon-32x32.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("public/frontend/favicon_io/favicon-16x16.png")}}">
    <link rel="manifest" href="{{asset("public/frontend/favicon_io/site.webmanifest")}}">
    <script type="text/javascript">
        alert(<?php$name=Session::get('name');
            if ($name){
                echo $name;
                Session::put('name',null);
                ?>)
    </script>
    <style>img[alt="www.000webhost.com"] {
            display: none;
        }</style>
</head>
<style>
    .categorycontent ul {
        width: 255px;
        max-height:390px;
        overflow: auto;

    }

    .categorycontent ul::-webkit-scrollbar {

        display: none;
    }
</style>
<body>
<!-- code cho nut like share facebook  -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="41JBXF4P"></script>


<!-- header -->
@include('pages/head')


<!-- form dang ky khi click vao button tren header-->
<!-- thanh tieu de "danh muc sach" + hotline + ho tro truc tuyen -->
@include('pages.hotline')
<!-- noi dung danh muc sach(categories) + banner slider -->
<section class="header bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="margin-right: -15px;">
                <!-- CATEGORIES -->
                <div class="categorycontent">
                    <ul>
                        @foreach($category as $key1=>$value1)
                            <li><a href="{{URL::to('/danh-muc-san-pham/'.$value1->category_id)}}">{{$value1->category_name}}</a><i
                                    class="float-right"></i>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- banner slider  -->
            <div class="col-md-9 px-0">
            @include('pages/slider')
            </div>
        </div>
    </div>
</section>




@yield('content')
@include('pages/footer')


</body>

</html>
