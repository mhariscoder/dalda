@extends('website.layout.master')

@section('content')
    <div class=" highPotentialPage processToApplyPage achieverProfilePage">
        <section class="high-potential-header">
            <div class="container">
                <div class="high-potential-top">
                    <div class="back-btn">
                        <a href="{{url()->previous()}}">
                            <i class="fa fa-angle-left"></i> Go Back
                        </a>
                    </div>
                    <h3 class="title-heading">ACHIEVERS PROFILE</h3>

                </div>

            </div>
        </section>

        <section class="profileDetail">
            <div class="left">
                <div class="background">
                    <img
                        src="{{ !empty($achiever->image) ? asset('/assets/website/images/highAchievers/' . $achiever->image) : '/assets/frontend/img/ahmedsidiqui.png' }}" />
                </div>
            </div>
            <div class="right">
                <h5 class="title">{{ $achiever->student->full_name }}</h5>
                <p class="designation">{{ $achiever->designation }}</p>
                <p class="location">{{ $achiever->organization }}</p>
                <div class="bottom">
                    <img src="/assets/frontend/img/invertedComma.png" class="leftComma" />
                    <h5 class="bold-text"> {!! $achiever->description !!}</h5>

                    <img src="/assets/frontend/img/invertedComma.png" class="rightComma" />
                    {!! $achiever->details !!}
                </div>
            </div>
        </section>
        <div class="highAchiever">
            <div class="container">
                <h5 class="heading">OUR TOP 10 HIGH ACHIEVERS</h5>

                <div class="viewall">
                    <a href="/high-achievers" class="btn btn-green-outline">View All <i
                            class="fa-solid fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="top-achievers-scroll-container container">
                @foreach ($allAchievers as $remaining)
                    <div class="card">
                        <div class="card-header">

                            <img src="{{ !empty($remaining->image) ? asset('/assets/website/images/highAchievers/' . $remaining->image) : '/assets/frontend/img/topAchieverBoy.png' }}"
                                class="studentImage" />


                            <img class="capImage" src="/assets/frontend/img/greenCap.png" alt="">
                            <img class="crownImage" src="/assets/frontend/img/crown.png" alt="">
                        </div>
                        <div class="card-body">
                            <h5>{{ $remaining->student->full_name }}</h5>
                            <p class="grade">
                                {{ $remaining->designation?? '' }}</p>
                            <p class="degree">
                                {{ $remaining->organization?? '' }}
                            </p>


                            <a href="/achievers-profile/{{ $remaining->student->id }}"
                                class="btn btn-tertiary ">View Profile</a>
                        </div>

                    </div>
                @endforeach


                {{-- <div class="card">
                    <div class="card-header">
                        <img class="studentImage" src="assets/frontend/img/topAchieverBoy.png" alt="">
                        <img class="capImage" src="assets/frontend/img/greenCap.png" alt="">
                        <img class="crownImage" src="assets/frontend/img/crown.png" alt="">
                    </div>
                    <div class="card-body">
                        <h5>Haleema Sadia</h5>
                        <p class="result">Test Result</p>
                        <p class="grade">Grade A</p>
                        <p class="degree"> Bachelors Degree</p>
                        <a href="" class="btn btn-tertiary sponsorNow">View Profile</a>
                    </div>

                </div>


                <div class="card">
                    <div class="card-header">
                        <img class="studentImage" src="assets/frontend/img/topAchieverBoy.png" alt="">
                        <img class="capImage" src="assets/frontend/img/greenCap.png" alt="">
                        <img class="crownImage" src="assets/frontend/img/crown.png" alt="">
                    </div>
                    <div class="card-body">
                        <h5>Haleema Sadia</h5>
                        <p class="result">Test Result</p>
                        <p class="grade">Grade A</p>
                        <p class="degree"> Bachelors Degree</p>
                        <a href="" class="btn btn-tertiary sponsorNow">View Profile</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <img class="studentImage" src="assets/frontend/img/topAchieverBoy.png" alt="">
                        <img class="capImage" src="assets/frontend/img/greenCap.png" alt="">
                        <img class="crownImage" src="assets/frontend/img/crown.png" alt="">
                    </div>
                    <div class="card-body">
                        <h5>Haleema Sadia</h5>
                        <p class="result">Test Result</p>
                        <p class="grade">Grade A</p>
                        <p class="degree"> Bachelors Degree</p>
                        <a href="" class="btn btn-tertiary sponsorNow">View Profile</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <img class="studentImage" src="assets/frontend/img/topAchieverBoy.png" alt="">
                        <img class="capImage" src="assets/frontend/img/greenCap.png" alt="">
                        <img class="crownImage" src="assets/frontend/img/crown.png" alt="">
                    </div>
                    <div class="card-body">
                        <h5>Haleema Sadia</h5>
                        <p class="result">Test Result</p>
                        <p class="grade">Grade A</p>
                        <p class="degree"> Bachelors Degree</p>
                        <a href="" class="btn btn-tertiary sponsorNow">View Profile</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <img class="studentImage" src="assets/frontend/img/topAchieverBoy.png" alt="">
                        <img class="capImage" src="assets/frontend/img/greenCap.png" alt="">
                        <img class="crownImage" src="assets/frontend/img/crown.png" alt="">
                    </div>
                    <div class="card-body">
                        <h5>Haleema Sadia</h5>
                        <p class="result">Test Result</p>
                        <p class="grade">Grade A</p>
                        <p class="degree"> Bachelors Degree</p>
                        <a href="" class="btn btn-tertiary sponsorNow">View Profile</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <img class="studentImage" src="assets/frontend/img/topAchieverBoy.png" alt="">
                        <img class="capImage" src="assets/frontend/img/greenCap.png" alt="">
                        <img class="crownImage" src="assets/frontend/img/crown.png" alt="">
                    </div>
                    <div class="card-body">
                        <h5>Haleema Sadia</h5>
                        <p class="result">Test Result</p>
                        <p class="grade">Grade A</p>
                        <p class="degree"> Bachelors Degree</p>
                        <a href="" class="btn btn-tertiary sponsorNow">View Profile</a>
                    </div>
                </div> --}}




            </div>
        </div>






    </div>
@endsection
