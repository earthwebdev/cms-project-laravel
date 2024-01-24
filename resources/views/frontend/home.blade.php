@extends('frontend.layout.master')
@section('site_title', 'Home')

@section('content')

@if($slides->count() > 0)  
<!-- slider section -->

    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
            @foreach ($slides as $slide)
            <div class="carousel-item {{ $loop->first?'active':'' }}">
                <div class="container ">
                  <div class="row">
                    <div class="col-lg-10 col-md-11 mx-auto">
                      <div class="detail-box">
                        <h1>
                          {!! $slide->title !!}
                        </h1>
                        {!! $slide->description !!}
                        <div class="btn-box">
                          <a href="{{ $slide->links }}" class="btn1">
                            {{ $slide->button_name }}
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach

      </div>
      <div class="carousel_btn-box">
        <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
          <i class="fa fa-arrow-left" aria-hidden="true"></i>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
          <i class="fa fa-arrow-right" aria-hidden="true"></i>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>
  <!-- end slider section -->
@endif
</div>
<!-- service section -->

<section class="service_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center ">
        {!! App\Utils\SettingUtils::get('home_service') !!}
      </div>
      @if ($services)
        
      
      <div class="service_container">
        <div class="carousel-wrap ">
          <div class="service_owl-carousel owl-carousel">
            @foreach ($services as $service)
            <div class="item">
              <div class="box ">
                <div class="img-box">
                  <img src="{{ asset('uploads/services/'. $service->photo) }}" alt="{{ $service->title }}" />
                </div>
                <div class="detail-box">
                  <h5>
                    {{ $service->title }}
                  </h5>
                  <p>{!! $service->excerpt !!}</p>
                </div>
              </div>
            </div>
            @endforeach            
          </div>
        </div>
      </div>
      @endif
      <div class="btn-box">
        <a href="{{ url('/services')}}">
          Read More
        </a>
      </div>
    </div>
  </section>

  <!-- service section ends -->

  <!-- about section -->

  <section class="about_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 offset-md-1">

          <div class="detail-box pr-md-2">
            {!! App\Utils\SettingUtils::get('home_about') !!}            
          </div>
        </div>
        <div class="col-md-6 px-0">
          <div class="img-box ">
            <img src="{{ asset('uploads/settings/'.App\Utils\SettingUtils::get('home_about_image')) }}" class="box_img" alt="about img">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- about section ends -->

  <!-- team section -->

  <section class="team_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        {!! App\Utils\SettingUtils::get('home_team') !!}
      </div>
      <div class="row">

        @forelse ($teams as $team)
        <div class="col-md-4 col-sm-6 mx-auto">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('uploads/teams/'.$team->photo) }}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  {{ $team->name }}
                </h5>
                <h6 class="">
                  {{ $team->designation }}
                </h6>
              </div>
            </div>
          </div>
        @empty

        @endforelse        
      </div>
    </div>
  </section>

  <!-- end team section -->

  <!-- contact section -->
  <section class="contact_section ">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-6 px-0">
          <div class="img-box ">
            <img src="{{ asset('front/images/contact-img.jpg') }}" class="box_img" alt="about img">
          </div>
        </div>
        <div class="col-md-5 mx-auto">
          <div class="form_container">
            <div class="heading_container heading_center">
              <h2>Get In Touch</h2>
            </div>
            <form action="{{ route('frontend.contact') }} method="POST">
              <div class="form-row">
                <div class="form-group col">
                  <input name="name" type="text" class="form-control" placeholder="Your Name" />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <input name="phone" type="text" class="form-control" placeholder="Phone Number" />
                </div>
                <div class="form-group col-lg-6">
                  <select name="service" id="" class="form-control wide">
                    <option value="">Select Service</option>
                    <option value="">Service 1</option>
                    <option value="">Service 2</option>
                    <option value="">Service 3</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col">
                  <input name="email" type="email" class="form-control" placeholder="Email" />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col">
                  <input name="message" type="text" class="message-box form-control" placeholder="Message" />
                </div>
              </div>
              <div class="btn_box">
                <button type="submit">
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- client section -->

  <section class="client_section layout_padding">
    <div class="container ">
      <div class="heading_container heading_center">
        <h2>
          Testimonial
        </h2>
        <hr>
      </div>
      <div id="carouselTestimonials" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            @forelse ($testimonials as $testimonial)
            <div class="carousel-item {{ $loop->first ? 'active':'' }}">
                <div class="row">
                  <div class="col-lg-7 col-md-9 mx-auto">
                    <div class="client_container ">
                      <div class="img-box">
                        <img src="{{ asset('uploads/testimonials/'. $testimonial->photo) }}" alt="{{ $testimonial->name }}">
                      </div>
                      <div class="detail-box">
                        <h5>
                          {{ $testimonial->name }}
                        </h5>

                          {!! $testimonial->description !!}

                        <span>
                          <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @empty

            @endforelse
          
        </div>

        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#carouselTestimonials" role="button" data-slide="prev">
            <span>
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselTestimonials" role="button" data-slide="next">
            <span>
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
<!-- end client section -->
@endsection

