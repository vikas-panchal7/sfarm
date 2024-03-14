@include('agent.includes.header')
@include('agent.includes.sidenav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Commission</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Commission</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container" style="width: 100%">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="card p-3">
                        <form id="block-validate" method="post" action="/agent/commission/update"
                            novalidate="novalidate">
                            @csrf
                            <input type="hidden" value="{{ session('user_id') }}" name="agid">
                            <div class="form-group" style="display: flex;">
                                <label class="control-label col-lg-4">Commission</label>
                                <div class="col-lg-4">
                                    <input type="number" class="form-control" id="comm" name="commissions"
                                        placeholder="Enter Commission %" required>
                                </div>
                            </div>

                            <div class="form-actions no-margin-bottom" style="text-align:center;">
                                <input type="submit" value="Submit" class="btn btn-primary  " name="btn_submit">
                            </div>

                        </form>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title bg-transparent text-center">Commission</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="mt-2 table">
                                <thead>
                                    <tr>
                                        <th>Sr NO</th>
                                        <th>Commission</th>

                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> 1</td>
                                        <td>{{ $commission->commison }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm edit-commission"
                                                data-commission="{{ $commission->commison }}">Edit</button>
                                        </td>



                                    </tr>

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
        $('.edit-commission').click(function() {
            console.log("njblb")
            var commission = $(this).data('commission');
            $('#comm').val(commission);
        });
    });
</script>

