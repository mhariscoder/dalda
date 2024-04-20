@extends('website.layout.master')

@section('content')
<div class="achieverPage">


    <section class="achievers">
        <div class="achieverPage-header">
            <h3 class="title-heading">STORIES OF ACHIEVERS</h3>
        </div>
        <div class="owl-carousel
         achieverVideo
          owl-theme container">
            @foreach ($stories as $story)
                <div class="mentor">
                    <div class="video-container">
                        <img src="{{ !empty($story->image) ? asset('/assets/website/images/highAchievers/' . $story->image) : '/assets/frontend/img/ahmedsidiqui.png' }}"
                                        alt="" style="height: 100%; width:100%">
                        {{-- <video src="./img/videos/pexels-karolina-grabowska-8142387_1.mp4" loop muted></video> --}}
                        {{-- <div href="#" class="icon">
                            <i class="fa-solid fa-circle-play"></i>
                        </div> --}}
                    </div>
                    <div class="overlay">
                        <p>
                            @php
                                $parts = explode(".", $story->description);
                            @endphp
                            {{ strip_tags($parts[0]) }}
                        </p>

                    </div>

                    <div class="text-container">
                        <h5>{{ $story->student->full_name ?? '' }}</h5>
                        <p class="role">{{$story->designation ?? ''}}</p>
                        <p class="university">{{ $story->organization ?? '' }}<p>
                        {{-- <p class="aim">{{ $story->student->getClaimedScholarships->first()->goal ?? '' }}</p> --}}
                        <a href="/achievers-profile/{{ $story->student->id}}" class="btn btn-primary-outline">View More <i class="fa-solid fa-chevron-right"></i></a>
                    </div>

                </div>
            @endforeach
            {{-- <div class="mentor">
                <div class="video-container">
                    <video src="./img/videos/pexels-olia-danilevich-8060938.mp4" loop muted></video>
                    <div href="#" class="icon">
                        <i class="fa-solid fa-circle-play"></i>
                    </div>
                </div>
                <div class="overlay">
                    <p>
                        DFT offered me an overall
                        growth in terms of academics
                        and as well as
                        personal
                        growth.
                    </p>

                </div>

                <div class="text-container">
                    <h5>Daniyal Raza</h5>
                    <p class="role">Student</p>
                    <p class="university">OXFORD UNIVERSITY, LONDON</p>
                    <p class="aim">We aim to make the world a healthier & educated place</p>
                    <a href="" class="btn btn-primary-outline">View More <i class="fa-solid fa-chevron-right"></i></a>
                </div>

            </div>
            <div class="mentor">
                <div class="video-container">
                    <video src="./img/videos/pexels-pavel-danilyuk-7945850.mp4" loop muted></video>
                    <div href="#" class="icon">
                        <i class="fa-solid fa-circle-play"></i>
                    </div>
                </div>
                <div class="overlay">
                    <p>
                        DFT offered me an overall
                        growth in terms of academics
                        and as well as
                        personal
                        growth.
                    </p>

                </div>
                <div class="text-container">
                    <h5>Daniyal Raza</h5>
                    <p class="role">Student</p>
                    <p class="university">OXFORD UNIVERSITY, LONDON</p>
                    <p class="aim">We aim to make the world a healthier & educated place</p>
                    <a href="" class="btn btn-primary-outline">View More <i class="fa-solid fa-chevron-right"></i></a>

                </div>

            </div>
            <div class="mentor">
                <div class="video-container">
                    <video src="./img/videos/pexels-pavel-danilyuk-7945855.mp4" loop muted></video>
                    <div href="#" class="icon">
                        <i class="fa-solid fa-circle-play"></i>
                    </div>
                </div>
                <div class="overlay">
                    <p>
                        DFT offered me an overall
                        growth in terms of academics
                        and as well as
                        personal
                        growth.
                    </p>

                </div>

                <div class="text-container">
                    <h5>Haleema Tariq</h5>
                    <p class="role">Student</p>
                    <p class="university">OXFORD UNIVERSITY, LONDON</p>
                    <p class="aim">We aim to make the world a healthier & educated place</p>
                    <a href="" class="btn btn-primary-outline">View More <i class="fa-solid fa-chevron-right"></i></a>
                </div>

            </div> --}}
        </div>
    </section>
</div>
@endsection
