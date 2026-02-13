@extends("admin.layout.master")
@section("content")
    <div class="page-inner">

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header  ">
                        <div class="row">


                            <div class="col-md-6 card-title ">Unit</div>
                            <!-- Button trigger modal -->
                            <div class="col-md-6 d-flex justify-content-end">
                                @include("admin.pages.unit.create")
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <table class="table table-head-bg-success bg-opacity-10">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">UNIT NAME</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unit as $data)


                                    <tr>
                                        <td>{{ $data->unit_id }}</td>
                                        <td>{{$data->unit_name}}</td>



                                        <td>
                                            <div class="d-flex ">
                                                <div onclick="editData('{{ $data->unit_id }}','{{ $data->unit_name }}')">
                                                    <button type="button" class="bg-transparent border-0"><i
                                                            class="fa-solid fa-pen-to-square text-primary fs-5 "
                                                            data-bs-toggle="modal" data-bs-target="#editCategory"></i>
                                                    </button>

                                                </div>

                                                <form action="/admin/unit/delete" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="unit_id" value="{{ $data->unit_id }}">
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


    @include("admin.pages.unit.edit")
    <script>
        function editData(unit_id, unit_name) {
            console.log(unit_id);
            console.log(unit_name);
            document.getElementById("UnitId").value = unit_id;
            document.getElementById("UnitName").value = unit_name;
        }
    </script>
@endsection