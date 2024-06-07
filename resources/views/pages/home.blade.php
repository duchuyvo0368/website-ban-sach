<!-- khoi sach moi  -->
@extends('welcome')
@section('content')
    <!-- khoi sach moi  -->
        <section class="_1khoi sachmoi bg-white col-md4">
            <div class="container">
                <div class="noidung" style=" width: 100%;">
                    <div class="row">
                        <!--header-->
                        @foreach($category1 as $key=>$value1)
                        <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                            <h1 class="header text-uppercase" style="font-weight: 400;">{{$value1->category_name}}</h1>
                            <a href="{{URL::to('/danh-muc-san-pham/'.$value1->category_id)}}"
                               class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="khoisanpham" style="padding-bottom: 2rem;">
                        @foreach($all_product1 as $key=>$value)
                        <!-- 1 san pham -->
                            <div class="card">
                                <a href="{{URL::to('product-details/'.$value->product_id)}}" class="motsanpham"
                                   style="text-decoration: none; color: black;" data-toggle="tooltip"
                                   data-placement="bottom"
                                   title="{{$value->product_name}}">
                                    <img class="card-img-top anh"
                                         src="{{URL::to('public/uploads/product/'.$value->product_image)}}"
                                         alt="{{$value->product_name}}">
                                    <div class="card-body noidungsp mt-3">
                                        <h3 class="card-title ten">{{$value->product_name}}</h3>
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
    @include('pages/new_book')
    @include('pages/new_book2')
    @include('pages.news_product')
@endsection

