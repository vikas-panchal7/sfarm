@include('user.includes.header')
@include('user.includes.nav')

<section class="ftco-section contact-section bg-light">
    <div class="row block-9 justify-content-center">
        <div class="col-md-6 order-md-last d-flex">
            <form id="changePasswordForm" action="/change" class="bg-white p-5 contact-form" method="post">
                @csrf
                @if(session('user_id'))
                            <input type="hidden" name="id" class="form-control" value="{{ session('user_id') }}">
                        
                        @endif
                <div class="form-group">
                    <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="newPassword" name="new_password" placeholder="New Password" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm New Password" required>
                    <span id="confirmPasswordError" class="text-danger" style="display:none;">Passwords do not match.</span>
                </div>
                <div class="form-group">
                    <input type="submit" value="Change Password" class="btn btn-primary py-3 px-5">
                </div>
            </form>
        </div>
    </div>
</section>

@include('user.includes.footer')


<script>
    $(document).ready(function() {
        $('#changePasswordForm').submit(function(e) {
            var newPassword = $('#newPassword').val();
            var confirmPassword = $('#confirmPassword').val();
            if (newPassword !== confirmPassword) {
                $('#confirmPasswordError').show();
                e.preventDefault(); // Prevent form submission
            }
        });

        $('#confirmPassword').keyup(function() {
            $('#confirmPasswordError').hide();
        });
    });
</script>
