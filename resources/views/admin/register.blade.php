@include('admin.includes.header')
@include('admin.includes.sidenav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registration</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Registration</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container" style="width: 100%">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <form class="form-horizontal" id="block-validate" method="post" action="/registration"
                        novalidate="novalidate">
                        @csrf

                        <div class="form-group">
                            <label class="control-label col-lg-8">User Type</label>
                            <div class="col-lg-8">
                                <select name="txt_ut" class="form-control" style="text-transform:capitalize;">

                                    <option value="">----Select User Type----</option>
                                    <option value="1">farmer</option>
                                    <option value="2">customer</option>
                                    <option value="3">agent</option>
                                    <option value="4">assistance</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">First Name</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_fnm" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Middle Name</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_mnm" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-8">LastName</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_lnm" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Address</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_add" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Contact</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_con" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Gender</label>
                            <div class="col-lg-8">
                                <input type="radio" id="required2" name="txt_gen" value="Male">Male
                                <input type="radio" id="required2" name="txt_gen" value="Female">Female
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Email</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_em" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-8">Password</label>
                            <div class="col-lg-8">
                                <input type="password" id="required2" name="txt_pass" class="form-control">
                            </div>
                        </div>


                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                            <input type="submit" value="Submit" class="btn btn-primary btn-lg " name="btn_submit">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.includes.footer');
