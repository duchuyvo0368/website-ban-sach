@extends('pages/admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="teal text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Id đơn hàng</th>
                        <th>Mã đặt hàng</th>
                        <th>Id sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số tiền phải thanh toán</th>
                        <th>Số lượng</th>
                        <th>Ngày mua</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_details as $key =>$value)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                            </td>
                            <td>{{$value->order_details_id}}</td>
                            <td>{{$value->order_code}}</td>
                            <td>{{$value->product_id}}</td>
                            <td>{{$value->product_name}}</td>
                            <td>{{$value->product_price}} đ</td>
                            <td>{{$value->product_sales_quantity}}</td>
                            <td>{{$value->created_at}}</td>
                            </td>
                            <td>
                                <a href="{{URL::to('/edit-shipping/')}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')" href="{{URL::to('/delete-shipping/')}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">

                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection




