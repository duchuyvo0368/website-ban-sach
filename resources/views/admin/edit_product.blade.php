@extends('pages/admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
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
                        @foreach($edit_product as $key=>$pro)
                        <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control"
                                       id="exampleInputEmail1" value="{{$pro->product_name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên tác giả</label>
                                <input type="text" name="product_author" class="form-control"
                                       id="exampleInputEmail1" value="{{$pro->product_author}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file" name="product_image" class="form-control"
                                       id="exampleInputEmail1">
                                <div>
                                    <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" width="100px" height="100px"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input  type="text" name="product_price" class="form-control col-md-9"
                                       id="exampleInputEmail1" value="{{$pro->product_price}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" style="margin-top: 20px">Mô tả sản phẩm</label>
                                <textarea type="text" name="product_desc" class="form-control">{{$pro->product_desc}}</textarea>
                                <script>
                                    CKEDITOR.replace( 'product_desc' );
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key=>$cate))
                                @if($cate->category_id==$pro->category_id){
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input  class="form-control col-md-9" name="product_number" type="text" value="{{$pro->product_number}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm
                            </button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection()


