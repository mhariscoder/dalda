@extends('website.layouts.master')

@section('content')
    <section class="about-banner donate-banner">
        @include('website.layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-area">
                        <h1>Donate Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-about-first-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Our Donations</h2>
                    <hr>
                    <p>  Dalda Foundation Trust provides support to numerous causes that are of great importance to the people Pakistan.</p>

                    <p>The generosity of individuals, businesses and other organizations across the region enables the Foundation to fulfill its mission of advancing quality health care and Education in our region and creating a difference through giving. These donations allow
                        us to provide much needed services throughout each of the DALDA facilities.</p>

                    <p>To make a gift by mail, send your cheque made out to “ Dalda Foundation Trust” to 7C Nishat Commericial Area, Khayaban-e-Bukhari, Phase 6, DHA, Karachi, Pakistan.</p>
                    <!-- <button class="btn btn-red">Explore More!</button> -->
                </div>
            </div>
        </div>
    </section>
    <section class="section-donate-second-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <span><i class="fal fa-hands-usd fa-4x"></i></span>
                                    <h2>Donation</h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <span><i class="fab fa-airbnb fa-4x"></i></span>
                                    <h2>Fundraiser</h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <span><i class="fas fa-assistive-listening-systems fa-4x"></i></span>
                                    <h2>Volunteer</h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush