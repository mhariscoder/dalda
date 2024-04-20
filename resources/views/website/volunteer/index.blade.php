@extends('website.layouts.master')

@section('content')
    <section class="about-banner">
        @include('website.layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="content-area">
                        <h1>Volunteers</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-about-first-fold">
        <div class="container">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col" style="max-width: 25px;">#SR</th>
                    <th scope="col" style="max-width: 300px;">Image</th>
                    <th scope="col" style="max-width: 300px;">Name</th>
                    <th scope="col" style="max-width: 300px;">Description</th>
                </tr>
                </thead>
                <tbody>
                @forelse($volunteers as $key => $val)
                    <tr style="background-color:#041e39; color: white;">
                        <td>{{ $key + 1 }}</td>
                        <td><img src="{{ empty($val->file) ? asset('assets/images/user_profile/not_available.jpg') : asset('assets/website/images/pages/media-center/'.$val->file) }}" style="width: 50px;"/></td>
                        <td>{{ $val->student_name }}
                        </td>
                        <td>{{ \Illuminate\Support\Str::words($val->description, 50) }}
                        </td>
                    </tr>
                @empty
                    <p></p>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection