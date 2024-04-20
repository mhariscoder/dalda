@extends('website.layouts.master')

@section('content')
    <section class="about-banner blog-banner">
        @include('website.layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-area">
                        <h1>Blog</h1>
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
                        <h2>{{$post->title}}</h2>
                        <img src="{{asset('assets/website/blog/images/'.$post->image)}}" class="img-fluid" alt=""/>

                        <p>{{$post->description}}
                        </p>

                        <small class="ml-2">
                            @foreach($post->getTags as $key => $val)
                                <a href="/blog/posts?tag={{$val->slug}}">#{{$val->name}}</a>
                            @endforeach
                        </small>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection