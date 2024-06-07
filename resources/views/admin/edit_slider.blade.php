@extends('pages/admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật slider
                </header>
                <div class="panel-body">
                    <header>
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="teal text-alert">' . $message . '</span>';
                            Session::put('message', null);
                        }
                        ?>
                    </header>
                    <div class="position-center">
                        @foreach($edit_slider as $key=>$value)
                            <form role="form" action="{{URL::to('/update-slider/'.$value->slider_id)}}" method="post"  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh</label>
                                    <input type="file" name="slider_image" class="form-control"
                                           id="exampleInputEmail1">
                                    <img src="{{asset('public/uploads/product/'.$value->slider_image)}}"
                                         style="height: 100px;width: 860px" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Liên kết sản phẩm</label>
                                    <select name="product_id" class="form-control input-sm m-bot15">
                                        @foreach($product as $key=>$pro))
                                        <option value="{{$pro->product_id}}">{{$pro->product_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="slider_status" class="form-control input-sm m-bot15">
                                        <option value="0">Hiển thị</option>
                                        <option value="1">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="update_category_product" class="btn btn-info">Cập
                                    nhật slider
                                </button>
                            </form>
                        @endforeach
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection()



