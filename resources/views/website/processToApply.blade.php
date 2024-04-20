@extends('website.layout.master')

@section('content')
    <div class="contactPage highPotentialPage educationPage processToApplyPage">


        <section class="high-potential-header">
            <div class="container">
                <div class="high-potential-top">
                    <div class="back-btn">
                        <a href="/">
                            <i class="fa fa-angle-left"></i> Go Back
                        </a>
                    </div>
                    <h3 class="title-heading">{{ $process->heading }}</h3>

                </div>
                <div class="high-potential-bottom">
                    <div class="student-counter">
                        <div class="left">
                            <img src="assets/frontend/img/capGreyLight.png" alt="">
                            <p>Applied Scholarships</p>
                        </div>
                        <div class="right">
                            <p>{{$scholarshipCount}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="dftSection">
            <div class="container">

                {!! $process->sub_heading !!}
                {!! $process->description !!}

            </div>
        </section>

        <section class="scholarship">
            <div class="img-overlay"></div>
            <img src="{{ !empty($process->image) ? asset('assets/website/images/pages/process-to-apply/' . $process->image) : '/assets/frontend/img/processtoapply.png' }}"/>
            {{-- <img src="assets/frontend/img/processtoapply.png" alt=""> --}}
            <div class="container">
                <div class="content">

                    {!! $process->image_description1 !!}
                    <div class="inner">
                        {!! $process->image_description2 !!}

                    </div>


                </div>
            </div>

        </section>
        <section class="dft-performance">
            <div class="container">
                <div class="right">
                    <h6>The process to apply for the DFT scholarship entails the following steps:</h6>

                        {!! $process->apply_steps !!}

                    <div class="buttonContainer">
                        <a href="/confirm-student" class="btn btn-primary">Apply Now</a>

                    </div>

                </div>
            </div>

        </section>




    </div>
@endsection
