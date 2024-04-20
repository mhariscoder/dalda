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
    <section class="section-blog-first-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Welcome to Our Blogs</h2>
                    <hr>
                </div>
            </div>
        </div>
    </section>
    <section class="section-blog-second-fold">
        <div class="container">
            <div class="row">
                <div id="posts-wrapper" class="col-lg-8 col-md-12 col-sm-12">
                    @forelse($allPosts as $key => $val)
                        <div class="card blogCard">
                            <div class="blogCardFlex">
                                <div class="imgarea">
                                    <img src="{{asset('assets/website/blog/images/'.$val->image)}}" class="img-fluid"
                                         alt=""/>
                                </div>
                                <div class="blog-card-content">
                                    <h2>{{$val->title}}</h2>
                                    <p>{{$val->description}}</p>
                                    <a href="/blog/posts/{{$val->slug}}/detail">Read More</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p>Currently there is no post available.</p>
                    @endforelse
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    @foreach($featuredPosts as $key => $val)
                        <div class="mt-3">
                            <div class="card cstm-news-card">
                                <div class="card-header" style="background: url('{{asset('assets/website/blog/images/'.$val->image)}}')">
                                </div>
                                <div class="card-body">
                                    <h3>{{$val->title}}</h3>
                                    <p>{{$val->description}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection