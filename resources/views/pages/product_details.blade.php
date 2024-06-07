<!DOCTYPE html>
<html lang="li">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('public/frontend/css/product-item.css')}}">
    <script type="text/javascript" src="{{asset('public/frontend/js/main.js')}}"></script>
    <link rel="stylesheet" href="{{asset('public/frontend/fontawesome_free_5.13.0/css/all.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/sweetalert.css')}}"/>
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
    <script type="text/javascript">
        $(document).ready(function () {
            load_comment();

            function load_comment() {
                var product_id = $('.comment_product_id').val();
                var _token = $("input[name='_token']").val();
                $.ajax({
                    url: "{{url('/load-comment')}}",
                    method: "POST",
                    data: {product_id: product_id, _token: _token},
                    success: function (data) {
                        $('#comment_show').html(data);
                    }
                });
            }

            $('.send_comment').click(function () {
                var product_id = $('.comment_product_id').val();
                var comment_name = $('.comment_name').val();
                var comment_content = $('.comment_content').val();
                var _token = $("input[name='_token']").val();
                $.ajax({
                    url: "{{url('/send-comment')}}",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        comment_name: comment_name,
                        comment_content: comment_content,
                        _token: _token
                    },
                    success: function (data) {
                        $('#notify_comment').html('<p class="text text-success">Thêm bình luận thành công</p>');
                        load_comment();
                        $('#notify_comment').fadeIn().fadeOut(2000);
                        $('.comment_name').val('');
                        $('.comment_content').val('');
                    }
                });
            });
        });

    </script>

</head>

<body>
<!-- code cho nut like share facebook  -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

<!-- header -->
@include('pages/head')
<!-- thanh tieu de "danh muc sach" + hotline + ho tro truc tuyen -->
@include('pages.hotline')

<!-- breadcrumb  -->
<section class="breadcrumbbar">
    <div class="container">
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="{{URL::to('/trangchu')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Sách kinh tế</a></li>
        </ol>
    </div>
</section>

