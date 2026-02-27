<div class="col-md-6 d-flex justify-content-end">

    <button type="button" class="btn btn-success  " data-bs-toggle="modal" data-bs-target="#addCategory">
        + Add Sub Category
    </button>
</div>

<!-- Modal -->
<div class="modal fade " id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Sub Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/subCategory" method="post" enctype="multipart/form-data" onsubmit="check()">
                    @csrf
                    <div class="row mx-2">
                        <div class="form-group has-success">
                            <label for="category">Category</label>
                            <small id="categoryNameError" style="color:red;"></small>
                            <select class="form-select form-control" aria-label="Default select example"
                                name="categoryId">
                                @foreach ($category as $data)
                                    <option value="{{ $data->category_id  }}">{{$data->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group has-success">
                            <label for="subCategoryName">Sub Category Name</label>
                            <small id="subCategoryNameError" style="color:red;"></small>
                            <input type="text" id="subCategoryName" name="subCategoryName"
                                placeholder="Sub Category Name" class="form-control">
                        </div>
                    </div>
                    <div class="row mx-2">

                        <div class="form-group">
                            <div col-md-6>
                                <label for="subCategoryImage">Sub Category Image</label>
                                <small id="subCategoryImageError" style="color:red;"></small>
                                <input type="file" name="subCategoryImage" id="subCategoryImage" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="resate" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>



    </div>
</div>

<script>
    function check() {

        var subCategoryName = document.getElementById("subCategoryName").value;
        var error = document.getElementById("subCategoryNameError");
        var subCategoryImage = document.getElementById("subCategoryImage").value;
        var imageerror = document.getElementById("subCategoryImageError");

        if (subCategoryName.trim() == "") {
            event.preventDefault();
            error.innerHTML = "Sub Category Name is Required";
            return false;
        }
        if (subCategoryImage.trim() == "") {
            event.preventDefault();
            imageerror.innerHTML = "Sub Category Image is Required";
            return false;
        }
        else {
            error.innerHTML = "";
            imageerror.innerHTML = "";
            return true;
        }
    }

</script>