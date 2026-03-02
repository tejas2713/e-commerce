@extends("admin.layout.master")
@section("content")
    <div class="page-inner">

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header  ">
                        <div class="row">


                            <div class="col-md-6 card-title ">Order</div>
                            <!-- Button trigger modal -->

                        </div>


                    </div>
                    <div class="card-body">
                        <table class="table table-head-bg-success bg-opacity-10">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Customwe Name</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Order Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $data)


                                    <tr>
                                        <td>{{ $data->order_master_id }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->order_master_total}}</td>
                                        <td>{{$data->order_master_paymentstatus}}</td>
                                        <td>{{$data->order_master_paymentmethod}}</td>
                                        <td>{{$data->order_master_orderstatus}}</td>



                                        <td>
                                            <div class="d-flex ">
                                                <a href="/admin/order/view/{{ $data->order_master_id }}"><i
                                                        class="fa fa-eye fs-5"></i></a>
                                                <div onclick="editData('{{ $data->order_master_id }}', '{{ $data->order_master_user_id }}', '{{ $data->order_master_total }}', '{{ $data->order_master_paymentstatus }}', '{{ $data->order_master_paymentmethod }}', '{{ $data->order_master_orderstatus }}', '{{ $data->created_at }}')"
                                                    class="mx-2">
                                                    <button type="button" class="bg-transparent border-0"><i
                                                            class="fa-solid fa-pen-to-square text-primary fs-5 "
                                                            data-bs-toggle="modal" data-bs-target="#editorder"></i>
                                                    </button>

                                                </div>
                                                <form action="/admin/order/delete" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="orderMasterId"
                                                        value="{{ $data->order_master_id }}">
                                                    <button class="bg-transparent border-0"> <i
                                                            class="fa-solid fa-trash-alt text-danger fs-5 "></i></button>

                                                </form>
                                            </div>
                                        </td>


                                    </tr>

                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("admin.pages.order.edit")
    <script>
        function editData(orderId, userId, totalAmount, paymentStatus, paymentMethod, orderStatus, orderDate) {
            document.getElementById("orderDate").value = orderDate;
            document.getElementsByName("customer_name")[0].value = userId;
            document.getElementsByName("total_amount")[0].value = totalAmount;
            document.getElementsByName("payment_status")[0].value = paymentStatus;
            document.getElementsByName("payment_method")[0].value = paymentMethod;
            document.getElementsByName("order_status")[0].value = orderStatus;
            document.getElementById("orderMasterId").value = orderId;
        }
    </script>
@endsection