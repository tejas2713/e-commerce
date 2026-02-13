<button type="button" class="btn btn-success  " data-bs-toggle="modal" data-bs-target="#addCategory">
    + Add Tax
</button>

<!-- Modal -->
<div class="modal fade " id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Tax</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/tax" method="post">
                    @csrf
                    <div class="row mx-2">
                        <div class="form-group has-success">
                            <label for="successInput">Tax Name</label>
                            <input type="text" id="successInput" name="taxName" placeholder="Tax Name"
                                class="form-control">
                        </div>
                        <div class="form-group has-success">
                            <label for="successInput">Tax Percentage</label>
                            <input type="number" id="successInput" name="taxPer" placeholder="Tax Percentage"
                                class="form-control">
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
</div>