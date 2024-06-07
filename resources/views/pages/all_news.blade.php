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
        .desc {
            margin-right: 10px;
        }

        .newbook-col {
            /*display: flex;*/
            /*flex-wrap: wrap;*/
            /*border-bottom: 1px solid #eee;*/
            /*width: 103%;*/
            display: block;
            position: relative;
            margin-bottom: 10px;
        }

        .img {
            vertical-align: baseline;
            border: 0px;
            padding: 0px;
            font-size: 100%;
            width: 103%;
        }

        .col {
            padding: 0 5px;
        }

        .book-list {
            vertical-align: baseline;
            margin: 0;
            border: 0;
            padding: 0;
            font: inherit;
            font-size: 100%;
        }

        time {
            font-size: 13px;
            color: #888888;
        }

        .caption h1.name {
            vertical-align: baseline;
            margin: 0;
            border: 0;
            padding: 0;
            font: inherit;
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
            line-height: 22px;
            padding-bottom: 8px
        }

        h3.name {
            font-size: 13px;
            font-weight: bold;
            line-height: 18px;
            color: #ffffff;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .newbook-col .caption {
            bottom: 0;
            position: absolute;
            width: 103%;
            padding: 10px;
            background-image: linear-gradient(rgba(0, 0, 0, 0), rgb(0, 0, 1));
        }

        .caption {
            bottom: 0;
            position: absolute;
            width: 103%;
            padding: 10px;
        }

        .name1 a {
            font-size: 20px;
            font-weight: bold;
            line-height: 18px;
            text-decoration: none;
            color: inherit;

        }
    </style>
</head>
<div>
    @include('pages/head')
    @include('pages.hotline')
</div>
<body>
<div class="breadcrumbbar" style="background: white">
    <div class="container">
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="{{URL::to('/trangchu')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Tin sách</a></li>
        </ol>
    </div>
</div>
<section class="container" style="background: white">
    <div class="row">
        @foreach($all_news as $key=>$value1)
            @if($key<2)
                <div class="col-12 col-md-6">
                    <a class="newbook-col" href="{{URL::to('/product-news/'.$value1->product_id)}}">
                        <img class="img" src="{{URL::to('public/uploads/product/'.$value1->product_image)}}">
                        <div class="caption">
                            <h1 class="name">{{$value1->product_name}}</h1>
                            <time>29/10/2021</time>
                        </div>
                    </a>
                </div>
                @continue
            @endif
            @if(1<$key&&$key<6)
                <div class="col-12 col-sm-6 col-md-3">
                    <a class="newbook-col" style="margin-left: -6px"
                       href="{{URL::to('/product-news/'.$value1->product_id)}}">
                        <img class="img news_sanh" src="{{URL::to('public/uploads/product/'.$value1->product_image)}}">
                        <div class="caption">
                            <h3 class="name">{{$value1->product_name}}</h3>
                        </div>
                    </a>
                </div>
            @endif
            @if(5<$key&&$key<10)
                <section class="container" style="background: white;margin-top: 25px">
                    <div class="row">
                        <a class="col-sm-3" href="{{URL::to('/product-news/'.$value1->product_id)}}">
                            <img class="" style="width: 300px;height: 200px"
                                 src="{{URL::to('public/uploads/product/'.$value1->product_image)}}">
                        </a>
                        <div class="col-sm-8" style="margin-left: 35px;margin-top: -10px">
                            <h3 class="name1">
                                <a href="https://www.netabooks.vn/bo-ba-tieu-thuyet-ve-ha-noi-cua-to-hoai"
                                   target="_self" title="Bộ ba tiểu thuyết về Hà Nội của Tô Hoài">Bộ ba tiểu thuyết về
                                    Hà Nội của Tô Hoài</a></h3>
                            <time>25/10/2021</time>
                            <div class="des" style="font-size: 15px">Tác phẩm "Quê người", Mười năm", "Quê nhà" của Tô
                                Hoài
                                ra mắt ấn bản mới
                                nhân 1.011 năm Thăng Long - Hà Nội.
                            </div>
                            <a style="text-decoration: none;color: #f5a623;font-size: 13px;" class="link"
                               href="{{URL::to('/product-news/'.$value1->product_id)}}"
                               target="_self" title="Bộ ba tiểu thuyết về Hà Nội của Tô Hoài">
                                Xem thêm
                            </a>
                        </div>
                    </div>
            @endif
        @endforeach
    </div>
</section>
<div style="margin-top: 150px">@include('pages/footer')</div>
</body>
</html>
