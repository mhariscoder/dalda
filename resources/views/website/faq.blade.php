@extends('website.layouts.master')

@section('content')
    <section class="about-banner faq-banner">
        @include('website.layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-area">
                        <h1>{{$faq->title ?? 'FAQ'}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-Faq-first-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>We're Here to help you</h2>
                    <hr>
                </div>
            </div>
        </div>
    </section>

    <section class="section-Faq-second-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="card cstmFaqcard">
                        <i class="fas fa-search fa-3x"></i>

                        <h3>Guides</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="card cstmFaqcard">
                        <i class="far fa-comment-alt-lines fa-3x"></i>

                        <h3>FAQs</h3>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="card cstmFaqcard">
                        <i class="fas fa-user-tie fa-3x"></i>

                        <h3>Community</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-healthCare-second-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="accordionExample" class="accordion shadow">
                        @forelse($faqs as $key=> $val)
                            <div class="card accordion-card">
                                <div id="heading{{$val->type.$val->id}}" class="card-header  shadow-sm border-0">
                                    <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse"
                                                                         data-target="#{{$val->id}}"
                                                                         aria-expanded="true"
                                                                         aria-controls="{{$val->id}}"
                                                                         class="d-block position-relative  text-uppercase collapsible-link py-2">{{$val->title}}</a>
                                    </h6>
                                </div>
                                <div id="{{$val->id}}" aria-labelledby="heading{{$val->type.$val->id}}"
                                     data-parent="#accordionExample"
                                     class="collapse show">
                                    <div class="card-body p-3">
                                        <p class="font-weight-light m-0">{{$val->description}}.</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card accordion-card">
                                <div id="headingThree" class="card-header  shadow-sm border-0">
                                    <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse"
                                                                         data-target="#collapseThree"
                                                                         aria-expanded="false"
                                                                         aria-controls="collapseThree"
                                                                         class="d-block position-relative collapsed text-uppercase collapsible-link py-2">Civil
                                            SIUT</a></h6>
                                </div>
                                <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample"
                                     class="collapse">
                                    <div class="card-body p-3">
                                        <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim
                                            eiusmod
                                            high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non
                                            cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                            eiusmod.
                                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                            coffee nulla assumenda shoreditch et.</p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush