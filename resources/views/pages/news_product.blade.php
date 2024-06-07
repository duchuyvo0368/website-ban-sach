<section class="_1khoi sachnendoc bg-white mt-4">
    <div class="container">
        <div class="noidung" style=" width: 100%;">
            <div class="row">
                <!--header-->
                @foreach($category4 as $key=>$value1)
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                        <h1 class="header text-uppercase" style="font-weight: 400;">{{$value1->category_name}}</h1>
                        <a href="{{URL::to('/all-news/'.$value1->category_id)}}"
                           class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                @endforeach
                <!-- 1 san pham -->
                @foreach($all_product4 as $key=>$value)
                    <div class="col-lg col-sm-4">
                        <div class="card">
                            <a  class="motsanpham" style="text-decoration: none;"
                               data-toggle="tooltip" data-placement="bottom"
                               title="Từng bước chân nở hoa: Khi câu kinh bước tới">
                                <img class="card-img-top anh" src="{{URL::to('public/uploads/product/'.$value->product_image)}}"
                                     alt="tung-buoc-chan-no-hoa">
                                <div class="card-body noidungsp mt-3">
                                    <h3 class="card-title ten">{{$value->product_name}}</h3>
                                    <small class="thoigian text-muted">03/04/2020</small>
                                    <div><a class="detail" href="{{URL::to('/product-news/'.$value->product_id)}}" data-toggle="tooltip"
                                            data-placement="bottom">Xem chi tiết</a></div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <hr>
    </div>
</section>
