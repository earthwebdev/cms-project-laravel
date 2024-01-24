<!-- info section -->
<section class="info_section ">
    <div class="container">
      <div class="info_top">
        <div class="row">
          <div class="col-md-3 ">
            <a class="navbar-brand" href="/">
                @if (App\Utils\SettingUtils::get('company') == 1)
                {{ App\Utils\SettingUtils::get('company_name')  }}
                @else
                <img width="80px"  src="{{ asset('uploads/settings/'.App\Utils\SettingUtils::get('logo')) }}">
                @endif
            </a>
          </div>
          <div class="col-md-5 ">
            <div class="info_contact">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                    {{ App\Utils\SettingUtils::get('location') }}
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                    {{ App\Utils\SettingUtils::get('phone') }}
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-4 ">
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
      </div>
      <div class="info_bottom">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="info_detail">
                {!! App\Utils\SettingUtils::get('footer_company') !!}
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="info_form">
              <h5>
                NEWSLETTER
              </h5>
              <form action="">
                <input type="text" placeholder="Enter Your Email" />
                <button type="submit">
                  Subscribe
                </button>
              </form>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="info_detail">
                {!! App\Utils\SettingUtils::get('footer_service') !!}
            </div>
          </div>
          <div class="col-lg-2 col-md-6">
            <div class="">
              <h5>
                Useful links
              </h5>
              <ul class="info_menu">
                <li>
                  <a href="/">
                    Home
                  </a>
                </li>
                <li>
                  <a href="{{ url('/about') }}">
                    About
                  </a>
                </li>
                <li>
                  <a href="{{ url('/service') }}">
                    Services
                  </a>
                </li>
                <li>
                  <a href="{{ url('/team') }}">
                    Team
                  </a>
                </li>
                <li class="mb-0">
                  <a href="{{ route('frontend.contact') }}">
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
        {!! App\Utils\SettingUtils::get('copyright') !!}
    </div>
  </footer>
  <!-- footer section -->
