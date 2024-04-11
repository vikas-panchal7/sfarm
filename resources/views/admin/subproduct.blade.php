@include('admin.includes.header')
@include('admin.includes.sidenav')
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
    <h1>  <center>
              @if(session('status'))

              <h6 style="color:red ; font-size:10px">{{session('status')}}</h6>
              
              @endif
              </center></h1>
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
                                        <option value="">Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                    <h6 style="color:red ; font-size:15px">@error('product_id'){{$message}}@enderror</h6>
                                </div>
                            </div>
                            <div class="form-group" style="display: flex;">
                                <label class="control-label col-lg-4">SubproductName</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" id="subproduct_name"
                                        name="subproduct_name" placeholder="Enter subproduct name" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required" >
                                        <h6 style="color:red ; font-size:15px">@error('subproduct_name'){{$message}}@enderror</h6>
                                    </div> <br>
                            </div>
                            <div class="form-group" style="display: flex;">
                                <label class="control-label col-lg-4">Subproduct Description</label>
                                <div class="col-lg-4">
                                    <textarea class="form-control" id="subproduct_description" name="subproduct_description"
                                        placeholder="Enter subproduct description" ></textarea>
                                        <h6 style="color:red ; font-size:15px">@error('subproduct_description'){{$message}}@enderror</h6>
                                </div>
                                <br>
                            </div>
                            <div class="form-group" style="display: flex;">
                                <label class="control-label col-lg-4">Product Crop Details</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" id="product_crop_details"
                                        name="product_crop_details" placeholder="Enter product crop details" >
                                        <h6 style="color:red ; font-size:15px">@error('product_crop_details'){{$message}}@enderror</h6>
                                </div>
                                <br>
                            </div>
                            <div class="form-group" style="display: flex;">
                                <label class="control-label col-lg-4">Image</label>
                                <div class="col-lg-4">
                                    <input type="file" class="form-control" id="image" name="image" >
                                    <h6 style="color:red ; font-size:15px">@error('image'){{$message}}@enderror</h6>
                                </div>
                                <br>
                            </div>
                            <div class="form-group" style="text-align:center;">
                                <input type="submit" value="Submit" class="btn btn-primary" name="btn_submit">
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
                                        <th>Action</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subproducts as $key => $subproduct)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $subproduct->subproduct_name }}</td>
                                            <td>{{ $subproduct->subproduct_description }}</td>
                                            <td>{{ $subproduct->product_crop_details }}</td>
                                            <td><img src="{{ asset('uploads/' . $subproduct->image) }}"
                                                    alt="Subproduct Image" style="width: 50px;"></td>
                                            <td>
                                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#editModal{{ $subproduct->id }}">Edit</button>
                                            </td>

                                            <td>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $subproduct->id }}">Delete</button>
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
<!-- Edit Modal -->
@foreach ($subproducts as $subproduct)
    <div class="modal fade" id="editModal{{ $subproduct->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel{{ $subproduct->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $subproduct->id }}">Edit Subproduct -
                        {{ $subproduct->subproduct_name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/subproducts/update/{{ $subproduct->id }}"
                        enctype="multipart/form-data">
                        @csrf
                        

                        <!-- Include fields for editing -->
                        <div class="form-group">
                            <label for="subproduct_name">Subproduct Name</label>
                            <input type="text" class="form-control" id="subproduct_name" name="subproduct_name"
                                value="{{ $subproduct->subproduct_name }}" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required"  required>
                        </div>

                        <div class="form-group">
                            <label for="subproduct_description">Subproduct Description</label>
                            <textarea class="form-control" id="subproduct_description" name="subproduct_description" required>{{ $subproduct->subproduct_description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="product_crop_details">Product Crop Details</label>
                            <input type="text" class="form-control" id="product_crop_details"
                                name="product_crop_details" value="{{ $subproduct->product_crop_details }}" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <img src="{{ asset('uploads/' . $subproduct->image) }}" alt="Current Image"
                                style="width: 100px; margin-top: 10px;" required>
                        </div>

                        <div class="form-group">
                            <label for="product_id">Select Product</label>
                            <select class="form-control" id="product_id" name="product_id" required>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ $product->id == $subproduct->product_id ? 'selected' : '' }}>
                                        {{ $product->product_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- Delete Modal -->
@foreach ($subproducts as $subproduct)
    <div class="modal fade" id="deleteModal{{ $subproduct->id }}" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel{{ $subproduct->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $subproduct->id }}">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the Subproduct - {{ $subproduct->subproduct_name }}?</p>
                </div>
                <div class="modal-footer">
                    <form method="post" action="/subproducts/delete/{{ $subproduct->id }}">
                        @csrf
                       
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@include('admin.includes.footer');
