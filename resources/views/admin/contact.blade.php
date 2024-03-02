@include('admin.includes.header')
@include('admin.includes.sidenav')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Contact</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contacts</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Your Data Here -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title bg-transparent" align="center">Contacts List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="mt-2 table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SrNo</th>
                        <th>Full Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $srNo = 1;
                    @endphp
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $srNo++ }}</td>
                            <td>{{ $contact->full_name }}</td>
                            <td>{{ $contact->contact }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->message }}</td>
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
