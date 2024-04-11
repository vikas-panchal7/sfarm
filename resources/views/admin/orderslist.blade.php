@include('admin.includes.header')
@include('admin.includes.sidenav')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Your Data Here -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title bg-transparent" align="center">Order List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="mt-2 table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SrNo</th>
                        <th>Name</th>
                        <th>Street Address</th>
                        <th>Town/City</th>
                        <th>Postcode/Zip</th>
                        <th>Phone</th>
                        <th>Email Address</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $srNo = 1;
                    @endphp
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $srNo++ }}</td>
                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                            
                            <td>{{ $order->street_address }}</td>
                            <td>{{ $order->town_city }}</td>
                            <td>{{ $order->postcode_zip }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->email_address }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td>
                                <select class="form-control status-dropdown" id="status{{ $order->id }}" data-order-id="{{ $order->id }}">
                                    <option value="Ordered" @if($order->status == 'Ordered') selected @endif>Ordered</option>
                                    <option value="Processed" @if($order->status == 'Processed') selected @endif>Processed</option>
                                    <option value="Dispatched" @if($order->status == 'Dispatched') selected @endif>Dispatched</option>
                                    <option value="Delivered" @if($order->status == 'Delivered') selected @endif>Delivered</option>
                                </select>
                            </td>
                            
                            <td>{{ $order->created_at }}</td>
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
<script>
    $(document).ready(function() {
        $('.status-dropdown').change(function() {
            console.log("vkjkjbskjfb")
            var orderId = $(this).data('order-id');
            var status = $(this).val();
            
            $.ajax({
                url: '/update-order-status',
                method: 'POST',
                data: {
                    orderId: orderId,
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    toastr.success("Order Status Updated  SuccessFully");
                    console.log(response);
                    location.reload();
                    // Optionally update UI or display a message on success
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    // Handle error
                }
            });
        });
    });
</script>

