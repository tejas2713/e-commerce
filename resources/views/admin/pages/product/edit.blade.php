<button type="button" class="bg-transparent border-0"><i class="fa-solid fa-pen-to-square text-primary fs-5 "
        data-bs-toggle="modal" data-bs-target="#editCategory"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalXlLabel">Edit Product</h1><button type="button"
                    class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card" style="background-color:rgb(168, 221, 221)">
                    <div class="card-body">
                        <button type="button" class="btn btn-light">Primary Information</button>
                        <button type="button" class="btn btn-light">Ecommerce</button>

                    </div>
                </div>

                <div class="row mx-2" style="border:1px solid green">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" id="name" name="categoryName" placeholder="Category Name"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">HSN Code</label>
                            <input type="text" id="name" name="categoryName" placeholder="Category Name"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Product Weight</label>
                            <input type="text" id="name" name="categoryName" placeholder="Category Name"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Category</label>
                            <input type="text" id="name" name="categoryName" placeholder="Category Name"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name"> Sub Category</label>
                            <input type="text" id="name" name="categoryName" placeholder="Category Name"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Tax %</label>
                            <input type="text" id="name" name="categoryName" placeholder="Category Name"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Unit</label>
                            <input type="text" id="name" name="categoryName" placeholder="Category Name"
                                class="form-control">
                        </div>
                    </div>
                    <div class="card-body" style="background-color:rgb(168, 221, 221)">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>QR Code</th>
                                    <th>Unique Code</th>
                                    <th>MRP</th>
                                    <th>Sale</th>
                                    <th>Purchase</th>
                                    <th>Wholesale</th>
                                    <th>Distributor</th>
                                    <th>OP Qty</th>
                                    <th>OP Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-control" name="barcode"></td>
                                    <td><input class="form-control" name="qrcode"></td>
                                    <td><input class="form-control" name="unique_code"></td>
                                    <td><input class="form-control" name="mrp" type="number"></td>
                                    <td><input class="form-control" name="sale_price" type="number">
                                    </td>
                                    <td><input class="form-control" name="purchase_price" type="number">
                                    </td>
                                    <td><input class="form-control" name="wholesale_price" type="number"></td>
                                    <td><input class="form-control" name="distributor_price" type="number"></td>
                                    <td><input class="form-control" name="opening_qty" type="number">
                                    </td>
                                    <td><input class="form-control" name="opening_value" type="number">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>