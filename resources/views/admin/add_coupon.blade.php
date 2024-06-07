@extends('pages/admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Mã giảm giá
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
                        <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                <input type="text" name="category_product_name" class="form-control"
                                       id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mã giảm giá</label>
                                <input type="text" name="category_product_name" class="form-control"
                                       id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số lượng</label>
                                <input type="text" name="category_product_name" class="form-control"
                                       id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <button type="submit" class="btn btn-info">Thêm sản phẩm
                            </button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection()

