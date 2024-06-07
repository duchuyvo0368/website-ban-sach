<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('public/frontend/css/gio-hang.css')}}">
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
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/frontend/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/frontend/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/frontend/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('public/frontend/favicon_io/site.webmanifest')}}">
    <script>
        $(document).ready(function (){

        })
    </script>
</head>

<body>
<!-- code cho nut like share facebook  -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

<!-- header -->
@include('pages/head')


<!-- form dang ky khi click vao button tren header-->
<!-- thanh tieu de "danh muc sach" + hotline + ho tro truc tuyen -->
<section class="duoinavbar">
    <div class="container text-white">
        <div class="row justify">
            <div class="col-lg-3 col-md-5">
                <div class="categoryheader">
                    <div class="noidungheader text-white">
                        <i class="fa fa-bars"></i>
                        <span class="text-uppercase font-weight-bold ml-1">Danh mục sách</span>
                    </div>
                    <!-- CATEGORIES -->
                    <div class="categorycontent" style="border: 2px red">
                        <ul>
                        @foreach($cate_product as $key=>$value)
                            <li><a href="{{URL::to('/danh-muc-san-pham/'.$value->category_id)}}">{{$value->category_name}}</a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
            </div>{{--            --}}
        </div>
            <div class="col-md-5 ml-auto contact d-none d-md-block">
                <div class="benphai float-right">
                    <div class="hotline">
                        <i class="fa fa-phone"></i>
                        <span>Hotline:<b>1900 1999</b> </span>
                    </div>
                    <i class="fas fa-comments-dollar"></i>
                    <a href="#">Hỗ trợ trực tuyến </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- giao diện giỏ hàng  -->
<section class="content my-3">
    <div class="container">
        <div class="cart-page bg-white">
            <div class="row">
                <!-- giao diện giỏ hàng khi không có item  -->
                <div class="col-md-8 cart">
                    <div class="cart-content py-3 pl-3">
                        <h6 class="header-gio-hang">GIỎ HÀNG CỦA BẠN <span>(sản phẩm)</span></h6>
                        @foreach(Cart::content() as $key=>$value)
                        <div class="cart-list-items">
                            <div class="cart-item d-flex">
                                <a href="" class="img">
                                    <img src="{{URL::to('public/uploads/product/'.$value->options->image)}}"
                                         class="img-fluid" alt="anhsp1">
                                </a>
                                <div class="item-caption d-flex w-100">
                                    <div class="item-info ml-3">
                                        <a href="" class="ten"></a>
                                        <div class="soluong d-flex">
                                            <div class="input-number input-group mb-3">
                                                <input type="hidden" name="productid_hidden"
                                                       value="{{$value->product_id}}">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text btn-spin btn-dec">-</span>
                                                </div>
                                                <input type="text" name="qty" value="{{$value->qty}}" class="soluongsp  text-center">
                                                <div class="input-group-append">
                                                    <span class="input-group-text btn-spin btn-inc">+</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-price ml-auto d-flex flex-column align-items-end">
                                        <div class="giamoi">{{number_format($value->price,3,".",".")}}đ</div>
                                        <div class="giacu">139.000 ₫</div>
                                        <span class="remove mt-auto"><a class="far fa-trash-alt" href="{{URL::to('/delete-to-cart/'.$value->rowId)}}"></a></span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        @endforeach
                        <div class="row tong">
                            <div class="col-md-3">
                                <a href="{{URL::to("trangchu")}}" class="btn nutmuathem mb-3">Mua thêm</a>
                            </div>
                            <div class="col-md-5 offset-md-4">
                                <div class="tonggiatien" style="margin-top: 50px">
                                    <div class="group d-flex justify-content-between">
                                        <p class="label">Giảm giá:</p>
                                        <p class="giamgia">0 ₫</p>
                                    </div>
                                    <label class="group d-flex justify-content-between">
                                        <input class="form-control" type="text" name="code" placeholder="Mã giảm giá">
                                        <input type="button" style="margin-left: -10px" class="btn btn-warning" value="Áp dụng">
                                    </label>
                                    @foreach(Cart::content() as $key=>$value1)
                                    <div class="group d-flex justify-content-between">
                                        <p class="label">Phí vận chuyển:</p>
                                        <p class="phivanchuyen">0 ₫</p>
                                    </div>
                                    <div class="group d-flex justify-content-between align-items-center">
                                        <strong class="text-uppercase">Tổng cộng:</strong>
                                        <p class="tongcong">{{(Cart::subtotal(3))}} ₫</p>
                                    </div>
                                    <small class="note d-flex justify-content-end text-muted">
                                        (Giá đã bao gồm VAT)
                                    </small>
                                        @break(Cart::content())
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- giao diện phần thanh toán nằm bên phải  -->
            @include('pages.pay')
            <!-- het div cart-steps  -->
            </div>
            <!-- het row  -->
        </div>
        <!-- het cart-page  -->
    </div>
    <!-- het container  -->
</section>
@include('pages.footer')
</body>
</html>
