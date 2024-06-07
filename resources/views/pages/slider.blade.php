<div id="carouselId" class="carousel slide" data-ride="carousel">
    <ol class="nutcarousel carousel-indicators rounded-circle">
        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
        <li data-target="#carouselId" data-slide-to="1"></li>
        <li data-target="#carouselId" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @foreach($slider as $key=>$value)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <a href="http://localhost/Web_Laravel/product-details/{{$value->product_id}}"><img src="{{asset("public/uploads/product/".$value->slider_image)}}"
                                 class="img-fluid"
                                 style="height: 386px;" width="900px" alt="First slide"></a>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselId" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>
