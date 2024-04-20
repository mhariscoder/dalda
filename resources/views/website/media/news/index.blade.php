@extends('website.layouts.master')

@section('content')
    <section class="about-banner blog-banner">
        @include('website.layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-area">
                        <h1>News</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-blog-first-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Our News</h2>
                    <hr>
                </div>
            </div>
        </div>
    </section>
    <section class="section-blog-second-fold">
        <div class="container">
            <div class="row">
                <div id="posts-wrapper" class="col-lg-12 col-md-12 col-sm-12">
                    @forelse($news as $key => $val)
                        <div class="card blogCard">
                            <div class="blogCardFlex">
                                <div class="imgarea">
                                    <img src="{{asset('assets/website/images/pages/media-center/'.$val->file)}}" class="img-fluid"
                                         alt=""/>
                                </div>
                                <div class="blog-card-content">
                                    <h2>{{$val->title}}</h2>
                                    <p style="width: auto; text-align: justify;;">{{$val->description}}</p>
                                    <a href="/news/{{$val->id}}/detail">Read More</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Currently there is no news available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection