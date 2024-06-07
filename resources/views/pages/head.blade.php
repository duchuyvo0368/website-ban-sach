<nav class="navbar navbar-expand-md bg-white navbar-light">
    <div class="container">
        <!-- logo  -->
        <a class="navbar-brand" href="{{URL::to('/trangchu')}}" style="color: #CF111A;"><b>Books</b>.xyz</a>

        <!-- navbar-toggler  -->
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <!-- form tìm kiếm  -->
            <form action="{{URL::to('/product-search')}}" class="form-inline ml-auto my-2 my-lg-0 mr-3" method="post">
                {{csrf_field()}}
                <div class="input-group" style="width: 520px;">
                    <input type="text" name="keywords" class="form-control" aria-label="Small"
                           placeholder="Nhập sách cần tìm kiếm...">
                    <div class="input-group-append">
                        <button type="submit" name="search_items" class="btn" style="background-color: #CF111A; color: white;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- ô đăng nhập đăng ký giỏ hàng trên header  -->
            <ul class="navbar-nav mb-1 ml-auto">
                <div class="dropdown">
                    <li class="nav-item account" type="button" class="btn dropdown" data-toggle="dropdown">
                        <a href="" class="btn btn-secondary rounded-circle">
                            <i class="fa fa-user"></i>
                        </a>
                        <a class="nav-link text-dark text-uppercase" style="display:inline-block">Tài
                            khoản</a>
                    </li>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item nutdangky text-center mb-2" href="{{URL::to('/show-signup')}}">Đăng ký</a>
                        <a class="dropdown-item nutdangnhap text-center" href="{{URL::to('/show-login')}}">Đăng nhập</a>
                        <a class="dropdown-item text-center" style="margin-top: 10px" href="{{URL::to('/log-out')}}">Đăng xuất</a>
                    </div>
                </div>
                <li class="nav-item giohang">
                    <a href="{{URL::to('/cart')}}" class="btn btn-secondary rounded-circle">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                    <a class="nav-link text-dark giohang text-uppercase" href="{{URL::to('/cart')}}"
                       style="display:inline-block">Giỏ
                        Hàng</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