<!-- nội dung của trang  -->
<section class="product-page mb-4">
    <div class="container">
        <!-- chi tiết 1 sản phẩm -->

        <div class="product-detail bg-white p-4">
            @foreach($product_details as $key=>$value)
                <div class="row">
                    <!-- ảnh  -->
                    <div class="col-md-5 khoianh">
                        <div class="anhto mb-4">
                            <a class="active" href="{{asset("public/uploads/product/".$value->product_image)}}"
                               data-fancybox="thumb-img">
                                <img class="product-image"
                                     src="{{asset("public/uploads/product/".$value->product_image)}}"
                                     alt="lap-ke-hoach-kinh-doanh-hieu-qua-mt" style="width: 100%;">
                            </a>
                            <a href="{{asset("public/uploads/".$value->product_image)}}" data-fancybox="thumb-img"></a>
                        </div>
                    </div>
                    <!-- thông tin sản phẩm: tên, giá bìa giá bán tiết kiệm, các khuyến mãi, nút chọn mua.... -->
                    <div class="col-md-7 khoithongtin">
                        <div class="row">
                            <div class="col-md-12 header">
                                <h4 class="ten">{{$value->product_name}}</h4>
                                <div class="rate">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star "></i>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-7">
                                <div class="gia">
                                    <div class="giabia">Giá bìa:<span class="giacu ml-2">{{ceil(120*strval((intval($value->product_price)))/100)}}.000đ</span></div>
                                    <div class="giaban">Giá bán tại DealBooks: <span
                                            class="giamoi font-weight-bold">{{$value->product_price}} đ</span>
                                        <div class="tietkiem">Tiết kiệm: <b>{{ceil(20*strval((intval($value->product_price)))/100)}}.000đ</b> <span class="sale">-20%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="uudai my-3">
                                    <h6 class="header font-weight-bold">Khuyến mãi & Ưu đãi tại DealBook:</h6>
                                    <ul>
                                        <li><b>Miễn phí giao hàng </b>cho đơn hàng từ 150.000đ ở TP.HCM và 300.000đ
                                            ở
                                            Tỉnh/Thành khác <a href="">>> Chi tiết</a></li>
                                        <li>Tặng Bookmark cho mỗi đơn hàng</li>
                                        <li>Bao sách miễn phí (theo yêu cầu)</li>
                                    </ul>
                                </div>
                                <form action="{{URL::to('/save-cart')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="soluong d-flex">
                                        <label class="font-weight-bold">Số lượng: </label>
                                        <div class="input-number input-group mb-3">
                                            <input type="hidden" name="productid_hidden"
                                                   value="{{$value->product_id}}">
                                            <input type="hidden" name="soluongsp1" value="{{$value->product_number}}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text btn-spin btn-dec">-</span>
                                            </div>

                                            <input type="text" name="qty" value="1" class="soluongsp  text-center">
                                            <div class="input-group-append">
                                                <span class="input-group-text btn-spin btn-inc">+</span>
                                            </div>
                                            <?php
                                            $message = Session::get('message');
                                            if ($message) {
                                                echo '<p class="alert huongdanmuahang text-decoration-none">' . $message . '</p>';
                                                Session::put('message', null);
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($value)){
                                    if($value->product_number == 0){
                                    ?>
                                    <input type="text" class=" nutmua btn w-100 text-uppercase" value="Hết hàng"
                                           readonly/>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <input type="submit" class="nutmua btn w-100 text-uppercase" value="Chọn mua"/>
                                    <?php
                                    }
                                    }
                                    ?>
                                    <a class="huongdanmuahang text-decoration-none" href="">(Vui lòng xem hướng dẫn mua
                                        hàng)</a>
                                    <small class="share">Share: </small>
                                    <div class="fb-like"
                                         data-href="https://docs.google.com/document/d/1ufpP6bmFEXorQWCTy94QpfgrI_6Gv7J1FWg6jjTQ97Y/edit"
                                         data-width="300px" data-layout="button" data-action="like"
                                         data-size="small"
                                         data-share="true"></div>
                                </form>
                            </div>
                            <!-- thông tin khác của sản phẩm:  tác giả, ngày xuất bản, kích thước ....  -->
                            <div class="col-md-5">
                                <div class="thongtinsach">
                                    <ul>
                                        <li>Tác giả: <a class="tacgia">{{$value->product_author}}</a></li>
                                        <li>Ngày xuất bản: <b>04-2020</b></li>
                                        <li>Kích thước: <b>20.5 x 13.5 cm</b></li>
                                        <li>Dịch giả: Skye Phan;</li>
                                        <li>Nhà xuất bản: Nhà Xuất Bản Thanh Niên</li>
                                        <li>Hình thức bìa: <b>Bìa mềm</b></li>
                                        <li>Số trang: <b>336</b></li>
                                        <li>Cân nặng: <b>0</b></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- decripstion của 1 sản phẩm: giới thiệu , đánh giá độc giả  -->
                <div class="product-description col-md-9">
                    <!-- 2 tab ở trên  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active text-uppercase" id="nav-gioithieu-tab"
                               data-toggle="tab" href="#nav-gioithieu" role="tab" aria-controls="nav-gioithieu"
                               aria-selected="true">Giới thiệu</a>
                            <a class="nav-item nav-link text-uppercase" id="nav-danhgia-tab" data-toggle="tab"
                               href="#nav-danhgia" role="tab" aria-controls="nav-danhgia"
                               aria-selected="false">Đánh
                                giá của độc giả</a>
                        </div>
                    </nav>
                    <!-- nội dung của từng tab  -->
                    <div class="tab-content" id="nav-tabContent">
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active ml-3" id="nav-gioithieu" role="tabpanel"
                             aria-labelledby="nav-gioithieu-tab">
                            <h6 class="tieude font-weight-bold">{{$value->product_name}}</h6>
                            <p>{{$value->product_desc}}</p>
                        </div>

                        <div class="tab-pane fade" id="nav-danhgia" role="tabpanel"
                             aria-labelledby="nav-danhgia-tab">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <p class="tieude">Đánh giá trung bình</p>
                                    <div class="diem">0/5</div>
                                    <div class="sao">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="sonhanxet text-muted">(0 nhận xét)</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="tiledanhgia text-center">
                                        <div class="motthanh d-flex align-items-center">5 <i
                                                class="fa fa-star"></i>
                                            <div class="progress mx-2">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            0%
                                        </div>
                                        <div class="motthanh d-flex align-items-center">4 <i
                                                class="fa fa-star"></i>
                                            <div class="progress mx-2">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            0%
                                        </div>
                                        <div class="motthanh d-flex align-items-center">3 <i
                                                class="fa fa-star"></i>
                                            <div class="progress mx-2">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            0%
                                        </div>
                                        <div class="motthanh d-flex align-items-center">2 <i
                                                class="fa fa-star"></i>
                                            <div class="progress mx-2">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            0%
                                        </div>
                                        <div class="motthanh d-flex align-items-center">1 <i
                                                class="fa fa-star"></i>
                                            <div class="progress mx-2">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            0%
                                        </div>
                                        <div class="btn vietdanhgia mt-3">Viết đánh giá của bạn</div>
                                    </div>
                                    <!-- nội dung của form đánh giá  -->

                                    <div id="notify_comment"></div>
                                    <form class="formdanhgia">
                                        <h6 class="tieude text-uppercase">GỬI ĐÁNH GIÁ CỦA BẠN</h6>
                                        <span class="danhgiacuaban">Đánh giá của bạn về sản phẩm này:</span>
                                        <div
                                            class="rating d-flex flex-row-reverse align-items-center justify-content-end">
                                            <input type="radio" name="star" id="star1"><label
                                                for="star1"></label>
                                            <input type="radio" name="star" id="star2"><label
                                                for="star2"></label>
                                            <input type="radio" name="star" id="star3"><label
                                                for="star3"></label>
                                            <input type="radio" name="star" id="star4"><label
                                                for="star4"></label>
                                            <input type="radio" name="star" id="star5"><label
                                                for="star5"></label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="txtFullname w-100 comment_name"
                                                   placeholder="Nhập tên">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="comment_content"
                                                   class="txtComment w-100 comment_content"
                                                   placeholder="Đánh giá của bạn về sản phẩm này">
                                        </div>
                                        <input type="button" class="btn nutguibl send_comment" value="Gửi bình luận">
                                    </form>
                                </div>
                            </div>
                            <form method="post">
                                @csrf
                                <input type="hidden" name="comment_product_id" class="comment_product_id"
                                       value="{{$value->product_id}}">
                                <div id="comment_show"></div>
                            </form>
                        </div>
                        <hr>
                        <!-- het tab nav-danhgia  -->
                    </div>
                    <!-- het tab-content  -->
                </div>
        @endforeach
        <!-- het product-description -->
        </div>
    </div>
