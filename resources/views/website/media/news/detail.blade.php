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
    <section class="section-blogDetails-second-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div>
                        <h2>{{$news->title}}</h2>
                        <img src="{{asset('assets/website/images/pages/media-center/'.$news->file)}}" class="img-fluid" alt=""/>

                        <p>{{$news->description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection