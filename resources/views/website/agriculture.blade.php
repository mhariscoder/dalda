@extends('website.layout.master')

@section('content')
<div class="aboutPage agriculturePage">
    <section class="inner-banner">

        <div class="container">
                {!! $agriculture->banner_heading !!}
       </div>
        <img src="{{ \App\Models\CMSAgriculture::IMAGE_PATH."".$agriculture->banner }}" />
    </section>
    <section class="ourMission">
        <div class="container">

            <h3 class="title-heading">{{ $agriculture->heading }}</h2>
                {!! $agriculture->description !!}
        </div>

    </section>
    <section class="glimpseIntoWorld">
        <div class="container">
            <div class="block ">



                <div class="left">
                    <img src="{{ \App\Models\CMSAgriculture::IMAGE_PATH."".$agriculture->section1_image1 }}" alt="establishment">
                </div>

                <div class="right">
                    {!! $agriculture->section1_content1 !!}
                </div>
            </div>

            <div class="block">


                <div class="left">
                    <img src="{{ \App\Models\CMSAgriculture::IMAGE_PATH."".$agriculture->section1_image2 }}" alt="research">

                </div>

                <div class="right">
                    {!! $agriculture->section1_content2 !!}
                </div>

            </div>
        </div>
    </section>

    <section class="dftSection">
        <div class="container">
            {!! $agriculture->section2_content !!}

        </div>
    </section>

    <section class="staticImage">
        <div class="container">
            <img src="{{ \App\Models\CMSAgriculture::IMAGE_PATH."".$agriculture->section2_image }}">
        </div>
    </section>


    <section class="universityPlacements">
        <div class="universityPlacements-header">
            <h3 class="title-heading">{{ $agriculture->section3_heading }}</h3>
            {!! $agriculture->section3_content !!}
        </div>

        <div class="owl-carousel owl-theme universityLogos ">
            @forelse ($uni_logos as $logo)
                <div class="item">
                    <img src="{{ \App\Models\UniversityIcons::IMAGE_PATH."".$logo->icon }}">
                </div>
            @empty

            @endforelse
        </div>

    </section>
    <section class="imagesGallery">
        <div class="container">
            <h6>Image Gallery & Videos</h6>
            <div class="imagesGallery-container imagesGallery-desktop rtl-slider-flex">
                <div class="left">
                    <div class="rtl-slider" style="width: 100%;">
                        @foreach ($agriculture->getVideos as $video)
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
                <div class="right">
                    @foreach ($agriculture->getVideos as $key => $video)
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
    <!-- <section class="imagesGallery">
        <div class="container">
            <h6>Image Gallery & Videos</h6>


        </div>
    </section> -->


    <section class="health-images">
        <div class="container">
            @foreach ($agriculture->getImages as $key => $video)
                <div>
                    <img src="{{ $video->image_url }}">
                </div>
            @endforeach
        </div>
    </section>

    <section class="glimpseIntoWorld">
        <div class="container">
            <div class="block ">



                <div class="left">
                    <img src="{{ \App\Models\CMSAgriculture::IMAGE_PATH."".$agriculture->section4_image }}" alt="glimpse">
                </div>

                <div class="right">
                    {!! $agriculture->section4_content !!}

                </div>
            </div>


        </div>
    </section>



</div>
@endsection

@push('scripts')
@endpush
