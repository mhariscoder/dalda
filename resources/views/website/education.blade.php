@extends('website.layout.master')
@section('content')
<div class="aboutPage educationPage">

    <section class="inner-banner">

        <div class="container">
            {!! $education->banner_heading !!}
        </div>

        <img src="{{ !empty($education->banner) ? asset('assets/website/images/pages/education/' . $education->banner) : '/assets/frontend/img/about-banner.png' }}"
            class="img-fluid" alt="banner" />

    </section>
    <section class="ourMission">
        <div class="container">
            <h3 class="title-heading">{{ $education->section1_heading }}</h2>
                {!! $education->section1_description !!}
        </div>

    </section>
    <section class="higherEducation">
        <img src="{{ !empty($education->section2_image) ? asset('assets/website/images/pages/education/' . $education->section2_image) : '/assets/frontend/img/higherEducation.png' }}"
            class="img-fluid" alt="higher education" />
        <div class="container">
            <div class="content">

                <div class="inner">
                    {!! $education->section2_description !!}


                </div>
            </div>
        </div>

    </section>
    <section class="glimpseIntoWorld vocationalTraining">
        <div class="container">
            <div class="block ">
                <div class="left">
                    <img src="{{ !empty($education->section3_image) ? asset('assets/website/images/pages/education/' . $education->section3_image) : '/assets/frontend/img/vocationalTraining.png' }}"
                        class="img-fluid" alt="glimpse" />

                </div>

                <div class="right">
                    <h5> {{ $education->section3_heading }}</h5>


                    {!! $education->section3_description !!}

                </div>
            </div>
            <div class="trainings">

                @foreach ($boxes as $box)
                    <div class="card">
                        <div class="inner">
                            <div class="heading">
                                {!! $box->heading !!}
                            </div>
                            <div class="description">
                                {!! $box->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="internationalEducation">
        <div class="container">
            <h3 class="title-heading">{{ $education->section4_heading }}</h3>
            {!! $education->section4_description !!}
            <div class="topAchievers brighterPakistan">
                <div class="left">
                    <img src="{{ !empty($education->section4_image) ? asset('assets/website/images/pages/education/' . $education->section4_image) : '/assets/frontend/img/ScholarshipImage.png' }}"
                        class="img-fluid" alt="" />
                </div>
                <div class="internationalEducation-right">
                    <div class="internationalEducation-title">
                        <h2>OUR TOP 10 HIGH ACHIEVERS</h2>
                        <a href="{{ route('high-achievers') }}" class="btn btn-primary-outline"> View All</a>
                    </div>
                    <div class="bright-student right">
                        @foreach ($achievers as $achiever)
                            @if ($achiever->position == 1)
                                <div class="bright-left">
                                    <div class="card">
                                        <div class="card-header">
                                            <img class="studentImage" src="{{ !empty($achiever->image) ? asset('/assets/website/images/highAchievers/' . $achiever->image) : '/assets/frontend/img/ahmedsidiqui.png' }}"
                                                alt="">
                                            <img class="capImage" src="assets/frontend/img/greenCap.png" alt="">
                                            <img class="crownImage" src="assets/frontend/img/crown.png" alt="">
                                        </div>
                                        <div class="card-body">
                                            <h5>{{ $achiever->student->full_name }}</h5>
                                            {{-- <p class="result">Test Result</p> --}}
                                            <p class="grade">{{ $achiever->designation?? '' }}
                                               </p>
                                            <p class="degree">
                                                {{ $achiever->organization?? '' }}
                                            </p>
                                            <a href="/achievers-profile/{{ $achiever->student->id}}" class="btn btn-tertiary  ">View Profile</a>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="bright-right">
                            @foreach ($achievers as $achiever)
                                @if ($achiever->position > 1)
                                    <div class="card">
                                        <div class="card-header">
                                            <img class="studentImage" src="{{ !empty($achiever->image) ? asset('/assets/website/images/highAchievers/' . $achiever->image) : '/assets/frontend/img/ahmedsidiqui.png' }}"
                                                alt="">
                                            <img class="capImage" src="assets/frontend/img/greenCap.png" alt="">
                                            <img class="crownImage" src="assets/frontend/img/crown.png" alt="">
                                        </div>
                                        <div class="card-body">
                                            <h5>{{ $achiever->student->full_name }}</h5>
                                            {{-- <p class="result">Test Result</p> --}}
                                            <p class="grade">
                                                {{ $achiever->designation?? '' }}</p>
                                            <p class="degree">
                                                {{ $achiever->organization?? '' }}
                                            </p>
                                            <a href="/achievers-profile/{{ $achiever->student->id}}" class="btn btn-tertiary  ">View Profile</a>
                                        </div>

                                    </div>
                                @endif
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="fields-Section">
        <div class="container">
            {!! $education->section5_content !!}



            <div class="fields-images">
                <div class="field">
                    <div class="fieldImage">
                        <img src="assets/frontend/img/coaching.png" alt="">
                    </div>
                    <p>
                        Coaching</p>
                </div>
                <div class="field">
                    <div class="fieldImage">

                        <img src="assets/frontend/img/guidence.png" alt="">
                    </div>
                    <p>
                        Guidance and Counselling</p>
                </div>
                <div class="field">
                    <div class="fieldImage">
                        <img src="assets/frontend/img/free Standarized.png" alt="">
                    </div>
                    <p>
                        Free Standardized Test Preparation <span>(IELTS, TOEFL,
                            GRE, GMAT, LSAT)</span></p>
                </div>
                <div class="field">
                    <div class="fieldImage">
                        <img src="assets/frontend/img/emotional.png" alt="">
                    </div>
                    <p>
                        Emotional Support</p>
                </div>



            </div>
        </div>
    </section>
    <section class="international-education">
        <div class="container">
            <h3 class="title-heading">{{ $education->section6_heading }}</h3>

            {!! $education->section6_description !!}



            <div class="scholarshipDirectoryContainer">
                @foreach ($services as $service)
                    <div class="card">

                        <img src="{{ asset('assets/website/images/pages/education/' . $service->image) }}"
                            alt="">

                        <p>{!! $service->heading !!}</p>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="financialReward">
        <div class="container">
            <h3 class="title-heading">{{ $education->section7_heading }}</h3>
            {!! $education->section7_description !!}

            <div class="rewardImage">
                <img src="{{ !empty($education->section7_image) ? asset('assets/website/images/pages/education/' . $education->section7_image) : '/assets/frontend/img/financial Reward.png' }}"
                    class="img-fluid" />

            </div>
    </section>
    <section class="dft-performance">
        <div class="container">
            <div class="left">
                <h5>DFT Performance and Student Data</h5>
                <ul class="star-list">
                    <li>Year-wise data starting from 2010-11 covering</li>
                    <li>Institution-wise, education board wise and province-wise data.</li>
                    <li>Classification of scholarship holders by profession i.e. medical engineering etc.</li>
                    <li>A list containing students who have passed their professional qualifications.</li>
                </ul>

            </div>

            <div class="right">
                <h5>New Initiatives</h5>
                <p>We are constantly looking for new ideas,
                    developing the latest research-based plans and exploring new opportunities to make challenge our
                    education goals. New milestones and initiatives in this field are:</p>
                <ul>
                    <li>Develop Alumni portal for DFT scholarship holders separately who</li>
                    <p>a-completed their professional
                        qualifications</p>
                    <p>b-Who is in process of completing their
                        education and</p>
                    <p>c-Applicants who attempted for DFT
                        scholarship but couldn't qualify.</p>
                    <li>Creation of a professional group for counselling and guiding students.</li>
                    <li>
                        Develop alliances for financial support to add more deserving students
                    </li>
                    <li>Character building of DFT scholarship holders to become good human beings to serve
                        the community</li>
                    <li>
                        Profiling of students through the Student Portal available on the website page</li>

                </ul>

            </div>
        </div>

    </section>


    {{-- <div id="sponsorModal" class="modal contactPage">


        <section class="contact-section modal-content">
            <span class="modalClose">&times;</span>
            <div class="container">
                <div class="box-container">
                    <div class="left">
                        <h5>Message Us</h5>
                        <form>

                            <div class="form-control">

                                <input type="text" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <div class="form-control">

                                    <input type="email" placeholder="Email Address">
                                </div>
                                <div class="form-control">

                                    <input type="text" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-control form-control-textarea">

                                <textarea rows="5" placeholder="Message"></textarea>
                                <button class="btn btn-primary-outline">Submit <i
                                        class="fa-solid fa-chevron-right"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="right">
                        <div>
                            <h5> Our Location</h5>
                            <p>192-C, Al-Murtaza Commercial Lane-3, <br> Phase 8, DHA Karachi</p>
                        </div>
                        <div>
                            <h5> Email Us</h5>
                            <ul>
                                <li><i class="fa-solid fa-envelope mr-2"></i>info@daldafoundation.pk</li>
                                <li> <i class="fa-solid fa-phone mr-2"></i>+92 2138636933</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </div> --}}
</div>
{{--
    <section class="about-banner scholarship-banner">
        @include('website.layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-area">
                        <h1>Scholarship</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-scholarShip-first-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Scholarship Program</h2>
                    <hr>
                </div>
            </div>
        </div>
    </section>
    <section class="section-secholarShip-second-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div>
                        <h2>learn for better tomorrow </h2>
                        <p>The Dalda Foundation Trust (DFT) is an independent, non-profit organization who support and
                            initiate projects related to health and education.
                            We aim to make the world a healthier & educated place. DFT encourages and enables meaningful
                            and executable innovation that aims to address existing and ensuing healthcare dynamics
                            through communication, education, training, symposia, reports, and research. DFT creates a
                            unique opportunity to address and improve
                            healthcare & educational value, which we view as a function of quality, access, and
                            cost.</p>

                        <p>The Dalda Foundation Trust (DFT) is an independent, non-profit organization who support and
                            initiate projects related to health and education.
                            We aim to make the world a healthier & educated place. DFT encourages and enables meaningful
                            and executable innovation that aims to address existing and ensuing healthcare dynamics
                            through communication, education, training, symposia, reports, and research. DFT creates a
                            unique opportunity to address and improve
                            healthcare & educational value, which we view as a function of quality, access, and
                            cost.</p>

                        <ul>
                            <li>DFT encourages and enables meaningful</li>
                            <li>Dalda Foundation Trust</li>
                            <li>non-profit organization</li>
                            <li>Executable Innovation</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div>
                        <img src="/assets/website/images/scholarship.png" class="img-fluid" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-agriculture-first-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>List Of Institutes</h2>
                    <hr>

                    <div class="search-area">
                        <form method="GET" action="#">
                            <input type="search" class="form-control" name="search" value="{{request('search')}}"/>
                            <span><i class="fas fa-search"></i></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-scholarship-forth-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="accordionExample" class="accordion shadow">
                        @include('website.partials.education')
                    </div>
                </div>
            </div>
        </div>
    </section>
--}}
@endsection

@push('scripts')
@endpush
