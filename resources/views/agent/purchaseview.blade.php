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
                        <li class="breadcrumb-item active">Purchase Product Details</li>
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
                        <div class="card-header"
                            style="display: flex;
                        justify-content: space-between;">
                            <h3 class="card-title bg-transparent text-center">Product List</h3>
                            <button id="printbutton" class="btn-sm btn btn-primary">Print</button>
                        </div>
                        <div class="card-body" id="printContent">
                            <table id="example1" class="mt-2 table">

                                <thead>

                                    <tr>
                                        <th colspan="5"
                                            style="
                                       
                                        padding-bottom: 10px;
                                        font-size: 30px;
                                        
                                        text-align: center;
                                        
                                    ">
                                            Smart Farming</th>


                                    </tr>
                                    @foreach ($agentBill as $bill)
                                        <tr>
                                            <td colspan="3"><b>Farmer Name</b>: {{ $bill->farmer->first_name }}
                                                {{ $bill->farmer->last_name }}</td>
                                            <td colspan="2"><b>Mobile</b>: {{ $bill->farmer->contact }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><b>Invoice No</b> : {{ $bill->farmer->id }}</td>
                                            <td colspan="2"><b>Date </b> :{{ Date($bill->created_at) }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="5"></th>
                                        </tr>
                                        <tr>
                                            <th>Sr NO</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                        </tr>
                                    @endforeach
                                </thead>
                                <tbody>

                                    @php
                                        $srNo = 1;
                                    @endphp
                                    @foreach ($agentBillProducts as $p)
                                        <tr>
                                            <td>{{ $srNo++ }}</td>
                                            <td>{{ $p->subProduct->subproduct_name }}</td>
                                            <td>{{ $p->quantity }}</td>
                                            <td>{{ $p->price }}</td>
                                            <td>{{ $p->total_amount }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($agentBill as $bill)
                                    <tr>
                                        <td colspan="5" style="text-align: end;">Amount : {{$bill->total_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align: end">Commissions: {{ intval($bill->total_amount) - intval($bill->bill_amount) }}</td>

                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align: end;">Total Bill Amount: {{$bill->bill_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
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
<script>
    $(document).ready(function() {
        $('#printbutton').click(function() {
            var printContent = document.getElementById('printContent').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;

            window.print();

            // Restore original content
            document.body.innerHTML = originalContent;
        });
    });
</script>
