@include('agent.includes.header')
@include('agent.includes.sidenav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container" style="width: 100%">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <form class="form-horizontal" id="block-validate" method="post" action="/profile/update"
                        novalidate="novalidate">
                        @csrf

                        <input type="hidden" value="{{ $user['id'] }}"  name="user_id">
                        <div class="form-group">
                            <label class="control-label col-lg-8">First Name</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" name="txt_fnm" value="{{ $user['first_name'] }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Middle Name</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" value="{{ $user['middle_name'] }}" name="txt_mnm" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-8">LastName</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" value="{{ $user['last_name'] }}" name="txt_lnm" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Address</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2" value="{{ $user['address'] }}" name="txt_add" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Contact</label>
                            <div class="col-lg-8">
                                <input type="text" id="required2"  value="{{ $user['contact'] }}"name="txt_con" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">Gender</label>
                            <div class="col-lg-8">
                                <input type="radio" id="required2" name="txt_gen" value="Male" {{ $user['gender'] === 'Male' ? 'checked' : '' }}>Male
                                <input type="radio" id="required2" name="txt_gen" value="Female" {{ $user['gender'] === 'Female' ? 'checked' : '' }}>Female
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label class="control-label col-lg-8">Email</label>
                            <div class="col-lg-8">
                                <input type="text" value="{{ $user['email'] }}"  id="required2" name="txt_em" class="form-control" readonly>
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
@include('agent.includes.footer');