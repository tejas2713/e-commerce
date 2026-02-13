<!-- Modal -->
<div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Unit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/unit/edit" method="post">
                @csrf
                <input type="hidden" name="unit_id" id="UnitId">
                <div class="modal-body">
                    <div class="row mx-2">
                        <div class="form-group has-success">
                            <label for="editUnitName">Unit Name</label>
                            <input type="text" id="UnitName" placeholder="Unit Name" name="unitName"
                                class="form-control" value="">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>