@include('user.includes.header');
@include('user.includes.nav')
                                @if(Session::get('success'))
							    <div class="alert alert-success">
							        {{ Session::get('success')}}
							    </div>
						        @endif
						        @if(Session::get('fail'))
							    <div class="alert alert-danger">
								    {{ Session::get('fail')}}
							    </div>
						        @endif
<section class="ftco-section contact-section bg-light">
    <div class="row block-9 justify-content-center">
        <div class="col-md-6 order-md-last d-flex ">
            <form action="/login" class="bg-white p-5 contact-form" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control"  name="txt_em" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="txt_pass" class="form-control" placeholder="Your Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-primary py-3 px-5">
                </div>
                Create New Account <a href="{{url('registration')}}">Registration</a>

            </form>
        </div>
    </div>

</section>
@include('user.includes.footer')
