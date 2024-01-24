@extends('frontend.layout.master')

@section('site_title', $page->title)

@section('content')
</div>


<!-- about section -->
@if ($url == 'contact-us')
    <section class="contact_section ">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-6 px-0">
              <div class="img-box ">
                <img src="./front/images/contact-img.jpg" class="box_img" alt="about img">
              </div>
            </div>
            <div class="col-md-5 mx-auto">
              <div class="form_container">
                <div class="heading_container heading_center">
                  <h2>Get In Touch</h2>
                  @if (session('error'))
                      <span class="text-danger">{{  session('error')  }}</span>
                  @endif

                  @if (session('success'))
                      <span class="text-success">{{  session('success')  }}</span>
                  @endif
                </div>
                <form action="{{ route('frontend.contact.submit') }}" method="POST">
                    @csrf
                  <div class="form-row">
                    <div class="form-group col">
                      <input value="{{ old('name') }}" type="text" class="form-control" placeholder="Your Name" name="name" />
                      @if ($errors->first('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-6">
                      <input value="{{ old('phone') }}" type="text" class="form-control" placeholder="Phone Number" name="phone" />
                    </div>
                    <div class="form-group col-lg-6">
                      <select  id="" class="form-control wide" name="service">
                        <option value="">Select Service</option>
                        <option value="ser2">Service 1</option>
                        <option value="ser3">Service 2</option>
                        <option value="ser4">Service 3</option>
                      </select>
                      @if ($errors->first('service'))
                        <span class="text-danger">{{ $errors->first('service') }}</span>
                      @endif
                    </div>

                  </div>
                  <div class="form-row">
                    <div class="form-group col">
                      <input value="{{ old('email') }}" type="email" class="form-control" placeholder="Email" name="email" />
                      @if ($errors->first('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                    
                  </div>
                  <div class="form-row">
                    <div class="form-group col">
                      <input value="{{ old('message') }}" type="text" class="message-box form-control" placeholder="Message" name="message" />
                      @if ($errors->first('message'))
                        <span class="text-danger">{{ $errors->first('message') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="btn_box">
                    <button>
                      SEND
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    @endif
<section class="{{ $url }}_section layout_padding">
  <div class="{{ $url=='about'?'container-fluid':'container' }}">


                {!! $page->description !!}

        @if($url == 'service')


              <div class="service_container">
                <div class="carousel-wrap ">
                  <div class="service_owl-carousel owl-carousel">
                    @foreach ($page['service'] as $service)
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
              {{-- <div class="btn-box">
                <a href="">
                  Read More
                </a>
              </div> --}}

        @endif

        @if($url == 'team')
        <div class="row">

            @forelse ($page['team'] as $team)
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
        @endif

  </div>
</section>
@endsection



