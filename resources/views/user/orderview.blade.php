@include('user.includes.header')
@include('user.includes.nav')

<style>
    .table tbody tr td {
        text-align: end !important;
        vertical-align: top !important;
        padding: 0.75rem !important;
        border: 1px solid transparent !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
    }
</style>

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Farmer Bills</span></p>
                <h1 class="mb-0 bread">Bills View</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section" style="padding: 3em">
    <div class="container" style="width: 100%">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- Display Order Details -->
                    <div class="card mt-5">
                        
                        <div class="card-body" id="printContent">
                            <table class="mt-2 table">
                                <thead>
                                    <tr>
                                        <th colspan="5" style="padding-bottom: 10px; font-size: 30px; text-align: center;">
                                            Smart Farming
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Agent Name</b>: {{ $orders[0]->first_name }} {{ $orders[0]->last_name }}</td>
                                        <td colspan="2"><b>Mobile</b>: {{ $orders[0]->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Invoice No</b>: {{ $orders[0]->id }}</td>
                                        <td colspan="2"><b>Date</b>: {{ $orders[0]->created_at }}</td>
                                    </tr>
                                    <tr><th colspan="5"></th></tr>
                                    <tr>
                                        <th>Sr NO</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $srNo = 1;
                                    @endphp
                                    @foreach ($orderProducts as $product)
                                        <tr>
                                            <td>{{ $srNo++ }}</td>
                                            <td>{{ $product->Subproduct->subproduct_name }}</td>
                                            <td>{{ $product->qty }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->total_price }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" style="text-align: end;">Total Bill Amount: {{ $orders[0]->total_amount }}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            
                        </div>
                        <div style="width: 100%;display: flex;justify-content: center;padding: 5px;">
                            <button style="width: 50%;" id="printbutton" class="btn-sm btn btn-primary">Print</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('user.includes.footer')

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
