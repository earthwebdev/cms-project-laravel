<div class="hero_area">
<div class="hero_bg_box">
    <img src="{{ asset('uploads/settings/'.App\Utils\SettingUtils::get('header_image')) }}" alt="">
  </div>
  <!-- header section strats -->
  <header class="header_section">
    <div class="header_top">
      <div class="container-fluid header_top_container">

        <div class="contact_nav">
          <a href="">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span>
                {{ App\Utils\SettingUtils::get('location') }}
            </span>
          </a>
          <a href="">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <span>
                call: {{ App\Utils\SettingUtils::get('phone') }}
            </span>
          </a>
          <a href="">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <span>
                {{ App\Utils\SettingUtils::get('email') }}
            </span>
          </a>
        </div>
        <div class="social_box">
          <a href="{{ App\Utils\SettingUtils::get('facebook') }}">
            <i class="fa fa-facebook" aria-hidden="true"></i>
          </a>
          <a href="{{ App\Utils\SettingUtils::get('twitter') }}">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </a>
          <a href="{{ App\Utils\SettingUtils::get('linkedin') }}">
            <i class="fa fa-linkedin" aria-hidden="true"></i>
          </a>
          <a href="{{ App\Utils\SettingUtils::get('instagram') }}">
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="header_bottom">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand " href="">
            @if (App\Utils\SettingUtils::get('company') == 1)
            {{ App\Utils\SettingUtils::get('company_name')  }}
            @else
            <img width="80px"  src="{{ asset('uploads/settings/'.App\Utils\SettingUtils::get('logo')) }}">
            @endif


          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/about') }}"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/service') }}">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/team') }}"> Team </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('frontend.contact') }}">Contact Us</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span>
                    Login
                  </span>
                </a>
              </li>
              <form class="form-inline justify-content-center">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>--}}
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- end header section -->
