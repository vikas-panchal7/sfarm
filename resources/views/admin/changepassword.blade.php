@include('admin.includes.header')
@include('admin.includes.sidenav')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Change Password</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="width: 100%">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" id="change-password-form" method="post" action="/change">
                        @csrf

                        <!-- Add your password change form fields here -->
                        @if(session('user_id'))
                            <input type="hidden" name="id" class="form-control" value="{{ session('user_id') }}">
                        
                        @endif
                        
                        <div class="form-group">
                            <label class="control-label col-lg-8">Old Password</label>
                            <div class="col-lg-8">
                                <input type="password" name="old_password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-8">New Password</label>
                            <div class="col-lg-8">
                                <input type="password" name="new_password" class="form-control">
                            </div>
                        </div>

                        <!-- Add other necessary fields for changing the password -->

                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                            <input type="submit" value="Change Password" class="btn btn-primary btn-lg" name="btn_change_password">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.includes.footer');
