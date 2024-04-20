@extends('website.layout.master')
@section('content')
    <div class="contactPage highPotentialPage educationPage">
        <section class="high-potential-header">
            <div class="container">
                <div class="high-potential-top">
                    <div class="back-btn">
                        <a href="/">
                            <i class="fa fa-angle-left"></i> Go Back
                        </a>
                    </div>
                    <h2>Partner with DFT to Sponsor Remarkable</h2>
                    <h3 class="title-heading">High-Potential Students</h3>
                </div>
                <div class="high-potential-bottom">
                    <div class="search">
                        <form action="/high-potentials" method="GET" role="search">
                            <div class="search-input form-control">
                                <input type="text" class="form-control" id="search" value="{{ old('search') }}"
                                    placeholder="Search.." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>

                    </div>
                    <div class="student-counter">
                        <div class="left">
                            <img src="{{ asset('assets/frontend/img/capGreyLight.png') }}" alt="">
                            <p>Students</p>
                        </div>
                        <div class="right">
                            <p>{{ $students }}+</p>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="topAchievers brighterPakistan">
            <div class="container">
                @if (Session::has('successModal'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('successModal') }}</strong>
                                    </div>
                                @endif
                <div class="bright-student right">
                    <div class="bright-left">
                        @if (count($high_potentials) > 0)
                            @foreach ($high_potentials as $high_potential)
                                <div class="card">
                                    <div class="card-header">
                                        <img class="studentImage" src="{{ $high_potential->student->profile_picture }}"
                                            alt="">
                                        <img class="capImage" src="assets/frontend/img/greenCap.png" alt="">
                                        <img class="crownImage" src="{{ asset('assets/frontend/img/crown.png') }}"
                                            alt="">
                                    </div>
                                    <div class="card-body">
                                        <h5>{{ $high_potential->student->full_name ?? '' }}</h5>
                                        <p class="result">Test Result</p>
                                        <p class="grade">
                                            {{ $high_potential->student->getTestResults->percentage ?? '' }} %</p>
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
                        @else
                            <h1 class="error-msg">no results found</h1>
                        @endif
                        {{-- <div class="card">
                            <div class="card-header">
                                <img class="studentImage" src="{{ asset('assets/frontend/img/topAchieverBoy.png') }}"
                                    alt="">
                                <img class="capImage" src="{{ asset('assets/frontend/img/greenCap.png') }}" alt="">
                                <img class="crownImage" src="{{ asset('assets/frontend/img/crown.png') }}" alt="">
                            </div>
                            <div class="card-body">
                                <h5>Haleema Sadia</h5>
                                <p class="result">Test Result</p>
                                <p class="grade">Grade A</p>
                                <p class="degree"> Bachelors Degree</p>
                                <a href="" class="btn btn-tertiary sponsorNow">sponsor now</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
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
                                <input type="text" name="name" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <div class="form-control">

                                    <input type="email" name="email" placeholder="Email Address">
                                </div>
                                <div class="form-control">

                                    <input type="text" name="phone" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-control form-control-textarea">

                                <textarea rows="5" name="message" placeholder="Message"></textarea>
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
        <div id="sponsorModal" class="modal contactPage highPotentialPage educationPage indexSponsor">
            <section class="contact-section modal-content">
                <span class="modalClose">&times;</span>
                <div class="container">
                    <div class="box-container">
                        <div class="left">
                            <h5>Sponsor Now</h5>
                            <form action="/contact/inquiry/modal" method="POST">
                                @csrf
                                {!! RecaptchaV3::field('contact',$name='g-recaptcha-response') !!}
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
        {{-- <div id="sponsorModal" class="modal contactPage">
            <section class="contact-section modal-content">
                <span class="modalClose">&times;</span>
                <div class="container">
                    <div class="box-container">
                        <div class="left">
                            <h5>Message Us</h5>
                            <form action="/contact/inquiry/modal" method="POST">
                                @csrf
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
                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('success') }}</strong>
                                    </div>
                                @endif
                                <input type="hidden" name="id" id="id">
                                <div class="form-control">
                                    <input type="text" name="name" placeholder="Full Name"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <div class="form-control">

                                        <input type="email" name="email" placeholder="Email Address"
                                            value="{{ old('email') }}">
                                    </div>
                                    <div class="form-control">

                                        <input type="text" name="phone" placeholder="Phone"
                                            value="{{ old('phone') }}">
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
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            @if ($errors->any() || Session::has('success'))
                const container = document.getElementById('contact-section');
                container.scrollIntoView();
            @endif
            @if ($errors->hasBag('modalErrorBag'))
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

        });
    </script>
@endpush
