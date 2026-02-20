@extends("website.layout.master")
@section("content")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="/master">Home</a>
                            <a href="/master/shop">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="{{ asset('website/img/shopping-cart/cart-1.jpg')}}" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>T-shirt Contrast Pocket</h6>
                                                <h5>$98.49</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                    <input type="text" value="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">$ 30.00</td>
                                        <form action="/remove-from-cart" method="post">
                                            @csrf
                                            <input type="hidden" name="cartId" value="{{ $item->cart_id  }}">
                                            <td class="cart__close"><button type="submit" class="border-0"><i
                                                        class="fa fa-close"></i></button></td>
                                        </form>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>$ 169.50</span></li>
                            <li>Total <span>$ 169.50</span></li>
                        </ul>
                        <form action="/chackout" method="post">
                            @csrf
                            @foreach ($cart as $item)
                                <input type="hidden" name="productId" value="{{ $item->cart_product_id }}">
                                <input type="hidden" name="price" value="{{ $item->cart_price }}">
                                <input type="hidden" name="quantity" value="{{ $item->cart_quantity }}">
                                <input type="hidden" name="total" value="{{ $item->cart_total }}">
                                <input type="hidden" name="userId" value="{{$item->cart_user_id}}">
                            @endforeach

                            <button type="submit" class="primary-btn btn px-s mx-4">Proceed to checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection