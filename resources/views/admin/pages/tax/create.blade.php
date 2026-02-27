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
                <form action="/admin/tax" method="post" onsubmit="check()">
                    @csrf
                    <div class="row mx-2">
                        <div class="form-group has-success">
                            <label for="taxName">Tax Name</label>
                            <small id="taxNameError" style="color:red;"></small>
                            <input type="text" id="taxName" name="taxName" placeholder="Tax Name" class="form-control">

                        </div>
                        <div class="form-group has-success">
                            <label for="taxPer">Tax Percentage</label>
                            <small id="taxPerError" style="color:red;"></small>
                            <input type="number" id="taxPer" name="taxPer" placeholder="Tax Percentage"
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


<script>
    function check() {

        var taxName = document.getElementById("taxName").value;
        var error = document.getElementById("taxNameError");
        var taxPer = document.getElementById("taxPer").value;
        var taxPerError = document.getElementById("taxPerError");

        if (taxName.trim() == "") {
            event.preventDefault();
            error.innerHTML = "Tax Name is Required";
            return false;
        }
        if (taxPer.trim() == "") {
            event.preventDefault();
            taxPerError.innerHTML = "Tax Percentage is Required";
            return false;
        }
        else {
            error.innerHTML = "";
            taxPerError.innerHTML = "";
            return true;
        }
    }

</script>