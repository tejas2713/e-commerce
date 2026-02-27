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
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show text-success" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('Delete'))
                            <div class="alert alert-danger alert-dismissible fade show text-danger" role="alert">
                                {{ session('Delete') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
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

                                        <td><img src="{{ asset('uplode/product/' . $data->product_image) }}" alt=""
                                                style="height:100px; width:100px" class="rounded-4"></td>
                                        <td>{{$data->product_name}}</td>
                                        <td>{{ $data->tax_name }}</td>
                                        <td>{{$data->category_name}}</td>
                                        <td>{{$data->sub_category_name}}</td>
                                        <td>ACTIVE</td>
                                        <td>
                                            <div class="d-flex ">
                                                <div
                                                    onclick="editData('{{ $data->product_id }}','{{ $data->product_name }}','{{ $data->product_hsn }}','{{ $data->product_weight }}')">
                                                    <button type="button" class="bg-transparent border-0"><i
                                                            class="fa-solid fa-pen-to-square text-primary fs-5 "
                                                            data-bs-toggle="modal" data-bs-target="#editProduct"></i>
                                                    </button>

                                                </div>
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
    @include("admin.pages.product.edit")
    <script>
        function editData(product_id, product_name, product_hsn, product_weight) {
            document.getElementById("editproductName").value = product_name;
            document.getElementById("edithsn").value = product_hsn;
            document.getElementById("editproductWeight").value = product_weight;
            document.getElementById("productId").value = product_id;
        }
    </script>
@endsection