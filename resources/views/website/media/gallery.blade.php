@extends('website.layouts.master')

@section('content')
    <section class="about-banner gallery-banner">
        @include('website.layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-area">
                        <h1>Gallery</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-Gallery-first-fold">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>We're Here to help you</h2>
                    <hr>
                </div>
            </div>
        </div>
    </section>
    <section class="new-gallery-area mb-5">

        <div class="filters filter-button-group">
            <ul>
                <li class="active"><a href="javascript:void(0);" data-filter="*">All</a></li>
                <li><a href="javascript:void(0);" data-filter="Education">Eductaion / Scholarship</a></li>
                <li><a href="javascript:void(0);" data-filter="Hospital">Health Care</a></li>
                <li><a href="javascript:void(0);" data-filter="Agriculture">Agriculture</a></li>
            </ul>
        </div>
        <div id="container" class="isotope">
            @forelse($galleryImages as $key => $val)
                <div class="grid-item"
                     data-filter="{{ $val->imageable_type == 'Education / Scholarship' ? 'Education' : $val->imageable_type }}">
                    <img src="{{ asset('storage/uploads/gallery/images/'.$val->image_name)}}"
                         alt="{{$val->imageable_type}}">
                    @if($val->imageable_type  === 'Hospital')
                        <div class="overlay">Health Care</div>
                    @else
                        <div class="overlay">{{$val->imageable_type}}</div>
                    @endif
                </div>
            @empty
                <div class="grid-item" data-filter="agriculture">
                    <a class="popupimg" href="javascript:;">
                        <img src="https://drive.google.com/u/0/uc?id=1x1Ci8s3_dKgRVqqRfDao52wLqGoumKdB&export=download">
                    </a>
                    <div class="overlay">Agriculture</div>
                </div>

                <div class="grid-item" data-filter="Eductaion / Scholarship">
                    <a class="popupimg" href="javascript:;">
                        <img src="https://drive.google.com/u/0/uc?id=1Izd6KrrgNXGmAV7QgQRpd7WTM-AfkE6x&export=download">
                    </a>
                    <div class="overlay"> Eductaion / Scholarship</div>
                </div>

                <div class="grid-item" data-filter="Health Care">
                    <a class="popupimg" href="javascript:;">
                        <img src="https://drive.google.com/u/0/uc?id=1xBNwn9Sgedoy3sAVrfuDPYNgl-ArlVaZ&export=download">
                    </a>
                    <div class="overlay">Health Care</div>
                </div>
            @endforelse
        </div>
    </section>
@endsection

@push('scripts')
    <script src="/assets/website/js/home.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script>
        $('.popupimg').magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom',
            gallery: {
                enabled: true
            },

            zoom: {
                enabled: true,

                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function

                opener: function (openerElement) {

                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }

        });
    </script>
@endpush