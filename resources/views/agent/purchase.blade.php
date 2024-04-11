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
                        <li class="breadcrumb-item active">Purchase</li>
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
                    <div class="d-flex justify-content-end p-3">
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFarmerModal">New Farmer</button>
                        </div>
                    </div>
                   
                    <div class="card p-3">
                        <form id="block-validate" method="post" action="/agent/purchase">
                            @csrf
                            <input type="hidden" value="{{ session('user_id') }}" name="agent_id">
                            <div class="form-group" style="display: flex;">
                                <label class="control-label col-lg-4">Select Farmer</label>
                                <div class="col-lg-4">
                                    <select class="form-control" name="farmer_id" style="text-transform:capitalize;" onchange="validate('info',this.value)" required=""> 
                                      <option value=""> Select Farmer</option>
                                        @foreach($farmers as $farmer)
                                        <option value="{{$farmer->id}}">{{$farmer->first_name}}  {{$farmer->middle_name}}   {{$farmer->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    </div>
                    
                    <!-- Display Subproduct List -->
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title bg-transparent text-center">Product List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="mt-2 table">
                                <thead>
                                    <tr>
                                        <th>Product </th>
                                        <th>Product Qty (KG)</th>
                                        <th>Product Price (per 20 kG)</th>
                                        <th>Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($agentProductsWithPrices as $item)
                                        <tr>
                                            <td>
                                                <input type="hidden" name="txt_spid[]" value="{{$item['subproduct']['id']}}" class="form-control">
                                                <input type="text" value="{{$item['subproduct']['subproduct_name']}}" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" id="qty{{$loop->index+1}}" name="txt_proqty[]" class="form-control" oninput="calculate()" >
                                            </td>
                                            <td>
                                                <input type="number" id="price" value="{{$item['price']}}" name="txt_price[]" class="form-control"  >
                                            </td>
                                            <td>
                                                <input type="number"  class="form-control" id="txt_tamt" name="txt_tamt[]"  >
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" class="text-right"><strong>Total Amount:</strong></td>
                                        <td><input type="number" name="total_amount" id="total_amount" class="form-control" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addFarmerModal" tabindex="-1" role="dialog" aria-labelledby="addFarmerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFarmerModalLabel">Add Farmer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="block-validate" method="post" action="/addfarmer"
                        novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="txt_ut" value="1" />
                       

                        <div class="form-group">
                            <label class="control-label col-lg-12">First Name</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_fnm" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-12">Middle Name</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_mnm" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-12">LastName</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_lnm" class="form-control" required>
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveFarmerBtn">Save Farmer</button>
            </div>
        </form>
        </div>
    </div>
</div>
@include('agent.includes.footer');

<script>
    function calculate() {
        var totalAmount = 0;
        console.log("calleed")
        $('tbody tr').each(function() {
            var quantity = parseFloat($(this).find('input[name^="txt_proqty"]').val());
            var price = parseFloat($(this).find('input[name^="txt_price"]').val()/20);
            // var totalAmount = Number(quantity * price) || 0;
            // console.log("totalAmount",totalAmount)
            var subTotal = Number(quantity * price) || 0;
           
            if(!isNaN(subTotal)){
                totalAmount += subTotal;
                $(this).find('input[name^="txt_tamt"]').val(subTotal.toFixed(2));
            }
        });
        $('#total_amount').val(totalAmount.toFixed(2));
    }
</script>
