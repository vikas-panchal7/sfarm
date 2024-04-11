@include('admin.includes.header')
@include('admin.includes.sidenav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <h5>@if(session('success'))
        <div class="alert alert-success" id="flash-message">
            {{ session('success') }}
        </div>
        @endif
    </h5>
    <h1>  <center>
              @if(session('status'))

              <h6 style="color:red ; font-size:10px">{{session('status')}}</h6>
              
              @endif
              </center></h1>
    <div class="container" style="width: 100%">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="card p-3">
                        <form id="block-validate" method="post" action="/product" novalidate="novalidate">
                            @csrf

                            <div class="form-group" style="display: flex;">
                                <label class="control-label col-lg-4">ProductName</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        placeholder="Enter product name" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required" required>
                                        <h6 style="color:red ; font-size:15px">@error('product_name'){{$message}}@enderror</h6>

                                </div> <br>

                            </div>

                            <div class="form-actions no-margin-bottom" style="text-align:center;">
                                <input type="submit" value="Submit" class="btn btn-primary  " name="btn_submit">
                            </div>

                        </form>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title bg-transparent text-center">Product List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="mt-2 table">
                                <thead>
                                    <tr>
                                        <th>Sr NO</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#editModal{{ $product->id }}">Edit</button>
                                            </td>

                                            <td>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $product->id }}">Delete</button>
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

@foreach ($products as $product)
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $product->id }}">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add form elements here for editing the product -->
                    <!-- For example, you can have input fields similar to the ones in your create form -->
                    <form action="/product/update/{{ $product->id }}" method="post">
                        @csrf
                        
                        <!-- Your input fields for editing the product go here -->
                        <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required" required>
                        <!-- Add other fields as needed -->

                        <button type="submit" class="mt-2 btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@foreach ($products as $product)
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add a confirmation message here -->
                    <p>Are you sure you want to delete the product "{{ $product->product_name }}"?</p>
                    <!-- Add a form for submitting the delete request -->
                    <form action="/product/delete/{{ $product->id }}" method="post">
                        @csrf

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach


@include('admin.includes.footer');
