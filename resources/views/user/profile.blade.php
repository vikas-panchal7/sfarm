@include('user.includes.header');
@include('user.includes.nav')
<h5>  <center>
            @if(session('success'))
                <div class="alert alert-success" id="flash-message">
                  {{ session('success') }}
                </div>
            @endif
            </center></h5>
            <h1>  <center>
              @if(session('status'))

              <h6 style="color:red ; font-size:10px">{{session('status')}}</h6>
              
              @endif
              </center></h1>
<section class="ftco-section contact-section bg-light">
    <div class="row block-9 justify-content-center">
        <div class="col-md-6 order-md-last d-flex ">
            <!-- Replace this form with the form from the second code snippet -->
            <form class="bg-white p-5 contact-form" method="post" action="/profile/update" novalidate="novalidate">
                @csrf
                <input type="hidden" value="{{ $user['id'] }}" name="user_id">
                <div class="form-group">
                    <label class="control-label col-lg-12">First Name</label>
                    <div class="col-lg-12">
                        <input type="text" id="txt_fnm" name="txt_fnm" value="{{ $user['first_name'] }}"
                            class="form-control" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required" required>
                    </div>
                    <h6 style="color:red ; font-size:15px">@error('txt_fnm'){{$message}}@enderror</h6>

                </div>
                <!-- Include other form fields from the second code snippet -->
                <div class="form-group">
                    <label class="control-label col-lg-12">Middle Name</label>
                    <div class="col-lg-12">
                        <input type="text" id="txt_mnm" value="{{ $user['middle_name'] }}" name="txt_mnm"
                            class="form-control" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required" required>
                    </div>
                    <h6 style="color:red ; font-size:15px">@error('txt_mnm'){{$message}}@enderror</h6>

                </div>
                <div class="form-group">
                    <label class="control-label col-lg-12">Last Name</label>
                    <div class="col-lg-12">
                        <input type="text" id="txt_lnm" value="{{ $user['last_name'] }}" name="txt_lnm"
                            class="form-control" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required" required>
                    </div>
                    <h6 style="color:red ; font-size:15px">@error('txt_lnm'){{$message}}@enderror</h6>

                </div>
                <div class="form-group">
                    <label class="control-label col-lg-12">Address</label>
                    <div class="col-lg-12">
                        <input type="text" id="txt_add" value="{{ $user['address'] }}" name="txt_add"
                            class="form-control" required>
                    </div>
                    <h6 style="color:red ; font-size:15px">@error('txt_add'){{$message}}@enderror</h6>

                </div>
                <div class="form-group">
                    <label class="control-label col-lg-12">Contact</label>
                    <div class="col-lg-12">
                        <input type="text" id="txt_con" value="{{ $user['contact'] }}" name="txt_con"
                            class="form-control"  pattern="[0-9]{10,10}" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"  required>
                    </div>
                    <h6 style="color:red ; font-size:15px">@error('txt_con'){{$message}}@enderror</h6>

                </div>
                <div class="form-group">
                    <label class="control-label col-lg-12">Gender</label>
                    <div class="col-lg-12">
                        <input type="radio" id="Male" name="txt_gen" value="Male"
                            {{ $user['gender'] === 'Male' ? 'checked' : '' }}>Male
                        <input type="radio" id="Female" name="txt_gen" value="Female"
                            {{ $user['gender'] === 'Female' ? 'checked' : '' }}>Female
                    </div>
                    <h6 style="color:red ; font-size:15px">@error('txt_gen'){{$message}}@enderror</h6>

                </div>

                <!-- End of the form -->

                <!-- Include other form fields from the second code snippet -->
                <!-- Remember to replace values and names accordingly -->

                <div class="form-actions no-margin-bottom" style="text-align:center;">
                    <input type="submit" value="Submit" class="btn btn-primary btn-lg " name="btn_submit">
                </div>
            </form>
            <!-- End of replaced form -->
        </div>
    </div>
</section>

@include('user.includes.footer')
