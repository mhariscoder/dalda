@extends('website.layout.master')

@section('content')
    <div class="aboutPage healthPage agriculturePage">
        <section class="inner-banner">
            <div class="container">
                {!! $health->banner_heading !!}
            </div>
            <img src="{{ \App\Models\CmsHealth::IMAGE_PATH."".$health->banner }}" />
        </section>
        <section class="ourMission">
            <div class="container">
                <h3 class="title-heading">{{ $health->heading }}</h2>
                    {!! $health->description !!}
            </div>
        </section>
        <section class="glimpseIntoWorld">
            <div class="container">
                <div class="block ">
                    <div class="left">
                        <img src="{{ \App\Models\CmsHealth::IMAGE_PATH."".$health->section1_image1 }}" alt="glimpse">
                    </div>
                    <div class="right">
                        {!! $health->section1_content1 !!}
                    </div>
                </div>
                <div class="block">
                    <div class="left">
                        <img src="{{ \App\Models\CmsHealth::IMAGE_PATH."".$health->section1_image2 }}" alt="journey">

                    </div>
                    <div class="right">
                        {!! $health->section1_content2 !!}
                    </div>
                </div>
        </section>
        <section class="dftSection">
            <div class="container">
                {!! $health->section2_content !!}
                <div class="health-program">
                    @foreach ($health->hospitals as $hospital)
                        <div class="program">
                            <img src="{{ $hospital->image_url }}" />
                            <p>{{ $hospital->name }}</p>
                        </div>
                    @endforeach
                </div>
        </section>
        <section class="imagesGallery">
            <div class="container">
                <h6>Image Gallery & Videos</h6>
                <div class="imagesGallery-container imagesGallery-desktop rtl-slider-flex">
                    <div class="left">
                        <div class="rtl-slider" style="width: 100%;">
                            @foreach ($health->getVideos as $video)
                                <div class="rtl-slider-slide imagesGallery-card ">
                                    <video src="{{ $video->video_url }}" loop muted></video>
                                    <div href="#" class="play-icon">
                                        <i class="fa-solid fa-circle-play"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="right">

                        <div class="rtl-slider-nav">
                            @foreach ($videos_thumbnail as $video)
                                <div class="rtl-slider-slide imagesGallery-card">
                                    <video src="{{ $video }}" loop muted></video>
                                </div>
                             @endforeach
                        </div>
                    </div>
                    <span class="thumb-prev imagesGallery-nav"><i class="fa fa-angle-left "></i></span>
                    <span class="thumb-next imagesGallery-nav"><i class="fa fa-angle-right "></i><span>
                </div>
                <div class="imagesGallery-container imagesGallery-mobile">
                    {{-- <div class="left">
                        <div class="imagesGallery-card">
                            <video src="./img/videos/health-mobile-1.mp4" poster="./img/videos/health-poster-1.png" loop
                                muted playsinline></video>

                            <div href="#" class="icon">
                                <i class="fa-solid fa-circle-play"></i>
                            </div>
                        </div>
                    </div> --}}
                    <div class="right">
                        @foreach ($health->getVideos as $key => $video)
                            <div class="imagesGallery-card">
                                <video src="{{ $video->video_url }}" type=" video/mp4"  loop muted playsinline></video>
                                <div href="#" class="play-icon">
                                    <i class="fa-solid fa-circle-play"></i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="health-images">
            <div class="container">
                @foreach ($health->getImages as $key => $video)
                    <div>
                        <img src="{{ $video->image_url }}">
                    </div>
                @endforeach
            </div>
        </section>
        <section class="health-details">
            <div class="container box-container">
                <div class="card">
                    <h5>
                        Entitlement Criteria</h5>
                    <ul class="star-list">

                        <li>Support patient on the recommendation of hospital management.</li>
                        <li>Identification of patients will be done by the concerned department.</li>
                    </ul>
                </div>
                <div class="card">
                    <h5>
                        Detail of Health Centers</h5>
                    <ul class="star-list">

                        <li>Health center which provides health facilities to third party employees.</li>
                    </ul>
                </div>
                <div class="card">
                    <h5>
                        Health Support</h5>
                    <ul class="star-list">

                        <li>Health center which provides health facilities to third party employees.</li>
                        <li>Getting a quote from other hospitals, comparing the cost to hospitals and getting
                            approval from the trustee</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
