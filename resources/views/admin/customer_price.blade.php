@include('admin.includes.header')
@include('admin.includes.sidenav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customer Product Price</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Customer Price</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container" style="width: 100%">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- Create Subproduct Form -->
                    <div class="card p-3">
                        <form id="block-validate" method="post" action="/subproducts" enctype="multipart/form-data"
                            novalidate="novalidate">
                            @csrf
                            <div class="form-group" style="display: flex;">
                                <label class="control-label col-lg-4">Select Product</label>
                                <div class="col-lg-4">
                                    <select class="form-control" id="product_id" name="product_id">
                                        <option value="0" selected>Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Display Subproduct List -->
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title bg-transparent text-center">Subproduct List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="mt-2 table">
                                <thead>
                                    <tr>
                                        <th>Sr NO</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Crop Details</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Edit</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id="subProductsBody">
                                    {{-- Sub-products will be appended here --}}
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModals">Edit Price</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editPriceForm" method="post" action="/cppriceupdate" >
                    @csrf
                    <div class="form-group">
                        <label for="subproduct_name">Subproduct Name:</label>
                        <input type="text" class="form-control" id="subproduct_name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="subproduct_price"> Price:</label>
                        <input type="text" class="form-control" id="subproduct_price" name="subproduct_price" required>
                    </div>
                    <input type="hidden" id="editProductId" value="" name="product_id">
                    <input type="hidden" id="editSubProductId" value=""  name="subproduct_id">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
@include('admin.includes.footer');



<script>
    var subProducts;
    $(document).ready(function () {
        // Event handler for product selection
        $('#product_id').change(function () {
            // Get the selected product ID
            var selectedProductId = $(this).val();

            // Find the selected product data in the provided JSON array
            var selectedProduct = $.grep(products, function (product) {
                return product.id == selectedProductId;
            })[0];
            subProducts = selectedProduct.sub_products
            // Update the sub-products table with the new data
            updateSubProductsTable(selectedProduct.sub_products);
        });

        

        // Function to update the sub-products table
        function updateSubProductsTable(subProducts) {
            // Clear the existing table body
            $('#subProductsBody').empty();

            // Loop through the received sub-products and append rows to the table
            $.each(subProducts, function (index, subProduct) {
                var row = '<tr>' +
                    '<td>' + (index + 1) + '</td>' +
                    '<td>' + subProduct.subproduct_name + '</td>' +
                    '<td>' + subProduct.subproduct_description + '</td>' +
                    '<td>' + subProduct.product_crop_details + '</td>' +
                    '<td><img src="' + '/uploads/' + subProduct.image + '" alt="Subproduct Image" style="width: 50px;"></td>' +
                    '<td>' + subProduct.price + '</td>' +
                    '<td><button class="btn btn-primary btn-sm edit-btn" data-subproduct-id="' + subProduct.id + '">Edit</button></td>' +
                    '</tr>';

                // Append the row to the table body
                $('#subProductsBody').append(row);
            });
        }
        $(document).on('click', '.edit-btn', function () {
            // Get the selected sub-product ID
           // $('#editModal').modal('show');
            var subProductId = $(this).data('subproduct-id');
            console.log("subProductId",subProductId)
            // Find the selected sub-product data in the provided JSON array
            var selectedSubProduct = $.grep(subProducts, function (subProduct) {
                return subProduct.id == subProductId;
            })[0];
            console.log("selectedSubProduct",selectedSubProduct)

            // Populate the modal with sub-product data
            $('#editModal').modal('show');
            $('#editModal #subproduct_name').val(selectedSubProduct.subproduct_name);
            $('#editModal #subproduct_price').val(selectedSubProduct.price);
            $('#editModal #editProductId').val(selectedSubProduct.product_id);
            $('#editModal #editSubProductId').val(selectedSubProduct.id);
        });
    });

    // The product data provided in the question
    var products = {!! json_encode($products) !!};
</script>