</section>

<!-- het product-page -->

<!-- khối sản phẩm tương tự -->
<section class="_1khoi sachmoi">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="row">
                <!--header-->
                @foreach($related as $key=>$value)
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light pt-4">
                        <h5 class="header text-uppercase" style="font-weight: 400;">Sản phẩm tương tự</h5>
                        <a href="{{URL('/danh-muc-san-pham/'.$value->product_id)}}"
                           class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                    @break($related)
                @endforeach
            </div>
            <div class="khoisanpham" style="padding-bottom: 2rem;">
                <!-- 1 sản phẩm -->
                @foreach($related as $key=>$value1)
                    <div class="card">
                        <a href="{{URL::to('/product-details/'.$value1->product_id)}}" class="motsanpham"
                           style="text-decoration: none; color: black;" data-toggle="tooltip"
                           data-placement="bottom" title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                            <img class="card-img-top anh"
                                 src="{{asset('public/uploads/product/'.$value1->product_image)}}"
                                 alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten">{{$value1->product_name}}</h6>
                                <small class="tacgia text-muted">{{$value1->product_author}}</small>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">{{$value1->product_price}} ₫</div>
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
                                        <li><span class="text-muted">0 nhận xét</span></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- thanh cac dich vu :mien phi giao hang, qua tang mien phi ........ -->

@include('pages.footer')
</body>

</html>
