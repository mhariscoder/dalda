@extends('website.layout.master')

@section('content')
    <div class="aboutPage contactPage">
        <section class="inner-banner">

            <div class="container">
                {!! $contact->banner_heading !!}
            </div>
            <img src="{{ \App\Models\CMSContact::IMAGE_PATH . $contact->banner }}" />
        </section>
        <section class="ourMission">
            <div class="container">
                <h3 class="title-heading">{{ $contact->title }}</h2>
                    <h6>
                        "{{ $contact->sub_heading }}"
                    </h6>
            </div>
        </section>
        <section class="mapContainer">
            <div class="container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7241.754563606913!2d67.070431!3d24.83387!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33c155560d059%3A0xbad0ad23c6a250e4!2s13th Commercial Street%2C Defence Housing Authority%2C Karachi%2C Karachi City%2C Sindh 75500%2C Pakistan!5e0!3m2!1sen!2sus!4v1694099154261!5m2!1sen!2sus"
                    width="100%" height="500" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
        <section class="contact-section" id="contact-section">
            <div class="container">
                <div class="box-container">
                    <div class="left">
                        <h5>Message Us</h5>
                        <form action="/contact/inquiry" method="POST">
                            @csrf
                            {!! RecaptchaV3::field('contact',$name='g-recaptcha-response') !!}
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('success') }}</strong>
                                </div>
                            @endif
                            <div class="form-control">
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <div class="form-control">

                                    <input type="email" name="email" value="{{ old('email') }}"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-control">

                                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone">
                                </div>
                            </div>

                            <div class="form-control form-control-textarea">

                                <textarea rows="5" name="message" placeholder="Message">{{ old('message') }}</textarea>
                                <button type="submit" class="btn btn-primary-outline">Submit <i
                                        class="fa-solid fa-chevron-right"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="right">
                        <div>
                            <h5> Our Location</h5>
                            {!! $contact->address !!}
                        </div>
                        <div>
                            <h5> Email Us</h5>
                            <ul>
                                <li><i class="fa-solid fa-envelope mr-2"></i>{{ $contact->email }}</li>
                                <li> <i class="fa-solid fa-phone mr-2"></i>{{ $contact->office_no }}</li>
                                <li> <i class="fa-solid fa-phone mr-2"></i>+923311200897</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- <section class="about-banner contact-banner">
        @include('website.layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-area">
                        <h1>{{$contact->title ?? 'CONTACT US'}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-ContactUs-first-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Let's Talk to Our experts</h2>
                    <hr>
                </div>
            </div>
        </div>
    </section>
    <section class="section-ContactUs-second-fold">
        <div class="parallax page-header" id="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.867212770327!2d67.06762991445162!3d24.834214284066206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33c155560d059%3A0xbad0ad23c6a250e4!2s13th+Commercial+Street%2C+Karachi%2C+Pakistan!5e0!3m2!1sen!2s!4v1476204458801"
                    width="100%" height="320px"></iframe>
        </div>
    </section>
    <section class="section-ContactUs-third-fold">
        <div class="banner6 py-5">
            <!-- Row  -->
            <div class="row">
                <div class="container">
                    <div class="col-lg-6 align-justify-center pr-4 pl-0 contact-form">
                        <div class="">
                            <h2 class="mb-3">Contact us</h2>
                            <form action="/contact/inquiry" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Whoops!</strong>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('success') }}</strong>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name" placeholder="Full name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" type="email" name="email"
                                                   placeholder="Email address" value="{{old('email')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" type="phone" name="phone" placeholder="Phone" value="{{old('phone')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                        <textarea class="form-control" name="message" rows="4"
                                                  placeholder="Message">{{old('message')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-red"><span> Submit</span></button>
                                        <!--  -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-6 right-image pl-3">
                        <div class="mt-5">
                            <h2 class="mb-3">Our Location</h2>

                            <div class="cstnLocationConetnt mt-3">
                                <p>{{$contact->address ?? 'Dalda Foundation Trust, Plot # 66C/1, 13th Commercial Lane.
                Phase 2 Extension, D.H.A
                Karachi, Pakistan'}}</p>

                                <h3 class="mb-3">Write Us</h3>

                                <h4>Email : <span>{{$contact->email ?? 'info@daldafoundation.pk'}}</span></h4>
                                <h4>Call : <span>{{$contact->office_no ?? '0313-8894447'}}</span></h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            @if ($errors->any())
                const container = document.getElementById('contact-section');
                container.scrollIntoView();
            @endif
            @if (Session::has('success'))
                const container = document.getElementById('contact-section');
                container.scrollIntoView();
            @endif
        });
    </script>
@endpush
