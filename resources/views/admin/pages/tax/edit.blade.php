<!-- Modal -->
<div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Tax</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/tax/edit" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="tax_id" id="taxId">
                    <div class="row mx-2">
                        <div class="form-group has-success">
                            <label for="edittaxName">Tax Name</label>
                            <input type="text" id="edittaxName" placeholder="Tax Name" name="edittaxName" class="form-control">
                        </div>
                        <div class="form-group has-success">
                            <label for="edittaxPer">Tax Percentage</label>
                            <input type="number" id="edittaxPer" placeholder="Tax Percentage"name="edittaxPer" class="form-control">
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