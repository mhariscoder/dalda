@extends('website.layout.master')
@section('content')
    <main class="homePage">
        <section class="banner">
            <img src="{{ !empty($home->banner) ? asset('assets/website/images/pages/landing/' . $home->banner) : '/assets/frontend/img/banner.png' }}"
                class="banner-desktop" />
            <img src="{{ !empty($home->banner) ? asset('assets/website/images/pages/landing/' . $home->banner) : '/assets/frontend/img/banner_mobile.png' }}"
                class="banner-mobile" />
            <div class="container">
                <div class="banner__content">
                    {!! $home->banner_heading !!}
                    {!! $home->banner_description !!}
                    <a href="/about" class="btn btn-secondary">Learn more<i class="fa-solid fa-chevron-right"></i></a>
                </div>
            </div>
        </section>

        <section class="mission">
            <img src="{{ !empty($home->section1_image) ? asset('assets/website/images/pages/landing/' . $home->section1_image) : '/assets/frontend/img/DCNO_Bottle.png' }}"
                class="oil-bottle">
            <div>
                <div class="container">
                    <div class="mission__content">
                        <div class="left">
                            <span class="tag">Mission</span>
                            <h3 class="title-heading">
                                {{ $home->section1_heading }}
                            </h3>
                            {!! $home->section1_description !!}
                            <div class="strengths">
                                <a href="/education"> Education,</a>
                                <a href="/agriculture"> Agriculture</a>
                                <span>&amp;</span>

                                <a href="/health"> Health.</a>
                            </div>
                            <a href="/about" class="btn btn-primary-outline">Learn More</a>
                        </div>
                        <div class="right">
                            <img src="{{ !empty($home->section1_image2) ? asset('assets/website/images/pages/landing/' . $home->section1_image2) : '/assets/frontend/img/DaldaBoy2.png' }}"
                                class="child">
                        </div>
                    </div>

                    <div class="mission__content-bottom">
                        <div class="card">
                            <img src="/assets/frontend/img/scholarship.png">
                            <div class="card-bottom">
                                <h3 class="title-heading">{{ $scholarshipCount }}+</h3>
                                <p>
                                    Scholarship Awarded up till now
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/assets/frontend/img/currentstudents.png">
                            <div class="card-bottom">
                                <h3 class="title-heading">{{ $students }}+</h3>
                                <p>Current Students</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/assets/frontend/img/studentsmentored.png">
                            <div class="card-bottom">
                                <h3 class="title-heading">{{ $claim_scholarship_count }}+</h3>
                                <p>Claim Scholarships</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <section class="journey"
            style="background: url('{{ asset('assets/website/images/pages/landing/' . $home->card_section_image) }}') no-repeat;background-size:cover">
            <div class="container">
                <div class="container-header">
                    <h3 class="title-heading">
                        {{ $home->section2_heading }}
                    </h3>
                </div>

                <div class="card-container">
                    <div class="card">
                        <div class="card-boundary">
                            <div class="card-image">
                                <img src="/assets/frontend/img/process.png" alt="screen criteria">
                            </div>
                            <div class="card-body">
                                <h5> {{ $home->card1_heading }}</h5>
                                {!! $home->card1_description !!}
                                <a href="/process-to-apply" class="btn btn-primary-outline">View More <i
                                        class="fa-solid fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-boundary">
                            <div class="card-image">
                                <img src="/assets/frontend/img/screencriteria.png" alt="screen criteria">
                            </div>
                            <div class="card-body">
                                <h5> {{ $home->card2_heading }}</h5>
                                {!! $home->card2_description !!}
                                <a href="/screening-criteria" class="btn btn-primary-outline">View More <i
                                        class="fa-solid fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>




                    {{-- <div class="card">
                    <div class="card-boundary">
                        <div class="card-image">
                            <img src="/assets/frontend/img/benefits.png" alt="screen criteria">
                        </div>
                        <div class="card-body">
                            <h5> {{ $home->card3_heading }}</h5>
                            {!! $home->card3_description !!}
                            <a href="" class="btn btn-primary-outline">View More <i
                                    class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div> --}}
                </div>
            </div>
        </section>

        <section class="brighterPakistan">
            <div class="brighterPakistan-header" id="brighterPakistan-header">
                <h3 class="title-heading"> {{ $home->section3_heading }}</h3>
                {!! $home->section3_description !!}
            </div>
            <div class="brighterPakistan-content" id="brighterPakistan">
                <div class="container">
                    <div class="left">
                        <h2>
                            {!! $home->section3_sub_heading !!}
                        </h2>
                        <div class="dft">
                            {!! $home->section3_sub_description !!}
                            <a href="{{ route('high-potentials') }}" class="btn btn-white-outline">View All <i
                                    class="fa-solid fa-chevron-right"></i></a>
                        </div>
                        <div class="bright-student">
                            @foreach ($high_potentials as $high_potential)
                                <div class="card">
                                    <div class="card-header">
                                        <img class="studentImage" src="{{ $high_potential->student->profile_picture }}"
                                            alt="">
                                        <img class="capImage" src="assets/frontend/img/greenCap.png" alt="">
                                    </div>
                                    <div class="card-body">
                                        <h5>{{ $high_potential->student->full_name ?? '' }}</h5>
                                        <p class="result">Test Result :
                                            <span class="grade"> {{ $high_potential->student->getTestResults->percentage ?? '' }} %</span>
                                        </p>
                                        {{-- <p class="grade">
                                            </p> --}}
                                        <p class="degree">
                                            {{ $high_potential->student->getClaimedScholarships->first()->degree_name ?? '' }}
                                        </p>
                                        <button class=" sponsorNow btn btn-tertiary"
                                            data-id={{ $high_potential->student->id ?? '' }}
                                            data-image="{{ $high_potential->student->profile_picture ?? '' }}"
                                            data-name="{{ $high_potential->student->full_name ?? '' }}"
                                            data-grade="{{ $high_potential->student->getTestResults->percentage ?? '' }}"
                                            data-degree="{{ $high_potential->student->getClaimedScholarships->first()->degree_name ?? '' }}">sponsor
                                            now</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="right">
                        {!! $home->section3_sub_content !!}
                        <div class="join-container">
                            <p>JOIN THE ALLIANCE</p>
                            <div class="inner">
                                <button type="button" class="joinAlliance btn btn-primary" id="joinAlliance">Join
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="universityPlacements">
            <div class="universityPlacements-header">
                <h3 class="title-heading">{{ $home->section4_heading }}</h3>
                {!! $home->section4_description !!}
            </div>
            <div class="owl-carousel owl-theme universityLogos ">
                @foreach ($university_logo as $logo)
                    <div class="item">
                        <img src="{{ asset('assets/website/images/pages/university-icons/' . $logo->icon) }}">
                    </div>
                @endforeach
            </div>

        </section>

        <section class="ourMentors">
            <div class="container">
                <div class="ourMentors-header">
                    <h3 class="title-heading">{{ $home->section5_heading }}</h3>
                    {!! $home->section5_description !!}
                </div>
                <div class="mentor-container">
                    @foreach ($hero as $heroes)
                        <div class="mentor">
                            <img src="{{ asset('assets/website/images/pages/landing/' . $heroes->image) }}">
                            <h5>{{ $heroes->title }} </h5>
                            <p class="designation">{{ $heroes->designation }}</p>
                            <p>{{ $heroes->department }}</p>
                            {!! $heroes->description !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="ourServices">
            <h3 class="title-heading">{{ $home->section6_heading }}</h3>
            <div class="cards-container">
                <div class="card">
                    <div class="content">
                        <h2>{{ $home->section6_sub_heading1 }}</h2>
                        {!! $home->section6_sub_description1 !!}
                        <a href="{{ $home->section6_sub_link1 }}" class="btn btn-white-outline">View More <i
                                class="fa-solid fa-chevron-right"></i></a>
                    </div>
                    <img src=" {{ !empty($home->section6_sub_image1) ? asset('assets/website/images/pages/landing/' . $home->section6_sub_image1) : '/assets/frontend/img/education.png' }}"
                        alt="">
                </div>
                <div class="card">
                    <div class="content">
                        <h2>{{ $home->section6_sub_heading2 }}</h2>
                        {!! $home->section6_sub_description2 !!}
                        <a href="{{ $home->section6_sub_link2 }}" class="btn btn-white-outline">View More <i
                                class="fa-solid fa-chevron-right"></i></a>
                    </div>
                    <img src="{{ !empty($home->section6_sub_image2) ? asset('assets/website/images/pages/landing/' . $home->section6_sub_image2) : '/assets/frontend/img/agriculture.png' }}"
                        alt="">
                </div>
                <div class="card">
                    <div class="content">
                        <h2>{{ $home->section6_sub_heading3 }}</h2>
                        {!! $home->section6_sub_description3 !!}

                        <a href="{{ $home->section6_sub_link3 }}" class="btn btn-white-outline">View More <i
                                class="fa-solid fa-chevron-right"></i></a>
                    </div>
                    <img src="{{ !empty($home->section6_sub_image3) ? asset('assets/website/images/pages/landing/' . $home->section6_sub_image3) : '/assets/frontend/img/health.png' }}"
                        alt="">
                </div>
            </div>
        </section>

        <div id="sponsorModal" class="modal contactPage highPotentialPage educationPage indexSponsor">
            <section class="contact-section modal-content">
                <span class="modalClose">&times;</span>
                <div class="container">
                    <div class="box-container">
                        <div class="left">
                            <h5>Sponsor Now</h5>
                            <form action="/contact/inquiry/modal" method="POST">
                                @csrf
                                {!! RecaptchaV3::field('contact', $name = 'g-recaptcha-response') !!}
                                @if ($errors->hasBag('modalErrorBag'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong>
                                        <ul>
                                            @foreach ($errors->modalErrorBag->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-control">
                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="image" id="imageModal">
                                    <input type="hidden" name="studentName" id="studentName">
                                    <input type="hidden" name="grade" id="grade">
                                    <input type="hidden" name="degree" id="degree">
                                </div>
                                <div class="form-control">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <div class="form-control">

                                        <input type="email" name="email" value="{{ old('email') }}"
                                            placeholder="Email Address">
                                    </div>
                                    <div class="form-control">

                                        <input type="text" name="phone" value="{{ old('phone') }}"
                                            placeholder="Phone">
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
                            <div class="topAchievers brighterPakistan highPotentialModal homePage">
                                <div class="container">
                                    <div class="bright-student right">
                                        <div class="bright-left">
                                            <div class="card">
                                                <div class="card-header">
                                                    <img class="studentImage" id="imageModalView" alt="">
                                                    <img class="capImage" src="assets/frontend/img/greenCap.png"
                                                        alt="">
                                                    <img class="crownImage"
                                                        src="{{ asset('assets/frontend/img/crown.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="card-body">
                                                    <h5 id="nameView"></h5>
                                                    <p class="result">Test Result</p>
                                                    <p class="grade" id="gradeView"></p>
                                                    <p class="degree" id="degreeView"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div id="allianceModal" class="modal contactPage">
            <section class="contact-section modal-content">
                <div class="allianceCloseBtn">
                    <span class="modalClose">&times;</span>
                </div>
                <div class="container">
                    <div class="box-container">
                        <div class="left">
                            <h5>Message Us</h5>
                            <form action="/contact/inquiry/alliance" method="POST">
                                @csrf
                                {!! RecaptchaV3::field('contact', $name = 'g-recaptcha-response') !!}
                                @if ($errors->hasBag('modalAllianceErrorBag'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong>
                                        <ul>
                                            @foreach ($errors->modalAllianceErrorBag->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (Session::has('successAlliance'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('successAlliance') }}</strong>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="form-control">
                                        <input type="text" name="allianceName" placeholder="Full Name"
                                            value="{{ old('allianceName') }}">
                                    </div>
                                    <div class="form-control">
                                        <input type="text" name="allianceOrganization" placeholder="Organization"
                                            value="{{ old('allianceOrganization') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control">
                                        <input type="email" placeholder="Email Address" name="allianceEmail"
                                            value="{{ old('allianceEmail') }}">
                                    </div>
                                    <div class="form-control">
                                        <input type="text" placeholder="Phone" name="alliancePhone"
                                            value="{{ old('alliancePhone') }}">
                                    </div>
                                </div>
                                <div class="form-control form-control-textarea">
                                    <textarea rows="5" name="allianceMessage" placeholder="Message">{{ old('allianceMessage') }}</textarea>
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
                                    <li><i class="fa-solid fa-envelope mr-2"></i><a
                                            href="mailto:someone@somewhere.com">info@daldafoundation.pk</a></li>
                                    <li> <i class="fa-solid fa-phone mr-2"></i>+92 2138636933</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="/assets/js/bootstrap4-toggle.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            @if (Session::has('successModal'))
                swal({
                    customClass: {
                        title: 'swal2-title'
                    },
                    icon: 'success',
                    title: '{{ Session::get('successModal') }}',
                    showConfirmButton: false,
                    timer: 25000
                })
            @endif

            const allianceModal = document.getElementById("allianceModal");
            const joinAllianceBtn = document.getElementById("joinAlliance");
            const alert = document.querySelector('.alert-danger');
            joinAllianceBtn.onclick = function() {
                allianceModal.style.display = "flex";
            }
            const allianceSpan = document.getElementsByClassName("allianceCloseBtn")[0];
            allianceSpan.onclick = function() {
                allianceModal.style.display = "none";
                if (typeof(alert) != 'undefined' && alert != null) {
                    alert.style.display = "none";
                }
            };
            @if ($errors->hasBag('modalErrorBag'))
                const container = document.getElementById('brighterPakistan');
                container.scrollIntoView();
                const modal = document.getElementById("sponsorModal");
                var id = {{ old('id') }};
                var image = '{{ old('image') }}';
                var name = '{{ old('studentName') }}';
                var grade = '{{ old('grade') }}';
                var degree = '{{ old('degree') }}';
                const idField = document.querySelector('#id');
                const imageField = document.querySelector('#imageModal');
                const nameField = document.querySelector('#studentName');
                const gradeField = document.querySelector('#grade');
                const degreeField = document.querySelector('#degree');
                const imageView = document.querySelector('#imageModalView');
                const nameView = document.querySelector('#nameView');
                const gradeView = document.querySelector('#gradeView');
                const degreeView = document.querySelector('#degreeView');
                if (id) {
                    idField.value = id;
                }
                if (image) {
                    imageField.value = image;
                    imageView.src = image;
                }
                if (name) {
                    nameField.value = name;
                    nameView.innerHTML = name;
                }
                if (grade) {
                    gradeField.value = grade;
                    gradeView.innerHTML = grade;
                }
                if (degree) {
                    degreeField.value = degree;
                    degreeView.innerHTML = degree;
                }
                modal.style.display = "flex";
            @endif
            @if ($errors->hasBag('modalAllianceErrorBag'))
                const container = document.getElementById('brighterPakistan');
                container.scrollIntoView();
                const modal = document.getElementById("allianceModal");
                modal.style.display = "flex";
            @endif
            @if (Session::has('successModal'))
                const container = document.getElementById('brighterPakistan-header');
                container.scrollIntoView();
            @endif
            @if (Session::has('successAlliance'))
                const container = document.getElementById('brighterPakistan');
                container.scrollIntoView();
                const modal = document.getElementById("allianceModal");
                modal.style.display = "flex";
            @endif
        });
    </script>
@endpush
{{-- old --}}
{{-- @section('content')
    <section class="home-banner">
        @include('website.layouts.navbar')
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
        >
            @if (count($resultSet) > 1)
                <ol class="carousel-indicators">
                    @for ($i = 0; $i < count($resultSet); $i++)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"
                            @if ($i == 0) class="active" @endif></li>
                    @endfor
                </ol>
            @endif
            <div class="carousel-inner">
                @forelse($resultSet as $val)
                    <div class="carousel-item  @if ($loop->first) active @endif"
                         style="width:100%; background: url('/assets/website/images/pages/landing/{{$val->banner}}') center/cover no-repeat;">
                        <div class="container carousel-caption d-md-block">
                            <div class="slide-content">
                                <h1>{{$val->title}}
                                </h1>
                                <p>
                                    {{$val->description}}
                                </p>
                                <button class="btn-red" type="button">Learn More</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="carousel-item slide-item-one active">
                        <div class="carousel-caption d-md-block">
                            <div class="slide-content">
                                <h1>dalda foundation trust</h1>
                                <p>
                                    The Dalda Foundation Trust (DFT) is an independent, non-profit
                                    organization who support and initiate projects related to
                                    health and education.
                                </p>
                                <button class="btn-red" type="button">Learn More</button>
                            </div>
                        </div>
                    </div>
                @endforelse
                <div class="header-social-icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>
        </div>
    </section>
    <section class="first-service-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 sm-12">
                    <div class="animate-text">
                        <div class="icon-changer">
                            <div class="animate-icon-box">
                                <span id="spin"></span>
                            </div>
                        </div>
                        <div class="non-animate-text">
                            جہاں مامتا وہاں ڈالڈا۔
                        </div>
                        <div class="non-animate-image">
                            <img src="/assets/website/images/mamta.png" class="img-fluid" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div>
                        <div class="card cstmDetailCards">
                            <div class="card-body">
                                <section class="customer-logos slider">
                                    @forelse($agricultureImages as $val)
                                        <div class="slide">
                                            <img src="{{ Storage::url('uploads/gallery/images/'.$val->image_name)}}"
                                                 class="img-fluid" alt="" style="max-width: 100%; height: 200px;"/>
                                        </div>
                                    @empty
                                        <div class="slide">
                                            <img src="/assets/website/images/card-two.png" class="img-fluid" alt=""
                                                 style="max-width: 100%; height: 200px;"/>
                                        </div>
                                    @endforelse
                                </section>
                            </div>
                            <div class="overlay-caption">
                                <h4>Agriculture</h4>
                                <p>All over Pakistan and International Scholat as </p>
                            </div>
                            <!-- <div class="card-footer">&nbsp;</div> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div>
                        <div class="card cstmDetailCards">
                            <div class="card-body">
                                <section class="customer-logos slider">
                                    @forelse($educationImages as $val)
                                        <div class="slide">
                                            <img src="{{ Storage::url('uploads/gallery/images/'.$val->image_name)}}"
                                                 class="img-fluid" alt="" style="max-width: 100%; height: 200px;"/>
                                        </div>
                                    @empty
                                        <div class="slide">
                                            <img src="/assets/website/images/card-one.png" class="img-fluid" alt=""
                                                 style="max-width: 100%; height: 200px;"/>
                                        </div>
                                    @endforelse
                                </section>
                            </div>
                            <div class="overlay-caption">
                                <h4>Education / Scholarship</h4>
                                <p>All over Pakistan and International Scholat as </p>
                            </div>
                            <!-- <div class="card-footer">&nbsp;</div> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div>
                        <div class="card cstmDetailCards">
                            <div class="card-body">
                                <section class="customer-logos slider">
                                    @forelse($hospitalImages as $val)
                                        <div class="slide">
                                            <img src="{{ Storage::url('uploads/gallery/images/'.$val->image_name)}}"
                                                 class="img-fluid" alt="" style="max-width: 100%; height: 200px;"/>
                                        </div>
                                    @empty
                                        <div class="slide">
                                            <img src="/assets/website/images/card-three.png" class="img-fluid" alt=""
                                                 style="max-width: 100%; height: 200px;"/>
                                        </div>
                                    @endforelse
                                </section>
                            </div>
                            <div class="overlay-caption">
                                <h4>Hospital</h4>
                                <p>All over Pakistan and International Scholat as </p>
                            </div>
                            <!-- <div class="card-footer">&nbsp;</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-fold-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="cstm-mb-70">
                        <div class="back-image">
                        </div>
                        <div class="back-image-1">
                        </div>
                        <div class="back-image-2">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="about-fold-content">
                        <span>about us</span>
                        <h2><strong>Dalda's </strong> Food Vision</h2>
                        <p>
                            There are many variations of passages of Lorem Ipsum available,
                            but the majority have suffered alteration in some form, by
                            injected humour, or randomised words which don't look even
                            slightly believable. If you are going to use a passage of Lorem
                            Ipsum, you need to be sure there isn't anything embarrassing
                            hidden in the middle of text. All the Lorem Ipsum generators on
                            the Internet tend to repeat predefined chunks as necessary,
                            making this the first true generator on the Internet
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">&nbsp;</div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="intro-fold-content">
                        <span>Intro Video</span>
                        <h2>Lets make a foundation tour from here</h2>
                        <p>
                            There are many variations of passages of Lorem Ipsum available,
                            by injected humour, or randomised words which don't look even
                            slightly believable. If you are going to use a passage of Lorem
                            Ipsum, you need to be sure there isn't anything embarrassing
                            hidden in the middle of text. All the Lorem Ipsum generators on
                            the Internet tend to repeat
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="play-bg">
            <a href="javacscript:;" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-play"></i></a>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog myModal modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="javascript:;player.api('pause')" data-dismiss="modal"
                            aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe class="cstmIfram embed-responsive-item" id="cartoonVideo"
                            src="https://www.youtube.com/embed/3eSXK_qZkCg"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>

            </div>
        </div>
    </div>
    <section class="new-gallery-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>gallery</h2>
                </div>
            </div>
        </div>
        <div class="filters filter-button-group">
            <ul>
                <li class="active"><a href="javascript:void(0);" data-filter="*">All</a></li>
                <li><a href="javascript:void(0);" data-filter="Education">Eductaion / Scholarship</a></li>
                <li><a href="javascript:void(0);" data-filter="Hospital">Health Care</a></li>
                <li><a href="javascript:void(0);" data-filter="Agriculture">Agriculture</a></li>
            </ul>
        </div>
        <div id="container" class="isotope">
            @forelse($galleryImages as $key => $val)
                <div class="grid-item"
                     data-filter="{{ $val->imageable_type == 'Education / Scholarship' ? 'Education' : $val->imageable_type }}">
                    <img src="{{ asset('storage/uploads/gallery/images/'.$val->image_name)}}"
                         alt="{{$val->imageable_type}}">
                    @if ($val->imageable_type === 'Hospital')
                        <div class="overlay">Health Care</div>
                    @else
                        <div class="overlay">{{$val->imageable_type}}</div>
                    @endif
                </div>
            @empty
                <div class="grid-item" data-filter="agriculture">
                    <a class="popupimg" href="javascript:;">
                        <img src="/assets/website/images/1.jpg">
                    </a>
                    <div class="overlay">Agriculture</div>
                </div>

                <div class="grid-item" data-filter="Eductaion / Scholarship">
                    <a class="popupimg" href="javascript:;">
                        <img src="https://drive.google.com/u/0/uc?id=1Izd6KrrgNXGmAV7QgQRpd7WTM-AfkE6x&export=download">
                    </a>
                    <div class="overlay"> Eductaion / Scholarship</div>
                </div>

                <div class="grid-item" data-filter="Health Care">
                    <a class="popupimg" href="javascript:;">
                        <img src="https://drive.google.com/u/0/uc?id=1xBNwn9Sgedoy3sAVrfuDPYNgl-ArlVaZ&export=download">
                    </a>
                    <div class="overlay">Health Care</div>
                </div>
            @endforelse
        </div>
    </section>
    <section class="productivity-fold mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="product-content">
                        <h2>Productivity of Hybird seed</h2>
                        <p>
                            There are many variations of passages of Lorem Ipsum available,
                            but the majority have suffered alteration in some form, by
                            injected humour, or randomised words which don't look even
                            slightly believable. If you are going to use a passage of Lorem
                            Ipsum, you need to be sure there isn't anything embarrassing
                            hidden in the middle of text. All the Lorem Ipsum generators on
                            the Internet tend to repeat predefined chunks as necessary,
                            making this the first true generator on the Internet
                        </p>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="groc-image">
                        <img src="/assets/website/images/grains-3.png" class="img-fluid" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="latest-news-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="latest-news-section">
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($news as $key => $val)
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div>
                            <div class="card-date">
                                <div class="date-area">{{\Illuminate\Support\Carbon::parse($val->created_at)->format('d')}}</div>
                                <div class="month-area">{{strtoupper(\Illuminate\Support\Carbon::parse($val->created_at)->format('M'))}}</div>
                            </div>
                            <div class="card cstm-news-card">
                                <div class="card-header"
                                     style="background: url('{{asset('assets/website/images/pages/media-center/'.$val->file)}}')!important; background-size: cover!important;">
                                </div>
                                <div class="card-body">
                                    <a href="/news/{{$val->id}}/detail" style="text-decoration: none;">
                                        <h3>{{$val->title}}</h3></a>
                                    <p>{{$val->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div>
                            <div class="card-date">
                                <div class="date-area">14</div>
                                <div class="month-area">APR</div>
                            </div>
                            <div class="card cstm-news-card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <h3>Asking Alexandria</h3>
                                    <p>
                                        The point of using Lorem Ipsum is that it has a more-or-less
                                        normal distribution of letters, as opposed to using 'Content
                                        here, content here', making it look like readable English
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div>
                            <div class="card-date">
                                <div class="date-area">14</div>
                                <div class="month-area">APR</div>
                            </div>
                            <div class="card cstm-news-card">
                                <div class="card-header two">
                                </div>
                                <div class="card-body">
                                    <h3>Ebook Store</h3>
                                    <p>
                                        The point of using Lorem Ipsum is that it has a more-or-less
                                        normal distribution of letters, as opposed to using 'Content
                                        here, content here', making it look like readable English
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div>
                            <div class="card-date">
                                <div class="date-area">14</div>
                                <div class="month-area">JAN</div>
                            </div>
                            <div class="card cstm-news-card">
                                <div class="card-header three">
                                </div>
                                <div class="card-body">
                                    <h3>Reclaimer</h3>
                                    <p>
                                        The point of using Lorem Ipsum is that it has a more-or-less
                                        normal distribution of letters, as opposed to using 'Content
                                        here, content here', making it look like readable English
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>


@push('scripts')
    <script src="/assets/website/js/home.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script>
        $('.popupimg').magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom',
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,

                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function

                opener: function (openerElement) {

                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    </script>
@endpush --}}
