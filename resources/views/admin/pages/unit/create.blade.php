<button type="button" class="btn btn-success  " data-bs-toggle="modal" data-bs-target="#addCategory">
    + Add Unit
</button>

<!-- Modal -->
<div class="modal fade " id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">
            <form action="/admin/unit" method="post">
                @csrf

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Unit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mx-2">
                        <div class="form-group has-success">
                            <label for="successInput">Unit Name</label>
                            <input type="text" id="successInput" name="unitName" placeholder="Unit Name"
                                class="form-control">
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