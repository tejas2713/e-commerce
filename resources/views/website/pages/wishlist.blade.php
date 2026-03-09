@extends("website.layout.master")
@section("content")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Wish List</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="/shop">Shop</a>
                            <span>Wish List</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- wish list Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <div class="cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($wishlist as $item)


                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="{{ asset('uplode/product/' . $item->product_image)}}" alt=""
                                                    height="120" width="120">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $item->product_name }}</h6>
                                                <h5>₹{{ $item->product_sale }}</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                    <input type="text" value="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">₹{{ $item->product_sale }}</td>
                                        <form action="/remove-from-wishlist" method="post">
                                            @csrf
                                            <input type="hidden" name="wishlistId" value="{{ $item->wishlist_id  }}">
                                            <td class="cart__close"><button type="submit" class="border-0"><i
                                                        class="fa fa-close"></i></button></td>
                                        </form>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script>
        setTimeout(function () {
            let alert = document.querySelector('.alert');
            if (alert) {
                alert.remove();
            }
        }, 3000);
    </script>
    <!-- wish list Section End -->
@endsection