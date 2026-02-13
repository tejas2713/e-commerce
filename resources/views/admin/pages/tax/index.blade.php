@extends("admin.layout.master")
@section("content")
    <div class="page-inner">

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header  ">
                        <div class="row">


                            <div class="col-md-6 card-title ">Tax</div>
                            <!-- Button trigger modal -->
                            <div class="col-md-6 d-flex justify-content-end">

                                @include("admin.pages.tax.create")
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <table class="table table-head-bg-success bg-opacity-10">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">TAX NAME</th>
                                    <th scope="col">TAX PERCENTAGE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tax as $data)


                                    <tr>
                                        <td>{{ $data->tax_id }}</td>
                                        <td>{{$data->tax_name}}</td>
                                        <td>{{$data->tax_per}}%</td>

                                        <td>
                                            <div class="d-flex ">
                                                <div
                                                    onclick="editData('{{ $data->tax_id }}','{{ $data->tax_name }}','{{ $data->tax_per }}')">
                                                    <button type="button" class="bg-transparent border-0"><i
                                                            class="fa-solid fa-pen-to-square text-primary fs-5 "
                                                            data-bs-toggle="modal" data-bs-target="#editCategory"></i>
                                                    </button>

                                                </div>
                                                <form action="/admin/tax/delete" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="tax_id" value="{{ $data->tax_id }}">
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
    @include("admin.pages.tax.edit")
    <script>
        function editData(tax_id, tax_name, tax_per) {
            console.log(tax_id);
            console.log(tax_name);
            console.log(tax_per);
            document.getElementById("taxId").value = tax_id;
            document.getElementById("taxName").value = tax_name;
            document.getElementById("taxPer").value = tax_per;
        }
    </script>
@endsection