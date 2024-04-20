@extends('website.layout.master')

@section('content')
    <div class="aboutPage">
        <section class="inner-banner">

            <div class="container">
                {!! $about->banner_heading !!}
            </div>
            <img src="{{ !empty($about->banner) ? asset('assets/website/images/pages/about/' . $about->banner) : '/assets/frontend/img/about-banner.png' }}"
                class="img-fluid" alt="banner" />
        </section>

        <section class="ourMission">
            <div class="container">

                <h3 class="title-heading">{{ $about->section1_heading }}</h2>
                    {!! $about->section1_description !!}
            </div>

        </section>
        <section class="glimpseIntoWorld">
            <div class="container">
                <div class="block ">
                    <div class="left">
                        <img src="{{ !empty($about->section2_image1) ? asset('assets/website/images/pages/about/' . $about->section2_image1) : '/assets/frontend/img/aboutImage1.png' }}"
                            class="img-fluid" alt="glimpse">
                    </div>

                    <div class="right">
                        {!! $about->section2_content1 !!}


                    </div>
                </div>

                <div class="block">


                    <div class="left">
                        <img src="{{ !empty($about->section2_image2) ? asset('assets/website/images/pages/about/' . $about->section2_image2) : '/assets/frontend/img/aboutImage2.png' }}"
                            class="img-fluid" alt="" alt="journey">

                    </div>

                    <div class="right">
                        {!! $about->section2_content2 !!}


                    </div>

                </div>
            </div>
        </section>
        <section class="dftSection">
            <div class="container">

                <h3 class="title-heading">
                    {{ $about->section3_heading }}

                </h3>

                {!! $about->section3_description !!}

            </div>
        </section>
        <section class="staticImage">
            <div class="container">
                <img src="{{ !empty($about->section3_image1) ? asset('assets/website/images/pages/about/' . $about->section3_image1) : '/assets/frontend/img/static.png' }}"
                    class="img-fluid" alt="" >
            </div>
        </section>

        <div class="realityImplementationSection">
            <div class="container">

                <div class="contest-container">
                    <div class="contest-image"><img
                            src="{{ !empty($about->section4_image1) ? asset('assets/website/images/pages/about/' . $about->section4_image1) : '/assets/frontend/img/educationImage.png' }}"
                            class="img-fluid" alt="" ></div>
                    <div class="contest-image-overlay">
                        <h4>
                            {{ $about->section4_heading1 }}

                        </h4>
                        {!! $about->section4_description1 !!}

                    </div>
                </div>
                <div class="contest-container">
                    <div class="contest-image2"><img
                            src="{{ !empty($about->section4_image2) ? asset('assets/website/images/pages/about/' . $about->section4_image2) : '/assets/frontend/img/teacherImage.png' }}"
                            class="img-fluid" alt="" ></div>
                    <div class="contest-image-overlay">
                        <h4> {{ $about->section4_heading2 }}</h4>
                        {!! $about->section4_description2 !!}

                    </div>
                </div>
            </div>

        </div>
    </div>



    {{-- old --}}
    {{-- <section class="about-banner">
        @include('website.layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-area">
                        <h1>about us</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-about-first-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>about us</h2>
                    <hr>
                    <p> {{ $about->short_description ?? 'The Dalda Foundation Trust (DFT) is an independent, non-profit organization who support
                         and initiate projects related to health and education. We aim to make the world a healthier & educated place.'}}
                    </p>
                    <button class="btn btn-red">Explore More!</button>
                </div>
            </div>
        </div>
    </section>
    <section class="section-about-second-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="about-detail-image">
                        <img src="{{ !empty($about->banner) ? asset('assets/website/images/pages/about/'.$about->banner) : '/assets/website/images/about-detail.png'}}" class="img-fluid" alt="" style="min-height:400px; max-height: 600px;"/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="about-detail-content">
                        <h2>Dalda Foundation</h2>

                        <p>{{$about->description ?? 'Dalda Foods commitment to the care for environment, social responsibility and conducting its business in environmentally sustainable matter is evident from the fact that it is the only banaspati and cooking oil company in Pakistan which its own effluent treatment plant at its manufacturing site. The used water is treated and brought to the level
                            of purity where it is reused in meeting the irrigation needs of the factory green belts and gardens Dalda Foods commitment to the care for environment, social responsibility and conducting its business in environmentally sustainable matter is evident from the fact that it is the only banaspati and cooking oil company in Pakistan which its own effluent treatment plant at its manufacturing site. The used water is treated and brought to the level of purity where it is reused in
                             meeting the irrigation needs of the factory green belts.'}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
