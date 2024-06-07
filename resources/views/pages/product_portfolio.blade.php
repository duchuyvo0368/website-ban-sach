<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('public/frontend/css/sach-moi-tuyen-chon.css')}}">
    <script type="text/javascript" src="{{asset('public/frontend/js/main.js')}}"></script>
    <link rel="stylesheet" href="{{asset('public/frontend/fontawesome_free_5.13.0/css/all.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/slick/slick-theme.css')}}"/>
    <script type="text/javascript" src="{{asset('public/frontend/slick/slick.min.js')}}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script type="text/javascript"
            src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("public/frontend/favicon_io/apple-touch-icon.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("public/frontend/favicon_io/favicon-32x32.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("public/frontend/favicon_io/favicon-16x16.png")}}">
    <link rel="manifest" href="{{asset("public/frontend/favicon_io/site.webmanifest")}}">
</head>

<body>
<!-- code cho nut like share facebook  -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

<!-- header -->
<!-- header -->
@include('pages/head')
<!-- noi dung danh muc sach(categories) + banner slider -->
<section class="banner">
    <div class="container">
        <a href="sach-moi-tuyen-chon.html"><img src="{{asset('public/frontend/images/neu-toi-biet-duoc-khi-20-full-banner.jpg')}}" alt="banner-sach-ktkn"
                                                class="img-fluid"></a>
    </div>
</section>

<!-- breadcrumb  -->
<section class="breadcrumbbar">
    <div class="container">
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
            <li class="breadcrumb-item active"><a href="sach-moi-tuyen-chon.html">Sách mới tuyển chọn</a></li>
        </ol>
    </div>
</section>

<!-- ảnh banner -->
<!-- các sản phẩm  -->
<section class="content my-4">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="items">
                <div class="row">
                    @foreach($product_portfolio as $key=>$value)
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <!-- 1 sản phẩm  -->
                        <div class="card">
                            <a href="{{URL::to('/product-details/'.$value->product_id)}}" class="motsanpham"
                               style="text-decoration: none; color: black;" data-toggle="tooltip"
                               data-placement="bottom" title="{{$value->product_name}}">
                                <img class="card-img-top anh" src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="{{$value->product_name}}">
                                <div class="card-body noidungsp mt-3">
                                    <h6 class="card-title ten">{{$value->product_name}}</h6>
                                    <small class="tacgia text-muted">{{$value->product_author}}</small>
                                    <div class="gia d-flex align-items-baseline">
                                        <div class="giamoi">{{$value->product_price}} đ</div>
                                        <div class="giacu text-muted">139.000 ₫</div>
                                        <div class="sale">-20%</div>
                                    </div>
                                    <div class="danhgia">
                                        <ul class="d-flex" style="list-style: none;">
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li class="active"><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <span class="text-muted">0 nhận xét</span>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>

            <!-- pagination bar  -->
            <div class="pagination-bar my-3">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ul class="pagination justify-content-center">
                                {{$product_portfolio->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!--het khoi san pham-->
        </div>
        <!--het div noidung-->
    </div>
    <!--het container-->
</section>

{{--<!-- thanh cac dich vu :mien phi giao hang, qua tang mien phi ........ -->--}}
<!-- nut cuon len dau trang -->
@include('pages.footer')

</body>

</html>
