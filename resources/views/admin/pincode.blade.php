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
                        <form id="block-validate" method="post" action="/pincode" novalidate="novalidate">
                            @csrf

                            <div class="form-group" style="display: flex;">
                                <label class="control-label col-lg-4">Pincode</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" id="pincode" name="pincode"
                                        placeholder="Enter pincode" required>
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
                                        <th>Edit</th>
                                        <th>Delete</th>
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
                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $pincode->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Edit Modals -->
                    @foreach ($pincodes as $pincode)
                        <div class="modal fade" id="editModal{{ $pincode->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="editModalLabel{{ $pincode->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $pincode->id }}">Edit Pincode</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Edit Pincode Form -->
                                        <form method="post" action="/pincode/update/{{ $pincode->id }}">
                                            @csrf
                                            

                                            <div class="form-group">
                                                <label for="edit_pincode">Pincode</label>
                                                <input type="text" class="form-control" id="edit_pincode"
                                                    name="pincode" value="{{ $pincode->pincode }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_is_active">Is Active</label>
                                                <select class="form-control" id="edit_is_active" name="is_active">
                                                    <option value="1" {{ $pincode->is_active ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ !$pincode->is_active ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Delete Modals -->
                    @foreach ($pincodes as $pincode)
                        <div class="modal fade" id="deleteModal{{ $pincode->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="deleteModalLabel{{ $pincode->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $pincode->id }}">Delete Pincode</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this pincode?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form method="post" action="/pincode/delete/{{ $pincode->id }}">
                                            @csrf
                                           
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.includes.footer');
