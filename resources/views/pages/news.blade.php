<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tin Tức</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" href="{{asset('public/frontend/css/product-item.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            background: #eee;
        }

        .fakeimg {
            height: auto;
        }

        {
            text-decoration: none
        ;
        }
        .desc{
          margin-right: 10px;
        }
    </style>
</head>
<div>
    @include('pages/head')
    @include('pages.hotline')
</div>
<body>
<div class="breadcrumbbar">
    <div class="container">
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="{{URL::to('/trangchu')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Tin sách</a></li>
        </ol>
    </div>
</div>
<div class="container" style="margin-top: 12px">
    @foreach($product as $key=>$value1)
        <div class="row">
            <div class="col-sm-8">
                <h5 class="webbook-name">{{$value1->product_name}}</h5>
                <div class="fakeimg">
                    <img class="img-thumbnail" style="width: 750px;height: 350px;border-radius: 5px"
                         src="{{URL::to('public/uploads/product/'.$value1->product_image)}}">
                    <p style="color: #a5a5a5;text-align: center;font-style:oblique ">Sách "{{$value1->product_name}}" của tác giả {{$value1->product_author}}</p>
                    <div class="desc">{{$value1->product_desc}}</div>
                </div>
            </div>
            <!-- Kết thúc cột giữa -->

            <!-- Cột phải-->
            <div class="col-sm-4">
                <div class="text-uppercase sidebar-title" style="font-family: serif">Bài Viết Khác</div>
                <div class="fakeimg">
                    <div class="row">
                        <img class="col-sm-6 mx-auto d-block" style=""
                             src="{{URL::to("public/frontend/images/tung-buoc-chan-no-hoa.jpg")}}">
                        <div class="col-sm-6" style="word-wrap: break-word;margin-left: -12px">
                            dkamkdmkdasd,admkasmdkmkasmdkmskmdakmlsam
                        </div>
                    </div>
                </div>
                <hr class="d-sm-none">
            </div>
            <!-- Kết thúc cột phải -->
            {{--        @endforeach--}}
        </div>
    @endforeach
</div>
<div style="margin-top: 150px">@include('pages/footer')</div>
</body>
</html>
