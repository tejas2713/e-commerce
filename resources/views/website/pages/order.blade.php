@extends("website.layout.master")
@section("content")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Order</h4>
                        <div class="breadcrumb__links">
                            <a href="/master">Home</a>
                            <a href="/master/shop">Shop</a>
                            <span>Order</span>
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
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Total</th>
                                    <th>Payment Status</th>
                                    <th>Payment Method</th>
                                    <th>Order Status</th>
                                    <th>view</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($order as $item)
                                    <tr>
                                    <tr>
                                        <td>{{ $item->order_master_id }}</td>
                                        <td>{{ $item->order_master_total }}</td>
                                        <td>{{ $item->order_master_paymentstatus }}</td>
                                        <td>{{ $item->order_master_paymentmethod }}</td>
                                        <td>{{ $item->order_master_orderstatus }}</td>



                                        <td><a href="/order/view/{{ $item->order_master_id }}"><i
                                                                                    class="fa fa-eye"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- wish list Section End -->
@endsection