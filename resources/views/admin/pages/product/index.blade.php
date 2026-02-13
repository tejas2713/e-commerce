@extends("admin.layout.master")
@section("content")
    <div class="page-inner">

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header  ">
                        <div class="row">


                            <div class="col-md-6 card-title ">Product List</div>
                            <!-- Button trigger modal -->
                            <div class="col-md-6 d-flex justify-content-end">

                                @include("admin.pages.product.create")
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <table class="table table-head-bg-success bg-opacity-10">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">TAX</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">SUB CATEGORY</th>
                                    <th scope="col">PRODUCT STATUS</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $data)


                                    <tr>
                                        <td>{{$data->product_id }}</td>

                                        <td><img src="{{ asset('admin/img/examples/example1.jpeg') }}" alt=""
                                                style="height:100px; width:100px"></td>
                                        <td>{{$data->product_name}}</td>
                                        <td>{{ $data->product_tax }}</td>
                                        <td>{{$data->product_category_id}}</td>
                                        <td>{{$data->product_sub_category_id}}</td>
                                        <td>ACTIVE</td>
                                        <td>
                                            <div class="d-flex ">
                                                @include("admin.pages.product.edit")
                                                <form action="/admin/product/delete" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $data->product_id }}">
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
@endsection