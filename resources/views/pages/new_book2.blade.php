<section class="_1khoi sapphathanh mt-4">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="row">
                <!--header-->
                @foreach($category3 as $key=>$value1)
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                    <h2 class="header text-uppercase" style="font-weight: 400;">{{$value1->category_name}}</h2>
                    <a href="{{URL::to('/danh-muc-san-pham/'.$value1->category_id)}}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                </div>
                @endforeach
            </div>
            <div class="khoisanpham">
                <!-- 1 san pham -->
                @foreach($all_product3 as $key=>$value2)
                <div class="card">
                    <a href="{{URL::to('product-details/'.$value2->product_id)}}" class="motsanpham" style="text-decoration: none; color: black;"
                       data-toggle="tooltip" data-placement="bottom" title="Ngoại Giao Của Chính Quyền Sài Gòn">
                        <img class="card-img-top anh" src="{{URL::to('public/uploads/product/'.$value2->product_image)}}"
                             alt="ngoai-giao-cua-chinh-quyen-sai-gon">
                        <div class="card-body noidungsp mt-3">
                            <h3 class="card-title ten">{{$value2->product_name}}</h3>
                            <div class="gia d-flex align-items-baseline">
                                <div class="giamoi">{{$value2->product_price}} đ</div>
                                <div class="giacu text-muted">{{ceil(120*strval((intval($value->product_price)))/100)}}.000đ</div>
                                <div class="sale">-20%</div>
                            </div>
                            <small class="tacgia text-muted">{{$value2->product_author}}</small>
                            <div class="gia d-flex align-items-baseline">
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
