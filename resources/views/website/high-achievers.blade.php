@extends('website.layout.master')
@section('content')
    <div class="contactPage highPotentialPage educationPage topAchievers">


        <section class="high-potential-header">
            <div class="container">
                <div class="high-potential-top">
                    <div class="back-btn">
                        <a href="{{ url()->previous() }}">
                            <i class="fa fa-angle-left"></i> Go Back
                        </a>
                    </div>
                    <h3 class="title-heading">OUR TOP 10 HIGH ACHIEVERS</h3>

                </div>
                <div class="high-potential-bottom">
                    <div class="search">
                        <form action="/high-achievers" method="GET" role="search">

                            <div class="search-input form-control">
                                <input type="text" class="form-control" id="search" value="{{ old('search') }}"
                                    placeholder="Search.." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>

                    </div>

                    <div class="student-counter">
                        <div class="left">
                            <img src="./img/capGreyLight.png" alt="">
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


                <div class="bright-student right">
                    <div class="bright-left">
                        @if (count($high_achievers) > 0)
                            @foreach ($high_achievers as $high_achiever)
                                <div class="card">
                                    <div class="card-header">
                                        <img class="studentImage"
                                            src="{{ !empty($high_achiever->image) ? asset('/assets/website/images/highAchievers/' . $high_achiever->image) : '/assets/frontend/img/ahmedsidiqui.png' }}"
                                            alt="">
                                        <img class="capImage" src="assets/frontend/img/greenCap.png" alt="">
                                        <img class="crownImage" src="{{ asset('assets/frontend/img/crown.png') }}"
                                            alt="">
                                    </div>
                                    <div class="card-body">
                                        <h5>{{ $high_achiever->student->full_name ?? '' }}</h5>
                                        <p class="grade">
                                            {{ $high_achiever->designation ?? '' }}</p>
                                        <p class="degree">
                                            {{ $high_achiever->organization ?? '' }}
                                        </p>

                                        <a href="/achievers-profile/{{ $high_achiever->student->id }}"
                                            class="btn btn-tertiary  ">View Profile</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h1 class="error-msg">no results found</h1>
                        @endif

                    </div>


                </div>
            </div>

        </div>




        <section class="contact-section">
            <div class="container">
                <div class="box-container">
                    <div class="left">
                        <h5>Message Us</h5>
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



        <div id="sponsorModal" class="modal contactPage">


            <section class="contact-section modal-content">
                <span class="modalClose">&times;</span>
                <div class="container">
                    <div class="box-container">
                        <div class="left">
                            <h5>Message Us</h5>
                            <form>

                                <div class="form-control">

                                    <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <div class="form-control">

                                        <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-control">

                                        <input type="text" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="form-control form-control-textarea">

                                    <textarea rows="5" name="message" placeholder="Message">{{ old('message') }}</textarea>
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



        </div>


    </div>

@endsection
@push('scripts')
@endpush
