<!-- Modal -->
<div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit
                    Category
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/category/edit" method="post" enctype="multipart/form-data" onclick="check()">
                @csrf
                <input type="hidden" name="category_id" id="categoryId">
                <div class="modal-body">
                    <div class="row mx-2">
                        <div class="form-group">
                            <label for="categoryName">Category Name</label>
                            <small id="nameError" style="color:red;"></small>
                            <input type="text" id="categoryName" placeholder="Category Name" name="categoryName"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row mx-2">

                        <div class="form-group">
                            <div col-md-6>
                                <label for="categoryImage">Select New Category
                                    Image</label>
                                <input type="file" name="categoryImage" id="categoryImage" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">

                            <div col-md-6>
                                <label for="categoryBannerImage">Select New Category Banner
                                    Image</label>
                                <input type="file" name="categoryBannerImage" id="categoryBannerImage"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function check() {
        var categoryName = document.getElementById("categoryName").value;
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