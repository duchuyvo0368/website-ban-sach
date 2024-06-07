@extends('pages/admin_layout')
@section('admin_content')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.btn-reply-comment').click(function () {
                var comment = $('.reply-comment').val();
                var comment_id = $(this).data('comment_id');
                var comment_product_id = $(this).attr('id');
                $.ajax({
                    url: "{{url('/reply-comment')}}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {comment: comment, comment_id: comment_id, comment_product_id: comment_product_id},
                    success: function (data) {
                        $('#notify_comment').html('<span class="teal text-alert">Thêm bình luận thành công</span>');
                        $('#notify_comment').fadeOut(4000);
                        $('.reply-comment').val('');
                    }
                });
            });
        });
    </script>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê bình luận
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
                <div id="notify_comment"></div>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Id bình luận</th>
                        <th>Tên khách hàng</th>
                        <th>Nội dung bình luận</th>
                        <th>Id sản phẩm</th>
                        <th>Thời gian</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comment1 as $key =>$pro)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                            </td>
                            <td>{{$pro->comment_id}}</td>
                            <td>{{$pro->comment_name}}</td>
                            <td>{{$pro->comment}}
                                {{$pro->co}}
                                <br>
                                <label>
                                    <textarea class="form-control reply-comment {{$pro->comment_id}}" rows="2"></textarea>
                                </label>
                                <br>
                                <button class="btn btn-primary btn-xs btn-reply-comment"
                                        id="{{$pro->comment_product_id}}" data-comment_id="{{$pro->comment_id}}">Trả lời
                                </button>
                            </td>
                            <td>{{$pro->comment_product_id}}</td>
                            <td>{{$pro->comment_date}}</td>
                            <td>
                                <a href="{{URL::to('')}}" class="active" ui-toggle-class=""><i
                                        class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')"
                                   href="{{URL::to('/delete-comment/'.$pro->comment_id)}}" class="active" ui-toggle-class=""><i
                                        class="fa fa-times text-danger text"></i></a>
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
                        {{$comment1->links()}}
                    </div>
                </div>
            </footer>
        </div>
    </div>

@endsection



