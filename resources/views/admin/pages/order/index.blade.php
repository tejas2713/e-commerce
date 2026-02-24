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
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->order_master_total}}</td>
                                        <td>{{$data->order_master_paymentstatus}}</td>
                                        <td>{{$data->order_master_paymentmethod}}</td>
                                        <td>{{$data->order_master_orderstatus}}</td>



                                        <td>
                                            <div class="d-flex ">

                                                <button type="button" class="bg-transparent border-0"><i
                                                        class="fa-solid fa-pen-to-square text-primary fs-5 " data-bs-toggle="modal"
                                                        data-bs-target="#editOrder"></i>
                                                </button>



                                                <a href="/admin/order/view/{{ $data->order_master_id }}"><i
                                                        class="fa fa-eye"></i></a>
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
@endsection