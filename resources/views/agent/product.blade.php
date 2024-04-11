@include('agent.includes.header')
@include('agent.includes.sidenav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sub Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sub Product</li>
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
                        <form id="block-validate" method="post" action="/agent/addproduct"
                            enctype="multipart/form-data" >
                            @csrf

                            <input type="hidden" value="{{ session('user_id') }}" name="agid">
                            <div class="form-group" style="display: flex;">
                                <label class="control-label col-lg-4">Select Product</label>
                                <div class="col-lg-4">
                                    <select id="productDropdown" name="pid" class="form-control"
                                        onchange="populateSubProducts()" required>
                                        <option value="" disabled selected>Select a product</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="display: flex;">
                                <label class="control-label col-lg-4">Select Sub-Product:</label>
                                <div class="col-lg-4">
                                    <select id="subProductDropdown" name="spid" class="form-control" required>
                                        <option value="" disabled selected>Select a sub-product</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group" style="text-align:center;">
                                <input type="submit" value="Submit" class="btn btn-primary" name="btn_submit">
                            </div>

                        </form>
                    </div>

                    <!-- Display Subproduct List -->
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title bg-transparent text-center">Product List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="mt-2 table">
                                <thead>
                                    <tr>
                                        <th>Sr NO</th>
                                        <th>Product Name</th>
                                        <th>SubProdcut Name</th>
                                        <th>Image</th>
                                        
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $srNo = 1;
                                    @endphp
                                    @foreach ($agent_product as $p)
                                        <tr>
                                            <td>{{ $srNo++ }}</td>
                                            <td>{{ $p->product->product_name }}</td>
                                            <td>{{ $p->subproduct->subproduct_name }}</td>


                                            <td><img src="{{ asset('uploads/' . $p->subproduct->image) }}"
                                                    alt="Subproduct Image" style="width: 50px;"></td>
                                            
                                            <td>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $p->subproduct->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Assuming you have a variable 'productsData' containing your products and sub-products data
    var productsData = <?php echo json_encode($products); ?>;

    var productDropdown = document.getElementById('productDropdown');
    var subProductDropdown = document.getElementById('subProductDropdown');

    // Populate the products dropdown
    productsData.forEach(function(product) {
        var option = document.createElement('option');
        option.value = product.id;
        option.text = product.product_name;
        productDropdown.add(option);
    });

    // Function to populate the sub-products dropdown based on the selected product
    function populateSubProducts() {
        var selectedProductId = productDropdown.value;

        // Clear existing options
        while (subProductDropdown.options.length > 1) {
            subProductDropdown.remove(1);
        }

        // Find the selected product in the data
        var selectedProduct = productsData.find(function(product) {
            return product.id == selectedProductId;
        });

        // Populate sub-products based on the selected product
        if (selectedProduct && selectedProduct.sub_products) {
            selectedProduct.sub_products.forEach(function(subProduct) {
                var option = document.createElement('option');
                option.value = subProduct.id;
                option.text = subProduct.subproduct_name;
                subProductDropdown.add(option);
            });
        }
    }
</script>



<!-- Delete Modal -->
@foreach ($agent_product as $p)
    <div class="modal fade" id="deleteModal{{ $p->subproduct->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $p->subproduct->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $p->subproduct->id }}">Delete Subproduct</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add your delete confirmation message here -->
                    <!-- Example: -->
                    <p>Are you sure you want to delete the subproduct "{{ $p->subproduct->subproduct_name }}"?</p>
                </div>
                <div class="modal-footer">
                    <form action="/agent/product/delete/{{ $p->id }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@include('agent.includes.footer');
