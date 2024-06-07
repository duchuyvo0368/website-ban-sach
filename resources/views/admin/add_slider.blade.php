@extends('pages/admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Slider
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
                        <form role="form" action="{{URL::to('/save-slider')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh</label>
                                <input type="file" name="slider_image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Liên kết</label>
                                <input type="text" name="slider_link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="slider_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm sản phẩm
                            </button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection()
