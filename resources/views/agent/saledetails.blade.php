@include('agent.includes.header')
@include('agent.includes.sidenav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Purchase</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sale Details</li>
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
                   

                    <!-- Display Subproduct List -->
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title bg-transparent text-center">Sales List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="mt-2 table">
                                <thead>
                                    <tr>
                                        <th>Sr NO</th>
                                        <th>Bill No </th>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>View Product</th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $srNo = 1;
                                    @endphp
                                    @foreach ($agentBills as $p)
                                        <tr>
                                            <td>{{ $srNo++ }}</td>
                                            <td>{{ $p->id }}</td>
                                            <td>{{ $p->farmer->first_name }}  {{ $p->farmer->last_name }}</td>
                                            <td>{{ Date($p->created_at) }}</td>
                                            <td><a class="btn-sm btn btn-info" href="/agent/saledetails?id={{$p->id}}">View</a></td>


                                            {{-- <td><img src="{{ asset('uploads/' . $p->subproduct->image) }}"
                                                    alt="Subproduct Image" style="width: 50px;"></td>
                                            
                                            <td>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $p->subproduct->id }}">Delete</button>
                                            </td> --}}
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



@include('agent.includes.footer');
