<div class="col-md-4 cart-steps pl-0">
    <div id="cart-steps-accordion" role="tablist" aria-multiselectable="true">
        <!-- bước số 2: nhập địa chỉ giao hàng  -->
        <div class="card">
            <div class="card-header" role="tab" id="step2header">
                <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#cart-steps-accordion"
                       href="#step2contentid" aria-expanded="true" aria-controls="step2contentid"
                       class="text-uppercase header"><span class="steps">1</span>
                        <span class="label">Địa chỉ giao hàng</span>
                        <i class="fa fa-chevron-right float-right"></i>
                    </a>
                </h5>
            </div>
            <form method="post">
               @csrf
                <div id="step2contentid" class="collapse in" role="tabpanel"
                     aria-labelledby="step2header" class="stepscontent">
                    <div class="card-body">
                        <div class="form-diachigiaohang">
                            <div class="form-label-group">
                                <input type="email" class="form-control shipping_email"
                                       placeholder="Nhập địa chỉ email" name="shipping_email">
                            </div>
                            <div class="form-label-group">
                                <input type="text" class="form-control shipping_name"
                                       placeholder="Nhập tên khách hàng" name="shipping_name">
                            </div>
                            <div class="form-label-group">
                                <input type="text" class="form-control shipping_phone"
                                       placeholder="Nhập số điện thoại" name="shipping_phone">
                            </div>
                            <div class="form-label-group">
                                <input type="text" class="form-control shipping_address"
                                       placeholder="Nhập Địa chỉ giao hàng" name="shipping_address">
                            </div>
                            <div class="form-label-group">
                                                <textarea type="text" class="form-control shipping_notes"
                                                          placeholder="Nhập ghi chú (Nếu có)"
                                                          name="shipping_notes"></textarea>
                            </div>
                            <div class="pttt">
                                <h6 class="header text-uppercase">Chọn phương thức thanh toán</h6>
                                <div class="option mb-2">
                                    <select name="payment_select" class="form-control input-sm m-bot15 payment_select">
                                        <option value="0">Qua chuyển khoản</option>
                                        <option value="1">Tiền mặt</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <a href="{{URL::to('/check-login')}}"
                                   class="btn btn-lg btn-block btn-checkout text-uppercase text-white send_order"
                               style="background: #F5A623">Đặt mua</a>
                            <p class="text-center note-before-checkout">(Vui lòng kiểm tra lại đơn hàng
                                trước khi Đặt Mua)</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {
        $('.send_order').click(function () {
            var shipping_email = $('.shipping_email').val();
            var shipping_name = $('.shipping_name').val();
            var shipping_address = $('.shipping_address').val();
            var shipping_phone = $('.shipping_phone').val();
            var shipping_notes = $('.shipping_notes').val();
            var shipping_method = $('.payment_select').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{url('/confirm-order')}}',
                method: 'POST',
                data: {
                    shipping_email: shipping_email,
                    shipping_name: shipping_name,
                    shipping_address: shipping_address,
                    shipping_phone: shipping_phone,
                    shipping_notes: shipping_notes,
                    shipping_method: shipping_method,
                    _token: _token
                },
                success: function () {
                    alert("đặt hàng thành công");
                }
            });
        });
    })
    ;


</script>
