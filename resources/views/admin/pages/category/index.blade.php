@extends("admin.layout.master")
@section("content")
    <div class="page-inner">

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header  ">
                        <div class="row">


                            <div class="col-md-6 card-title ">Product Category</div>
                            <!-- Button trigger modal -->
                            <div class="col-md-6 d-flex justify-content-end">

                                @include("admin.pages.category.create")
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <table class="table table-head-bg-success bg-opacity-10">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">CATEGORY NAME</th>
                                    <th scope="col">CATEGORY IMAGES</th>
                                    <th scope="col">CATEGORY BANNER IMAGES</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $data)
                                    <tr>
                                        <td>{{ $data->category_id }}</td>
                                        <td>{{ $data->category_name }}</td>
                                        <td><img src="{{ asset('admin/img/examples/example1.jpeg') }}" alt=""
                                                style="height:100px; width:100px" class="rounded-4"></td>
                                        <td>
                                            <img src="{{ asset('admin/img/examples/example1.jpeg') }}" alt=""
                                                style="height:100px; width:100px" class="rounded-4">
                                        </td>

                                        <td>
                                            <div class="d-flex ">
                                                <div
                                                    onclick="editData('{{ $data->category_id }}','{{ $data->category_name }}','{{ $data->category_image}}','{{ $data->category_banner_image}}')">
                                                    <button type="button" class="bg-transparent border-0"><i
                                                            class="fa-solid fa-pen-to-square text-primary fs-5 "
                                                            data-bs-toggle="modal" data-bs-target="#editCategory"></i>
                                                    </button>

                                                </div>
                                                <form action="/admin/category/delete" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="category_id" value="{{ $data->category_id }}">
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
    @include("admin.pages.category.edit")

    <script>
        function editData(category_id, category_name, category_image, category_banner_image) {
            console.log(category_id);
            console.log(category_name);
            console.log(category_image);
            console.log(category_banner_image);
            document.getElementById("categoryId").value = category_id;
            document.getElementById("categoryName").value = category_name;
            document.getElementById("categoryImage").value = category_image;
            document.getElementById("categoryBannerImage").value = category_banner_image;
        }
    </script>
@endsection