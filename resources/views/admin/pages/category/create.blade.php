<button type="button" class="btn btn-success  " data-bs-toggle="modal" data-bs-target="#addCategory">
    + Add Category
</button>

<!-- Modal -->
<div class="modal fade " id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">

        <form action="/admin/category" method="post" enctype="multipart/form-data" onsubmit="check()">

            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mx-2">
                        <div class="form-group has-success">
                            <label for="name">Category Name</label>
                            <small id="nameError" style="color:red;"></small>
                            <input type="text" id="name" name="categoryName" placeholder="Category Name"
                                class="form-control" >
                        </div>
                    </div>
                    <div class="row mx-2">

                        <div class="form-group">
                            <div col-md-6>
                                <label for="successInput">Select New Category Image</label>
                                <input type="file" name="categoryImage" id="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">

                            <div col-md-6>
                                <label for="successInput">Select New Category Banner
                                    Image</label>
                                <input type="file" name="categoryBannerImage" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>

        </form>


    </div>
</div>
<script>
    function check() {
        var categoryName = document.getElementById("name").value;
        var error = document.getElementById("nameError");

        if (categoryName.trim() == "") {
            event.preventDefault();
            error.innerHTML = "Category Name is Required";
            return false;
        } else {
            error.innerHTML = "";
            return true;
        }
    }
</script>