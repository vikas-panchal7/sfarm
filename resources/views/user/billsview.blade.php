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
                                            <td colspan="3"><b>Agent Name</b>: {{ $bill->agent->first_name }}
                                                {{ $bill->agent->last_name }}</td>
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