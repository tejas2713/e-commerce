<div class="modal fade" id="editSubCategory" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Sub Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="/admin/subCategory/edit" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="editsubCategoryId" id="subCategoryId">

                    <div class="mb-3">
                        <label>Category</label>
                        <select name="editcategoryId" id="editcategoryId" class="form-select">
                            @foreach ($category as $data)
                                <option value="{{ $data->category_id }}">
                                    {{ $data->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Sub Category Name</label>
                        <input type="text"
                               name="editSubCategoryName"
                               id="editSubCategoryName"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Sub Category Image</label>
                        <input type="file"
                               name="editsubCategoryImage"
                               class="form-control">
                    </div>

                    <div class="text-end">
                        <button type="reset" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>

                        <button type="submit"
                            class="btn btn-primary">Save Changes</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>