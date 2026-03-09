<button type="button" class="btn btn-success  " data-bs-toggle="modal" data-bs-target="#addCategory">
    + Add Product
</button>

<!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalXlLabel">Add Product</h1><button type="button"
                    class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card" style="background-color:rgb(168, 221, 221)">
                    <div class="card-body">
                        <button type="button" class="btn btn-light">Primary Information</button>
                        <button type="button" class="btn btn-light">Ecommerce</button>

                    </div>
                </div>
                <form action="/admin/product" method="post" enctype="multipart/form-data" onsubmit="check()">
                    @csrf
                    <div class="row mx-2" style="border:1px solid green">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <span class="text-danger" id="productNameError"></span>
                                <input type="text" id="productName" name="productName" placeholder="Product Name"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="hsn">HSN Code</label>
                                <span class="text-danger" id="hsnError"></span>
                                <input type="text" id="hsn" name="hsn" placeholder="HSN Code" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="productWeight">Product Weight</label>
                                <span class="text-danger" id="productWeightError"></span>
                                <input type="text" id="productWeight" name="productWeight" placeholder="Product Weight"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="categoryId">Category</label>

                                <select class="form-select form-control" aria-label="Default select example"
                                    name="categoryId">
                                    @foreach ($category as $data)
                                        <option value="{{ $data->category_id  }}">{{$data->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="subCategoryId">Sub Category</label>

                                <select class="form-select form-control" aria-label="Default select example"
                                    name="subCategoryId">
                                    @foreach ($subcategory as $data)
                                        <option value="{{ $data->sub_category_id}}">{{$data->sub_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="tax">Tax %</label>
                                <select class="form-select form-control" aria-label="Default select example" name="tax">
                                    @foreach ($tax as $data)
                                        <option value="{{ $data->tax_id  }}">{{$data->tax_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="unitId">Unit</label>

                                <select class="form-select form-control" aria-label="Default select example"
                                    name="unitId">
                                    @foreach ($unit as $data)
                                        <option value="{{ $data->unit_id  }}">{{$data->unit_name}}</option>
                                    @endforeach
                                </select>
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
                                        <td><input class="form-control" name="barcode" id="barcode"> <span
                                                class="text-danger" id="barcodeError"></span></td>
                                        <td><input class="form-control" name="qrcode" id="qrcode"> <span
                                                class="text-danger" id="qrcodeError"></span></td>
                                        <td><input class="form-control" name="unique_code" id="unique_code"> <span
                                                class="text-danger" id="unique_codeError"></span></td>
                                        <td><input class="form-control" name="mrp" id="mrp" type="number"> <span
                                                class="text-danger" id="mrpError"></span></td>
                                        <td><input class="form-control" name="sale_price" id="sale_price" type="number">
                                            <span class="text-danger" id="salePriceError"></span>
                                        </td>
                                        <td><input class="form-control" name="purchase_price" id="purchase_price"
                                                type="number">
                                            <span class="text-danger" id="purchasePriceError"></span>
                                        </td>
                                        <td><input class="form-control" name="wholesale_price" id="wholesale_price"
                                                type="number"> <span class="text-danger" id="wholesalePriceError"></span>
                                        </td>
                                        <td><input class="form-control" name="distributor_price" id="distributor_price"
                                                type="number"> <span class="text-danger" id="distributorPriceError"></span>
                                        </td>
                                        <td><input class="form-control" name="opening_qty" id="opening_qty"
                                                type="number">
                                            <span class="text-danger" id="openingQtyError"></span>
                                        </td>
                                        <td><input class="form-control" name="opening_value" id="opening_value"
                                                type="number">
                                            <span class="text-danger" id="openingValueError"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="productImage">Product Image</label>
                                    <input type="file" id="productImage" name="productImage[]" multiple class="form-control">
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
    </div>
</div>

<script>
    function check() {

        var productName = document.getElementById("productName").value;
        var error = document.getElementById("productNameError");

        var hsn = document.getElementById("hsn").value;
        var hsnError = document.getElementById("hsnError");

        var productWeight = document.getElementById("productWeight").value;
        var productWeightError = document.getElementById("productWeightError");

        var barcode = document.getElementById("barcode").value;
        var barcodeError = document.getElementById("barcodeError");

        var qrcode = document.getElementById("qrcode").value;
        var qrcodeError = document.getElementById("qrcodeError");

        var unique_code = document.getElementById("unique_code").value;
        var unique_codeError = document.getElementById("unique_codeError");

        var mrp = document.getElementById("mrp").value;
        var mrpError = document.getElementById("mrpError");

        var sale_price = document.getElementById("sale_price").value;
        var sale_priceError = document.getElementById("sale_priceError");

        var purchase_price = document.getElementById("purchase_price").value;
        var purchase_priceError = document.getElementById("purchase_priceError");

        var wholesale_price = document.getElementById("wholesale_price").value;
        var wholesale_priceError = document.getElementById("wholesale_priceError");

        var distributor_price = document.getElementById("distributor_price").value;
        var distributor_priceError = document.getElementById("distributor_priceError");

        var opening_qty = document.getElementById("opening_qty").value;
        var opening_qtyError = document.getElementById("opening_qtyError");

        var opening_value = document.getElementById("opening_value").value;
        var opening_valueError = document.getElementById("opening_valueError");

        var productImage = document.getElementById("productImage").value;
        var imageerror = document.getElementById("productImageError");

        if (productName.trim() == "") {
            event.preventDefault();
            error.innerHTML = "Product Name is Required";
            return false;
        }
        if (hsn.trim() == "") {
            event.preventDefault();
            hsnError.innerHTML = "HSN Code is Required";
            return false;
        }
        if (productWeight.trim() == "") {
            event.preventDefault();
            productWeightError.innerHTML = "Product Weight is Required";
            return false;
        }

        if (barcode.trim() == "") {
            event.preventDefault();
            barcodeError.innerHTML = "Barcode is Required";
            return false;
        }
        if (qrcode.trim() == "") {
            event.preventDefault();
            qrcodeError.innerHTML = "QR Code is Required";
            return false;
        }
        if (unique_code.trim() == "") {
            event.preventDefault();
            unique_codeError.innerHTML = "Unique Code is Required";
            return false;
        }
        if (mrp.trim() == "") {
            event.preventDefault();
            mrpError.innerHTML = "MRP is Required";
            return false;
        }
        if (sale_price.trim() == "") {
            event.preventDefault();
            sale_priceError.innerHTML = "Sale Price is Required";
            return false;
        }
        if (purchase_price.trim() == "") {
            event.preventDefault();
            purchase_priceError.innerHTML = "Purchase Price is Required";
            return false;
        }
        if (wholesale_price.trim() == "") {
            event.preventDefault();
            wholesale_priceError.innerHTML = "Wholesale Price is Required";
            return false;
        }
        if (distributor_price.trim() == "") {
            event.preventDefault();
            distributor_priceError.innerHTML = "Distributor Price is Required";
            return false;
        }
        if (opening_qty.trim() == "") {
            event.preventDefault();
            opening_qtyError.innerHTML = "Opening Quantity is Required";
            return false;
        }
        if (opening_value.trim() == "") {
            event.preventDefault();
            opening_valueError.innerHTML = "Opening Value is Required";
            return false;
        }
        if (productImage.trim() == "") {
            event.preventDefault();
            imageerror.innerHTML = "Product Image is Required";
            return false;
        }
        else {
            error.innerHTML = "";
            hsnError.innerHTML = "";
            productWeightError.innerHTML = "";
            qrcodeError.innerHTML = "";
            barcodeError.innerHTML = "";
            unique_codeError.innerHTML = "";
            mrpError.innerHTML = "";
            sale_priceError.innerHTML = "";
            purchase_priceError.innerHTML = "";
            wholesale_priceError.innerHTML = "";
            distributor_priceError.innerHTML = "";
            opening_qtyError.innerHTML = "";
            opening_valueError.innerHTML = "";
            imageerror.innerHTML = "";


            return true;
        }
    }

</script>