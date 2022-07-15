<div class="bg-white">
  <div class="container">
    <div class="logo-area">
        <div class="row align-items-center">
          <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
              <a class="d-block" href="index.html">
                
                <img loading="lazy" src="{{ asset('img/aaa_logo.jpg') }}" alt="Atal Amrit Abhiyan Society, Assam">

                <img loading="lazy" src="{{ asset('img/pmjay_2.jpg') }}" alt="Atal Amrit Abhiyan Society, Assam">
              </a>
          </div><!-- logo end -->

          <div class="col-lg-9 header-right">
              <ul class="top-info-box">
               
                <li>
                  <div class="info-box">
                    <div class="info-box-content">
                        <p class="info-box-title">For any Technical Issues email at</p>
                        <p class="info-box-subtitle">it@aaasassam.in</p>
                    </div>
                  </div>
                </li>
                <li class="last">
                  <div class="info-box last">
                    <div class="info-box-content">
                        <p class="info-box-title">Call At</p>
                        <p class="info-box-subtitle">0361-2333604 (10AM to 6PM)</p>
                    </div>
                  </div>
                </li>

                <li class="header-get-a-quote">
                    @if(!auth()->user())
                    <a class="btn btn-primary" href="{{ route('login') }}">LOGIN</a>
                    @else
                    <button class="btn btn-primary">Hello {{ auth()->user()->name }} </button>
                    @endif
                  </li>
                
              </ul><!-- Ul end -->
          </div><!-- header right end -->
        </div><!-- logo area end -->

    </div><!-- Row end -->
  </div><!-- Container end -->
</div>

<div class="site-navigation">
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              
              <div id="navbar-collapse" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="{{ url('/') }}" class="nav-link" >Home</a>
                    </li>
          					<li class="nav-item"><a class="nav-link" href="contact.html">ToR</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                  </ul>
              </div>
            </nav>
        </div>
        <!--/ Col end -->
      </div>
      <!--/ Row end -->
  </div>
  <!--/ Container end -->

</div>
<!--/ Navigation end -->