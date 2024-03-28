@include('user.includes.header');
@include('user.includes.nav')

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
                        <input type="text" id="required2" name="txt_fnm" value="{{ $user['first_name'] }}"
                            class="form-control" required>
                    </div>
                </div>
                <!-- Include other form fields from the second code snippet -->
                <div class="form-group">
                    <label class="control-label col-lg-12">Middle Name</label>
                    <div class="col-lg-12">
                        <input type="text" id="required2" value="{{ $user['middle_name'] }}" name="txt_mnm"
                            class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-12">Last Name</label>
                    <div class="col-lg-12">
                        <input type="text" id="required2" value="{{ $user['last_name'] }}" name="txt_lnm"
                            class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-12">Address</label>
                    <div class="col-lg-12">
                        <input type="text" id="required2" value="{{ $user['address'] }}" name="txt_add"
                            class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-12">Contact</label>
                    <div class="col-lg-12">
                        <input type="text" id="required2" value="{{ $user['contact'] }}" name="txt_con"
                            class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-12">Gender</label>
                    <div class="col-lg-12">
                        <input type="radio" id="required2" name="txt_gen" value="Male"
                            {{ $user['gender'] === 'Male' ? 'checked' : '' }}>Male
                        <input type="radio" id="required2" name="txt_gen" value="Female"
                            {{ $user['gender'] === 'Female' ? 'checked' : '' }}>Female
                    </div>
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
