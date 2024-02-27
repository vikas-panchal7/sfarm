@include('admin.includes.header')
@include('admin.includes.sidenav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pincodes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pincodes</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container" style="width: 100%">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- Create Pincode Form -->
                    <div class="card p-3">
                        <form id="block-validate" method="post" action="/pincodes" novalidate="novalidate">
                            @csrf

                            <div class="form-group" style="display: flex;">
                                <label class="control-label col-lg-4">Pincode</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" id="pincode" name="pincode"
                                        placeholder="Enter pincode">
                                </div>
                            </div>

                            <div class="form-group" style="display: flex;">
                                <label class="control-label col-lg-4">Is Active</label>
                                <div class="col-lg-4">
                                    <select class="form-control" id="is_active" name="is_active">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-actions no-margin-bottom" style="text-align:center;">
                                <input type="submit" value="Submit" class="btn btn-primary" name="btn_submit">
                            </div>

                        </form>
                    </div>

                    <!-- Display Pincode List -->
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title bg-transparent text-center">Pincode List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="mt-2 table">
                                <thead>
                                    <tr>
                                        <th>Sr NO</th>
                                        <th>Pincode</th>
                                        <th>Is Active</th>
                                        <th>Action</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pincodes as $key => $pincode)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $pincode->pincode }}</td>
                                            <td>{{ $pincode->is_active ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#editModal{{ $pincode->id }}">Edit</button>
                                            </td>

                                            <td>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $pincode->id }}">Delete</button>
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

@include('admin.includes.footer');
