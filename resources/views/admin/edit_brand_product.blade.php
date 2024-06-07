@extends('pages/admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu sản phẩm
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
                        @foreach($edit_brand_product as $key=>$edit_value)
                            <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->barnd_id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" name="brand_product_name" value="{{$edit_value->brand_name}}" class="form-control"
                                           id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea type="text" style="resize: none" rows="8" name="brand_product_desc"
                                              class="form-control" id="exampleInputPassword1">{{$edit_value->brandy_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="brand_product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Hiển thị</option>
                                        <option value="1">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật sản phẩm
                                </button>
                            </form>
                        @endforeach
                    </div>
{{--                    @foreach($slider as $key=>$value)--}}
{{--                        <div class="carousel-item active">--}}
{{--                            <a href="{{$value->slider_link}}"><img src="{{asset("public/uploads/product/".$value->slider_image)}}"--}}
{{--                                                                   class="img-fluid"--}}
{{--                                                                   style="height: 386px;" width="900px" alt="First slide"></a>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
                </div>
            </section>
        </div>
    </div>
@endsection()


