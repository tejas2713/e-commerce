@extends("website.layout.master")
@section("content")
    <!-- Hero Section Begin -->
    @include('website.component.carousel')
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    @include('website.component.banner')
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Best Sellers</li>
                        <li data-filter=".new-arrivals">New Arrivals</li>
                        <li data-filter=".hot-sales">Hot Sales</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                @foreach ($product as $item)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix ">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('website/img/product/product-1.jpg') }}">
                                <span class="label">New</span>
                                <ul class="product__hover">
                                    <li><a href="#"><img src="{{ asset('website/img/icon/heart.png') }}" alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('website/img/icon/compare.png') }}" alt="">
                                            <span>Compare</span></a></li>
                                    <li><a href="#"><img src="{{ asset('website/img/icon/search.png') }}" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>Piqué Biker Jacket</h6>
                                <a href="#" class="add-cart">+ Add To Cart</a>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>$67.24</h5>
                                <div class="product__color__select">
                                    <label for="pc-1">
                                        <input type="radio" id="pc-1">
                                    </label>
                                    <label class="active black" for="pc-2">
                                        <input type="radio" id="pc-2">
                                    </label>
                                    <label class="grey" for="pc-3">
                                        <input type="radio" id="pc-3">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    @include('website.component.category')
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    @include('website.component.instagram')
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    @include('website.component.blog')
    <!-- Latest Blog Section End -->
@endsection