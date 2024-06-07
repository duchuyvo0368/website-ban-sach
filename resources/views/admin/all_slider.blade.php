@extends('pages/admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê Slider
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
                        <th>Ảnh slider</th>
                        <th>Liên kết</th>
                        <th>Hiển thị</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_slider as $key =>$pro)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                            </td>
                            <td><img src="public/uploads/product/{{$pro->slider_image}}" height="100px" width="500"></td>
                            <td>{{$pro->product_id}}</td>
                            <td>
                            <span class="text-ellipsis">
                                <?php
                                if(isset($pro)){
                                if($pro->slider_status==0){
                                ?>
                             <a href="{{URL::to('/unactive-slider/'.$pro->slider_id)}}"><span
                                     class="fa fa-thumbs-up"></span></a>
                                     <?php
                                }
                                else{
                                ?>
                            <a href="{{URL::to('/active-slider/'.$pro->slider_id)}}"><span
                                    class="fa fa-thumbs-down"></span></a>
                                <?php
                                }
                                }
                                ?>
                            </span>
                            </td>
                            <td>
                                <a href="{{URL::to('/edit-slider/'.$pro->slider_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')" href="{{URL::to('/delete-slider/'.$pro->slider_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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


