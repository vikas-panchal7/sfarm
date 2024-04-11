@include('admin.includes.header')
@include('admin.includes.sidenav')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Customers</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Your Data Here -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title bg-transparent" align="center">Customer List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="mt-2 table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SrNo</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $srNo = 1;
                    @endphp
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $srNo++ }}</td>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->middle_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->gender }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->contact }}</td>

                            {{-- Add more cells as needed --}}
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- Your Data Here -->
<!-- Your Data Here -->
</div>
@include('admin.includes.footer');
