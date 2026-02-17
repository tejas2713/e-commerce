@extends("admin.layout.master")
@section("content")
    <div class="page-inner">

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header  ">
                        <div class="row">


                            <div class="col-md-6 card-title ">Sub Category</div>
                            <!-- Button trigger modal -->
                            @include("admin.pages.subCategory.create")
                        </div>


                    </div>
                    <div class="card-body">
                        <table class="table table-head-bg-success bg-opacity-10">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">SUB CATEGORY NAME</th>
                                    <th scope="col">CATEGORY NAME</th>
                                    <th scope="col">SUB CATEGORY IMAGES</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategory as $data)

                                    <tr>
                                        <td>{{$data->sub_category_id}}</td>
                                        <td>{{$data->sub_category_name}}</td>
                                        <td>{{$data->category_id}}</td>
                                        <td><img src="{{ asset('uplode/subCategory/' . $data->sub_category_image) }}" alt=""
                                                style="height:100px; width:100px" class="rounded-4"></td>

                                        <td>
                                            <div class="d-flex ">
                                                <div
                                                    onclick="editData('{{ $data->sub_category_id }}','{{ $data->sub_category_name }}','{{ $data->category_id }}','{{ $data->sub_category_image }}')">
                                                    <button type="button" class="bg-transparent border-0"><i
                                                            class="fa-solid fa-pen-to-square text-primary fs-5 "
                                                            data-bs-toggle="modal" data-bs-target="#editCategory"></i>
                                                    </button>

                                                </div>
                                                <form action="/admin/subCategory/delete" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="subCategoryId"
                                                        value="{{ $data->sub_category_id}}">
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

    @include("admin.pages.subCategory.edit")
    <script>
        function editData(sub_category_id, sub_category_name, category_id, sub_category_image) {
            console.log(sub_category_id);
            console.log(sub_category_name);
            console.log(category_id);
            console.log(sub_category_image);
            document.getElementById("subCategoryId").value = sub_category_id;
            document.getElementById("subCategoryName").value = sub_category_name;
            document.querySelector("select[name='categoryId']").value = category_id;
            document.getElementById("subCategoryImage").value = sub_category_image;

        }
    </script>
@endsection