<!-- Modal -->


<div class="modal fade " id="editCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/subCategory/edit" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="subCategoryId" id="subCategoryId">
                    <div class="row mx-2">
                        <div class="form-group has-success">
                            <label for="categoryId">Category</label>
                            <select id="categoryId" class="form-select form-control" aria-label="Default select example"
                                name="categoryId">
                                @foreach ($category as $data)
                                    <option   value="{{ $data->category_id  }}">
                                        {{$data->category_name}}
                                        
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group has-success">
                            <label for="subCategoryName">Sub Category Name</label>
                            <input type="text" id="subCategoryName" name="editSubCategoryName"
                                placeholder="Sub Category Name" class="form-control">
                        </div>
                    </div>
                    <div class="row mx-2">

                        <div class="form-group">
                            <div col-md-6>
                                <label for="subCategoryImage">Sub Category Image</label>
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