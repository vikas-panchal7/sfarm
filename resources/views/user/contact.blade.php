@include('user.includes.header');
@include('user.includes.nav')
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact us</span></p>
          <h1 class="mb-0 bread">Contact us</h1>
        </div>
      </div>
    </div>
  </div>
                          <h5>@if(session('success'))
                            <div class="alert alert-success" id="flash-message">
                                {{ session('success') }}
                            </div>
                            @endif
                            </h5>
  <section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
        <div class="w-100"></div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span>Address:</span> Limda Chowk ,Bardoli</p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span>Phone:</span> <a href="tel://1234567920">+ 9012345678</a></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span>Email:</span> <a href="mailto:info@yoursite.com">smartfarmer7@gmail.com</a></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span>Website</span> <a href="#">www.smartfarmer.com</a></p>
            </div>
        </div>
      </div>
      <div class="row block-9">
        <div class="col-md-12 order-md-last d-flex">
          <form action="contact" method="post" class="bg-white p-5 contact-form">
            @csrf
            <div class="form-group">
              <input type="text" name="full_name"class="form-control" placeholder="Your Name" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required" required>
            </div>
            <div class="form-group">
              <input type="text" name="contact" class="form-control" placeholder="Enter Your Contact Number"  pattern="[0-9]{10,10}" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" required>
            </div>
            <div class="form-group">
              <input type="text"  name="email" class="form-control" placeholder="Your Email" required>
            </div>
           
            <div class="form-group">
              <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        
        </div>

        
      </div>
    </div>
  </section>
@include('user.includes.footer')