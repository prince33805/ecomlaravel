
<div class="best-features">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>About Xibho Clothing</h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="left-content">
          <h4>Looking for the best products?</h4>
          <p>This store is about my clothing business websites. Hope you enjoy our products.</p>
          <ul class="featured-list">
            <li><a>Lorem ipsum dolor sit amet</a></li>
            <li><a>Consectetur an adipisicing elit</a></li>
            <li><a>It aquecorporis nulla aspernatur</a></li>
            <li><a>Corporis, omnis doloremque</a></li>
            <li><a>Non cum id reprehenderit</a></li>
          </ul>
          <a href="aboutus" class="filled-button">Read More</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="right-image">
          <img src="assets/images/feature-image.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</div>


<div class="best-features">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="section-heading">
          <h2>Contact Us</h2>
        </div>
      </div>

      <div class="col-md-8">
        <div class="left-content">
          <h3 style="padding-bottom: 50px;font-size:20px">Our Map</h3>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3776.8537845643805!2d98.95284461489705!3d18.804668387244234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da3a68355ea91f%3A0xd393197b614f8352!2sChiang%20Mai%20University!5e0!3m2!1sen!2sth!4v1654974586211!5m2!1sen!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <div class="col-md-4">
          <h3 style="padding-bottom: 50px;font-size:20px">Send Email</h3>
          <form method="post" action="contact-us">
            @csrf
            {{-- <div class="row"> --}}
              <div class="col-md-12">
                <div class="form-group">
                  <label> Name </label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label> Email </label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div> 
              <div class="col-md-12">
                <div class="form-group">
                  <label> Phone Number </label>
                  <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" name="phone">
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label> Subject </label>
                  <input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" name="subject">
                  @error('subject')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label> Message </label>
                  <textarea class="form-control textarea @error('message') is-invalid @enderror" placeholder="Message" name="message"></textarea>
                  @error('message')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            
              <div class="update ml-auto mr-auto" align="center">
                <button type="submit" class="btn btn-primary btn-round" style="background-color: #0d6efd">Send</button>
              </div>

            {{-- </div> --}}
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

    {{-- <div class="call-to-action"> 
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="inner-content">
                <div class="row">
                  <div class="col-md-8">
                    <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                  </div>
                  <div class="col-md-4">
                    <a href="" class="filled-button">Purchase Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
  