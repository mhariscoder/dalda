@extends('website.layout.master')

@section('content')
    <div class="highPotentialPage educationPage processToApplyPage screeningCriteriaPage">


        <section class="high-potential-header">
            <div class="container">
                <div class="high-potential-top">
                    <div class="back-btn">
                        <a href="/">
                            <i class="fa fa-angle-left"></i> Go Back
                        </a>
                    </div>
                    <h3 class="title-heading">{{ $screening->heading }}</h3>

                </div>
            </div>
        </section>
        <div class="container">
            <section class="dftSection">
                <div class="container">
                    {!! $screening->description !!}

                </div>
            </section>
            <section class="dft-performance">
                <div class="container">
                    <div class="right">
                        <h6>The screening criteria entails the following:</h6>

                        <ul>
                            {!! $screening->criteria_points !!}

                        </ul>

                        <div class="buttonContainer">
                            <a href="/confirm-student" class="btn btn-primary">Apply Now</a>

                        </div>

                    </div>
                </div>

            </section>

            <section class="selection-process">
                <div class="container">
                    <div class="selection-process-top">
                        <h3 class="title-heading">{{ $screening->section2_heading }}</h3>

                    </div>
                    <div class="container">
                        <div class="block ">
                            <div class="left">
            <img src="{{ !empty($screening->section2_image) ? asset('assets/website/images/pages/screening-criteria/' . $screening->section2_image) : '/assets/frontend/img/processtoapply.png' }}"/>

                                {{-- <img src="assets/frontend/img/selectionProcess.png" class="img-fluid" alt="glimpse"> --}}
                            </div>

                            <div class="right">

                                {!! $screening->section2_content !!}

                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <section class="dftSection">
                <div class="container">
                    {!! $screening->section3_heading !!}
                    {{-- <h3 class="title-heading">"Scholarship scheme for internal employees and their children"</h3> --}}
                    {!! $screening->section3_description !!}

                </div>
            </section>
            <section class="dft-performance">
                <div class="container">
                    <div class="right">
                        <h6>DFT Profiling of High Achievers:</h6>

                        <ul>
                            {!! $screening->high_achievers_points !!}



                        </ul>

                        <div class="buttonContainer">
                            <a href="/confirm-student" class="btn btn-primary">Apply Now</a>

                        </div>

                    </div>
                </div>

            </section>


        </div>




    </div>
@endsection
