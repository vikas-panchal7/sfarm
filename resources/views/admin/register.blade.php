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
    <h1>  <center>
              @if(session('status'))

              <h6 style="color:red ; font-size:10px">{{session('status')}}</h6>
              
              @endif
              </center></h1>
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
                                    {{-- <option value="1">farmer</option>
                                    <option value="2">customer</option> --}}
                                    <option value="3">agent</option>
                                    <option value="4">assistance</option>
                                </select>
                            </div>
                            <h6 style="color:red ; font-size:15px">@error('txt_ut'){{$message}}@enderror</h6>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">First Name</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" placeholder="Enter Your First Name" name="txt_fnm" class="form-control" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required" required>
                            </div>
                            <h6 style="color:red ; font-size:15px">@error('txt_fnm'){{$message}}@enderror</h6>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Middle Name</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_mnm" placeholder="Enter Your Middle Name" class="form-control" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required" required>
                            </div>
                            <h6 style="color:red ; font-size:15px">@error('txt_mnm'){{$message}}@enderror</h6>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-8">LastName</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_lnm" placeholder="Enter Your Last Name" class="form-control" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required" required>
                            </div>
                            <h6 style="color:red ; font-size:15px">@error('txt_lnm'){{$message}}@enderror</h6>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Address</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_add" placeholder="Enter Your Address"class="form-control" required>
                            </div>
                            <h6 style="color:red ; font-size:15px">@error('txt_add'){{$message}}@enderror</h6>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Contact</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_con" placeholder="Enter Your Contact Number" pattern="[0-9]{10,10}" class="form-control" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" required>
                            </div>
                            <h6 style="color:red ; font-size:15px">@error('txt_con'){{$message}}@enderror</h6>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Gender</label>
                            <div class="col-lg-8">
                                <input type="radio" id="required2" name="txt_gen" value="Male">Male
                                <input type="radio" id="required2" name="txt_gen" value="Female">Female
                            </div>
                            <h6 style="color:red ; font-size:15px">@error('txt_gen'){{$message}}@enderror</h6>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Email</label>
                            <div class="col-lg-8">
                                <input type="email" id="email" name="email" placeholder="Enter Your Email" class="form-control" required>
                            </div>
                            <h6 style="color:red ; font-size:15px">@error('email'){{$message}}@enderror</h6>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-8">Password</label>
                            <div class="col-lg-8">
                                <input type="password" id="required2" name="txt_pass" placeholder="Enter Your Password" class="form-control" required>
                            </div>
                            <h6 style="color:red ; font-size:15px">@error('txt_pass'){{$message}}@enderror</h6>
                        </div>


                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                            <input type="submit" value="Submit" class="btn btn-primary btn-lg" name="btn_submit">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.includes.footer');
