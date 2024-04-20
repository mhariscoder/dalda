@extends('website.layouts.master')

@section('content')
    <section class="about-banner">
        @include('website.layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-area">
                        <h1>Hall Of Fame</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-about-first-fold">
        <div class="container">
            <div class="card-deck">
                @forelse($students as $val)
                    <div class="card" style="max-width: 200px">
                        <img class="card-img-top" src="{{ empty($val->file) ? $val->user->profile_picture : asset('assets/website/images/pages/media-center/'.$val->file) }}"
                             alt="Card image cap" style="width: 200px; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">{{$val->user->full_name}}</h5>
                        </div>
                    </div>
                @empty
                    <p></p>
                @endforelse
            </div>
        </div>
    </section>
@endsection